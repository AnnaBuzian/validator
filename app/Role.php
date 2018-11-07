<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Uuids;

    const ROLE_EMPLOYEE = 'employee';
    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';

    /** @var bool  */
    public $incrementing = false;

    /** @var array  */
    protected $casts = [
        'id' => 'string'
    ];

    /** @var string  */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
