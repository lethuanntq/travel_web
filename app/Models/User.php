<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use phpDocumentor\Reflection\Types\This;
use function Symfony\Component\String\s;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const INACTIVE = 0;
    const ACTIVE = 1;
    const ROLE_ADMIN = 1;
    const ROLE_EDITOR = 2;

    const ROLES = [
      self::ROLE_ADMIN => 'Quản trị viên',
      self::ROLE_EDITOR => 'Biên tập viên'
    ];

    const PATH = 'user/';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'avatar',
        'password',
        'active',
        'role'
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

    public static function rules($user = null)
    {
        $rules = [
            'account.name' => 'required|max:255',
            'account.email' => 'required|email|unique:users,email',
            'account.phone_number' => 'required|digits:10',
            'account.password' => 'required|min:8|max:30|confirmed',
            'account.password_confirmation' => 'required|min:8|max:30',
            'account.role' => 'required',
            'account.avatar' => 'image|max:2048',
        ];

        if ($user) {
            $rules['account.email'] = 'required|email|unique:users,email,' . $user->id . ',id,deleted_at,NULL';
            $rules['account.password'] = 'sometimes|nullable|min:8|max:30|confirmed';
            $rules['account.password_confirmation'] = 'sometimes|nullable|min:8|max:30';
        }

        return $rules;
    }

    public static function attributes()
    {
        return [
            'account.name' => 'first name and last name',
            'account.email' => 'email',
            'account.phone_number' => 'phone number',
            'account.password' => 'password',
            'account.password_confirmation' => 'password confirm',
            'account.role' => 'role',
            'account.avatar' => 'avatar',
        ];
    }
}
