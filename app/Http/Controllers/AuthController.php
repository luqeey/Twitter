<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = new User();
        $user->fill($data);
        $user->save();

        return redirect()->route('dashboard.index')->with('success', 'You have successfully registered!');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $data = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if (auth()->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', 'Login successfully');
        }
        return redirect()->route('auth.login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success', 'You have been logged out!');
    }

}
