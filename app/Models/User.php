<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
            'account.email' => 'required|email|unique',
            'account.phone_number' => 'required|regex:/(01)[0-9]{9}/|digits:10',
            'account.password' => 'required_with:account.password_confirm|same:account.password_confirm|min:8|max:30',
            'account.password_confirm' => 'required_with:account.password|same:account.password',
            'account.role' => 'required'
        ];
    }
}
