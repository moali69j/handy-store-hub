<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
 use App\Models\Store;
class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. التحقق من البيانات المدخلة
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. البحث عن المستخدم
        $user = User::where('email', $request->email)->first();

        // 3. التأكد من صحة الباسورد
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'بيانات الدخول غير صحيحة'
            ], 401);
        }

        // 4. إصدار التوكن وإرسال نوع المستخدم (Role)
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'name' => $user->name,
                'role' => $user->role // هذا مهم جداً لكي يعرف التطبيق (React/Flutter) أين يوجه المستخدم
            ]
        ]);
    }
   

public function createStore(Request $request) {
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'store_name' => 'required|string',
    ]);

    // 1. إنشاء المستخدم كتاجر
 $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => $request->password, // الموديل سيقوم بالتشفير تلقائياً بفضل الـ casts
    'role' => 'seller',
]);

    // 2. إنشاء المتجر المرتبط به
    Store::create([
        'user_id' => $user->id,
        'store_name' => $request->store_name,
    ]);

    return response()->json(['message' => 'تم إنشاء المتجر والتاجر بنجاح'], 201);
}
}