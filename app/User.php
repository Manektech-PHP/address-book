<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = 'users';
    protected $fillable = [
        'firstname', 'lastname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	public function emails()
	{
		return $this->hasMany('App\UserEmails','user_id','id');
	}
	public function phonenumbers()
	{
		return $this->hasMany('App\UserPhones','user_id','id');
	}
	
}
