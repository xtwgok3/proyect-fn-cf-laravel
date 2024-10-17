<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as ResetPasswordTrait;


class User extends Authenticatable implements CanResetPassword
{
    use HasFactory, Notifiable, ResetPasswordTrait;

    const ADMIN = 1;
    const CUSTOMER = 2;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ensure 'role' is included
        'last_login',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'integer', // Add this line if needed
            'last_login' => 'datetime', 
        ];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function isAdmin()
    {
        return $this->role == self::ADMIN;
    }

    public function isCustomer()
    {
        return $this->role == self::CUSTOMER;
    }
}