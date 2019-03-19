<?php

namespace App\Entity;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Question
 * @package App\Entity
 */
class Question extends Model
{
    use Uuids;

    /** @var bool  */
    public $incrementing = false;

    /** @var array  */
    protected $casts = [
        'id' => 'string'
    ];

    /** @var string  */
    protected $primaryKey = 'id';

    /** @var array  */
    protected $fillable = ['question', 'priority', 'correctAnswer'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function correctAnswer(): BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function answers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Answer::class);
    }
}
