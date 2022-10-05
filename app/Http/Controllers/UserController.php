<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function login()
    {
        if (auth()->check()) {
            return redirect()->to('home');
        }
        return view('user.login');
    }

    public function logout()
    {
        auth()->logout();
        session()->flush('user');
        return redirect()->route('login');
    }

    public function postLogin(Request $request)
    {
        // dd($request);
        $remember = $request->has('remember_me') ? true : false; //ghi nho dang nhap
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            // $user = [
            //     'email' => $request->email,
            // ];
            $user = User::where('email', 'like', '%' . $request->email . '%' )->get();
            // dd($user);
            session()->put('user' , $user);
            return redirect()->to('home');
        }

    }

    public function signup(){

        return view('user.signup');
    }

}


