<?php

namespace App\Classes\SendGrid;

use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

/**
 * Class SingleSend
 * @package App\Classes\SendGrid
 */
class SingleSend
{
    /**
     *
     */
    const API_ROOT = 'https://api.sendgrid.com/v3/marketing/singlesends';

    /**
     * @param string $name
     * @param string $subject
     * @param string $content
     * @param \Carbon\Carbon|null $sendAt
     * @param array $listIds
     * @param array $segmentIds
     *
     * @return object
     */
    public static function create(string $name, string $subject, string $content, Carbon $sendAt = null, array $listIds = [], array $segmentIds = [])
    {
        $response = Http::withToken(config('services.sendgrid.api_key'))->post(SingleSend::API_ROOT, [
            'name'         => $name,
            'send_at'      => $sendAt,
            'send_to'      => [
                'list_ids'    => $listIds,
                'segment_ids' => $segmentIds,
                'all'         => false,
            ],
            'email_config' => [
                'subject'                => $subject,
                'html_content'           => $content,
                'generate_plain_content' => true,
            ],
        ]);

        return SingleSend::formatResponse($response);
    }

    /**
     * @param string $singleSendId
     * @param \Carbon\Carbon $sendAt
     *
     * @return object
     */
    public function schedule(string $singleSendId, Carbon $sendAt): object
    {
        $response = Http::withToken(config('services.sendgrid.api_key'))->put(SingleSend::API_ROOT . '/' . $singleSendId . '/schedule', [
            'send_at' => $sendAt->toIso8601String(),
        ]);

        return SingleSend::formatResponse($response);
    }

    /**
     * @param string $singleSendId
     *
     * @return object
     */
    public function get(string $singleSendId): object
    {
        $response = Http::withToken(config('services.sendgrid.api_key'))->get(SingleSend::API_ROOT . '/' . $singleSendId);

        return SingleSend::formatResponse($response);
    }

    /**
     * @param string $singleSendId
     *
     * @return object
     */
    public static function delete(string $singleSendId): object
    {
        $response = Http::withToken(config('services.sendgrid.api_key'))->delete(SingleSend::API_ROOT . '/' . $singleSendId);

        return SingleSend::formatResponse($response);
    }

    /**
     * @param string $singleSendId
     *
     * @return object
     */
    public static function deleteSchedule(string $singleSendId): object
    {
        $response = Http::withToken(config('services.sendgrid.api_key'))->delete(SingleSend::API_ROOT . '/' . $singleSendId);

        return SingleSend::formatResponse($response);
    }

    /**
     * @param \Illuminate\Http\Client\Response $response
     *
     * @return object
     */
    private static function formatResponse(Response $response): object
    {
        return (object)[
            'success' => $response->successful(),
            'data'    => $response->json(),
        ];
    }
}
