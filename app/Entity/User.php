<?php

namespace App\Entity;

use App\Traits\Uuids;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Entity
 */
class User extends Authenticatable
{
    use Notifiable;
    use Uuids;

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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    

    /**
     * @param $roles
     * @return bool
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }


    /**
     * Check multiple roles
     * @param array $roles
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }


    /**
     * Check one role
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * Check if the user has role admin
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(Role::ROLE_ADMIN);
    }

    /**
     * Check if the user has role admin
     */
    public function isManager(): bool
    {
        return $this->hasRole(Role::ROLE_MANAGER);
    }
}
