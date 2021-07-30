<?php

namespace App\Models;

use App\Traits\HasHashedIdTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ContactPhoneNumber
 * @package App\Models
 */
class ContactPhoneNumber extends Model
{
    use HasFactory;
    use HasHashedIdTrait;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
