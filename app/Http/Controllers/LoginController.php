<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\User;
use App\Role;

use Alert;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //
        $user = array(
        'email'=>$request->input('email'),
        'password'=>$request->input('password'),
        'active'=>1,
        );

        $remember = $request->input('remember');

        $remember == 'on' ? $remember = true : $remember = false;



        if (Auth::attempt($user,$remember)) {
            return redirect('admin');

        }
        else
        {
            $message = 'Email or password incorrect';
            return redirect('/auth/login')->withInput()->with("message", $message);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
