<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'customer_id', 'tel'
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

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function verifyUser()
    {
      return $this->hasOne('App\VerifyUser');
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

    /**

    * Get user customer details

    * @param array $roles

    */

    public function hasCustomer()

    {
        
        return $this->customer()->where('id', $this->customer_id)->first();

    }

}
