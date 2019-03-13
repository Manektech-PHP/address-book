<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEmails extends Model
{
    //
	protected $table = 'users_email';
    protected $fillable = [
        'user_id', 'email'
    ];
}
