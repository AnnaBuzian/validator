<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Answer extends Model
{
    /** @var bool  */
    public $incrementing = false;

    /** @var array  */
    protected $casts = [
        'id' => 'string'
    ];

    /** @var string  */
    protected $primaryKey = 'id';

    /** @var array  */
    protected $fillable = ['name', 'priority'];


    /**
     * @return BelongsToMany
     */
    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class);
    }
}
