<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * Class SocialAccount
 * @package App
 */
class SocialAccount extends Model
{
    /** @var array  */
    protected $guarded = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
