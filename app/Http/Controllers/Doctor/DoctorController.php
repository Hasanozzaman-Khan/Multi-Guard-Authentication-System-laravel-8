<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    function create(Request $request){
        // $request->input();
        // die();
        // Validate inputs
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'hospital'=>'required',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);

        $doctor = new Doctor;
        $doctor->name = $request->name;
        $doctor->hospital = $request->hospital;
        $doctor->email = $request->email;
        $doctor->password = \Hash::make($request->password);
        $save = $doctor->save();

        if ($save) {
            return redirect()->back()->with('success','Registered successfully.');
        }else {
            return redirect()->back()->with('fail','Register failed.');
        }
    }


    function check(Request $request){
        $request->validate([
            'email'=>'required|email|exists:doctors,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'This email does not exists.'
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('doctor')->attempt($creds)) {
            return redirect()->route('doctor.home');
        }else {
            return redirect()->route('doctor.login')->with('fail','Incorrect credentials.');
        }
    }


    function logout(){
        Auth::guard('doctor')->logout();
        return redirect('/');
    }



}
