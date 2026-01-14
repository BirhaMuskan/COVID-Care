<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hospital;
use App\Models\VaccinationBooking;
use App\Models\TestBooking;
use Illuminate\Support\Facades\Auth;



class adminController extends Controller
{
    //Show admin Dashboard
    public function adminDashboard(){

        $users = User::with('hospital')->get();
        $hospitals = Hospital::all();
        $patients = User::where('role','patient')->get();

      
       $totalPatients = User::where('role', 'patient')->count();
       $totalHospitals = Hospital::count();
       $totalBookings =TestBooking::count() + VaccinationBooking::count();
       $pendingApprovals = Hospital::where('status', 'pending')->count();


        return view('admin.adminDashboard',compact('users','hospitals','patients','totalPatients','totalHospitals','totalBookings','pendingApprovals'));
    }
    //Show admin Dashboard's users page
     function allUsers(){
        
        return redirect('/adminDashboard#users');
    }

  // approve hospitals
    function approve($id){
    $hospital = Hospital::findOrFail($id);
    $hospital->status = 'approved';

    if ($hospital->save()) {
        return redirect('/adminDashboard#hospitals');
    } else {
        return 'failed';
    }
}


 
   // Approve hospital from Users tab
public function approveHospitalFromUsers($userId)
{
    $user = User::findOrFail($userId);

    if ($user->role !== 'hospital') {
        return redirect()->back()->with('error', 'Invalid user type');
    }

    $hospital = $user->hospital;

    if (!$hospital) {
        return redirect()->back()->with('error', 'Hospital record not found');
    }

    $hospital->status = 'approved';
    $hospital->save();

    return redirect('/adminDashboard#users')
           ->with('success', 'Hospital approved successfully');
}



     public function userDelete($id){
        $result = User::destroy($id);

        if($result){
            return redirect()->route('allUsers');
        }
    }

    public function systemReports(){
        $test=TestBooking::all();
        return view('admin.systemReport',compact('test'));
    }

   
}
