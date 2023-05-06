<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'picture',
        'email',
        'password',
        'last_online',
        'verification_code',
        'new_email',
        'status',
        'first',
        'last_accept_date',
        'created',
        'modified',
        'company_contact',
        'credits',
        'first_trip',
        'incomplete_profile',
        'phone_verify',
        'token_auto_login',
        'user_vertical',
        'language_id',
        'no_registered',
        'deleted_at',
        'remember_token'
    ];

    public function userPlan() : HasOne
    {
        return $this->hasOne(UserPlan::class);
    }

}
