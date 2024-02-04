<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\ReturnTypePass;

class AuthController extends Controller
{
    public function login()
    {
        return view('login/login');
    }

    public function user_login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($validated))
        {
            return redirect('/');
        }
        else
        {
            return redirect()->back()->withErrors(["error" => 'Invalid email and password']);
        }
    }

    public function register()
    {
        return view('login/register');
    }

    public function user_register(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "password" => "required|string|min:8"
        ]);

//        $users = new User();

        $users = DB::table('users')->insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if($users)
        {
            return redirect('/')->with(["success" => " Form submitted successfully!"]);
        }
        else
        {
            echo "<h1>Data not Added.</h1>";
        }

    }

    public function dashboard()
    {
        return view('users/dashboard');
    }


}
