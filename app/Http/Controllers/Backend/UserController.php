<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use function Termwind\renderUsing;

class UserController extends Controller
{
    public function register(){
        return view('Backend.register');
    }
    public function register_submit(Request $request){
        $request -> validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' =>'required|min:7',
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $name      = $request->username;
        $email     = $request->email;
        $password  = Hash::make($request->password);
        $profile   = $request->file('profile');
        $file_name = rand(1 ,999).'-'.$profile->getClientOriginalName();
        $path      = 'uploads';
        $profile->move($path ,$file_name);

        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
            'profile'  => $file_name,
        ]);
        return redirect('/register');
    }
    public function login(){
        return view('Backend.login');
    }
    public function login_submit(Request $request){
        if(Auth::attempt(['email' => $request->email_username, 'password' => $request->password])) {
            return redirect('/admin');
        }
        elseif(Auth::attempt(['name' => $request->email_username, 'password' => $request->password])) {
            return redirect('/admin');
        }
        else {
            return redirect('/login');
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
