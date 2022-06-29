<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function create(Request $request){
        // $request->input();
        // die();
        // Validate inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = \Hash::make($request->password);
        $save = $user->save();

        if ($save) {
            return redirect()->back()->with('success','Registered successfully.');
        }else {
            return redirect()->back()->with('fail','Register failed.');
        }
    }


    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email does not exists.'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::attempt($creds)) {
            return redirect()->route('user.home');
        }else {
            return redirect()->route('user.login')->with('fail','Incorrect credentials.');
        }
    }


    function logout(){
        Auth::logout();
        return redirect('/');
    }

}
