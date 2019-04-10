<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    /**

    * @param string|array $roles

    */

    public function authorizeRoles($roles)

    {

    if (!is_array($roles))
        $roles = [$roles];

    return $this->hasAnyRole($roles) || 
            abort(401, 'This action is unauthorized.');

    }

    /**

    * @param string|array $roles

    */

    public function authorizeDisplay($roles)

    {

    if (!is_array($roles))
        $roles = [$roles];

    return $this->hasAnyRole($roles) && true;

    }

    /**

    * Check roles

    * @param array $roles

    */

    public function hasAnyRole($roles)

    {

    return null !== $this->roles()->whereIn('name', $roles)->first();

    }

}
