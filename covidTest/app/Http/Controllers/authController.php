<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hospital;
use Illuminate\Support\Facades\Auth;


class authController extends Controller
{
    //Show role option for register and login
    public function authRole(){
        return view('home.authRole');
    }
    
    // to Login user patient and hospital

    public function userLogin(Request $req){

        $data = $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($data)) {

    if (Auth::user()->role == 'patient') {
        return redirect()->route('patientDashboard');

    } elseif (Auth::user()->role == 'hospital') {
    return redirect()->route('hospitalRegForm');
    }
    elseif (Auth::user()->role == 'admin') {
    return redirect()->route('adminDashboard');
    }

} else {
    return back()->with('error', 'User email or password is invalid');
}

    }


    

public function hospitalLogin(Request $request)
{
    $data = $request->validate([
        'email'    => 'required|email',
        'password' => 'required'
    ]);

    
    if (!Auth::attempt($data)) {
        return back()->with('error', 'Invalid email or password');
    }

    $user = Auth::user();

    
    if ($user->role !== 'hospital') {
        Auth::logout();
        return back()->with('error', 'Access denied. Hospital account required.');
    }

   
    $hospital = Hospital::where('user_id', $user->id)->first();

    if (!$hospital) {
        Auth::logout();
        return back()->with('error', 'Hospital profile not found.');
    }

    if ($hospital->status !== 'approved') {
        Auth::logout();
        return back()->with(
            'error',
            'Your hospital account is pending admin approval.'
        );
    }

  
    return redirect()->route('hospitalDashboard');
}

    function logout(){
        Auth::logout();
        return redirect()->route('homePage');
    }
}
