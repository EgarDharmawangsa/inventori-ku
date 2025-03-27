<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    //Login Controller
    public function login() {
        return view("login.index", [
            "judul" => "Masuk"
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            User::where("username", $credentials["username"])->update(["is_online" => true]);

            return redirect()->intended('/');
        }

        return back()->with('loginError','Terjadi kesalahan saat Login');
    }

    public function logout(Request $request) {
        User::where("username", Auth::user()->username)->update(["is_online" => false]);

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    //Register Controller
    public function register() {
        return view("register.index", [
            "judul" => "Daftar"
        ]);
    }

    public function enroll(Request $request) {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "username" => "required|min:5|max:255|unique:users",
            "email" => "required|email:dns|unique:users",
            "password" => "required|min:5|max:255",
            "role_id" => "required"
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil');
    }
}
