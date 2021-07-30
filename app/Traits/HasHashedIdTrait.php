<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait HasHashedIdTrait
{
    /**
     *
     */
    public static function bootHasHashedIdTrait()
    {
        static::creating(static function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->setAttribute($model->getKeyName(), Hash::make($model->id));
            }
        });
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'hashed_id';
    }
}
