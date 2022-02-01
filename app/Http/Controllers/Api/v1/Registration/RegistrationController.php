<?php

namespace App\Http\Controllers\Api\v1\Registration;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function register(Request $request)
    {
        return User::create([
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'password' => Hash::make($request->input('password'))
        ]);
    }
}
