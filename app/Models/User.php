<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\This;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLES = [
      1 => 'Quản trị viên',
      2 => 'Biên tập viên'
    ];

    const INACTIVE = 0;
    const ACTIVE = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function rules()
    {
        return [
            'account.name' => 'required|max:255',
            'account.email' => 'required|email|unique:users,email',
            'account.phone_number' => 'required|digits:10',
            'account.password' => 'required|min:8|max:30|confirmed',
            'account.password_confirmation' => 'required|min:8|max:30',
            'account.role' => 'required'
        ];
    }

    public static function attributes()
    {
        return [
            'account.name' => 'first name and last name',
            'account.email' => 'email',
            'account.phone_number' => 'phone number',
            'account.password' => 'password',
            'account.password_confirmation' => 'password confirm',
            'account.role' => 'role'
        ];
    }
}
