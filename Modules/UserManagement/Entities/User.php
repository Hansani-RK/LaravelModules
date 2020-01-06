<?php

namespace Modules\UserManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name','email', 'password', 'phone_number', 'date_of_birth', 'street_address', 'city', 'state', 'status', 'user_type', 'country'
    ];
}
