<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('userName', 'password');

        $user = User::where('userName', $credentials['userName'])->where('password',$credentials['password'])->first();
        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/blog');
        }
        else{
            return redirect()->back();

        }

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function checkStatus(){
        if (Auth::check() && Auth::user()->role == 'admin') {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
