<?php

namespace App\Models;

// 1. تأكد من وجود هذا السطر في الأعلى
use Laravel\Sanctum\HasApiTokens; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // 2. أضف HasApiTokens هنا داخل الكلاس
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // تأكد أنك أضفت الـ role هنا أيضاً لكي يسمح لارفيل بتخزينه
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}