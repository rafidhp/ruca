<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username|max:100',
            'password' => 'required',
        ], [
            'username.required' => 'Username is required',
            'username.exists' => 'Username does not exist',
            'username.max' => 'Username must not exceed 100 characters',
            'password.required' => 'Password is required',
        ]);

        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors([
            'username' => 'Username or password is incorrect. Please try again!',
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postregister(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:100|unique:users,username|string',
            'name' => 'required|min:3|max:100|string|regex:/^[A-Za-z\s]+$/',
            'email' => 'required|email|unique:users,email|max:100',
            'age' => 'required|numeric|min:1|max_digits:2',
            'password' => 'required|confirmed|min:6',
        ], [
            'username.required' => 'Username is required',
            'username.unique' => 'Username already exists',
            'username.max' => 'Username must not exceed 100 characters',
            'username.min' => 'Username must be at least 3 characters',
            'name.required' => 'Name is required',
            'name.max' => 'Name must not exceed 100 characters',
            'name.min' => 'Name must be at least 3 characters',
            'name.regex' => 'Name may only contain uppercase letters, lowercase letters and spaces',
            'age.required' => 'Age is required',
            'age.numeric' => 'Age must be a number',
            'age.max_digits' => 'Maximum age is 2 digits',
            'age.min' => 'Minimum age is 1',
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email format',
            'email.unique' => 'Email already exists',
            'email.max' => 'Email must not exceed 100 characters',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
            'password.min' => 'Password must be at least 6 characters long',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'password' => bcrypt($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('auth.login')->withSuccess('Registration successful! You can now login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}