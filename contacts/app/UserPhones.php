<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhones extends Model
{
    //
	protected $table = 'users_phonenumber';
	
    protected $fillable = [
        'user_id', 'phoneNumber'
    ];
}
