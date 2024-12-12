<?php

namespace App\Http\Controllers;

use App\Models\loginData;
use App\Models\logins;
use Illuminate\Http\Request;

class Login extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = $request->only('username', 'password');

        if (auth()->attempt($data)) {
            return redirect()->route('home')->with('notes', auth()->user()->notes);
        } else {
            return redirect()->route('login')->withErrors('Username or password is wrong');
        }
    }
    function register(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ];

        loginData::create($data);

        return redirect()->route('login');
    }
}
