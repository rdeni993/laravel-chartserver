<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function register(){
        if(Auth::check()){
            return redirect('/');
        }

        return view('register');
    }

    public function save_user(Request $request){

        $userData = $request->validate([
            'name'            => 'required',
            'email'           => 'required|email',
            'password'        => 'required|same:retype_password',
            'retype_password' => 'required'
        ]);

        $userData['password'] = Hash::make($userData['password']);

        if( User::create($userData) ){
            echo "User is created!" . "<a href='" . url('/login') . "'>Login to your account</a>";
        }

    }

    public function login(){
        if(Auth::check()){
            return redirect('/');
        }
        return view('login');
    }

    public function login_user(Request $request){

        $userData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $userData['email'])->first();

        if( $user ){
            if( !$user->email_verified_at ){
                $request->session()->flash('status', 'log400');
                return redirect(url('/login'));
            }
        }

        if( Auth::attempt($userData) ){
            $request->session()->flash('status', 'log200');
            return redirect(url('/login'));
        } else {
            $request->session()->flash('status', 'log403');
            return redirect(url('/login'));
        }

    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');

    }

    public function control(){
        return view('user_control', [
            'users' => User::all()
        ]);
    }

    public function approve($user){
        return User::where('id', $user)
              ->update(['email_verified_at' => date('Y-m-d h:i', time())]);
    }
}
