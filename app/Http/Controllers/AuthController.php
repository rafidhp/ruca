<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\HashidsService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request, HashidsService $hashids)
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
            } else if (Auth::user()->role == 'psikolog') {
                return redirect()->route('psi.dashboard', ['psikolog_id' => $hashids->encode(Auth::user()->psikolog->id)]);
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
            'birth_date' => 'required|date',
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
            'birth_date' => $request->birth_date,
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