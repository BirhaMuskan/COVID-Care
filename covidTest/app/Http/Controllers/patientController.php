<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hospital;
use App\Models\VaccinationBooking;
use App\Models\TestBooking;
use Illuminate\Support\Facades\Auth;


class patientController extends Controller
{
    ////Show patient Dashboard
   public function patientDashboard()
{
    $hospitals = Hospital::all();
    $user = Auth::user();

    $test_bookings = $user->testBookings()->with('hospital')->get();
    $vaccination_bookings = $user->vaccinationBookings()->with('hospital')->get();

    $latestTest = TestBooking::with('hospital')->where('user_id', $user->id)->whereNotNull('result')
        ->orderByDesc('report_date')
        ->first();

    $previousTests = TestBooking::with('hospital')->where('user_id', $user->id)->whereNotNull('result')
        ->orderByDesc('report_date')
        ->skip(1)
        ->take(5)
        ->get();

    $vaccinations = VaccinationBooking::where('user_id', $user->id)->orderBy('dose_no')->get();

    $totalBookings =
        TestBooking::where('user_id', $user->id)->count() + VaccinationBooking::where('user_id', $user->id)->count();

    $upcoming =
        TestBooking::where('user_id', $user->id)->where('status', 'approved')->count()
      + VaccinationBooking::where('user_id', $user->id)->where('status', 'approved')->count();

    $pendingTest = TestBooking::where('user_id', $user->id)
        ->whereNull('result')
        ->exists();   

    // $lastTest = TestBooking::where('user_id', $user->id)
    //     ->whereNotNull('result')
    //     ->latest('report_date')
    //     ->first();

    $takenDoses = VaccinationBooking::where('user_id', $user->id)
        ->where('status', 'completed')
        ->count();

    $nextDoseBooked = VaccinationBooking::where('user_id', $user->id)
        ->where('status', 'approved')
        ->exists();

    return view('patient.patientDashboard', compact(
        'user',
        'test_bookings',
        'vaccination_bookings',
        'hospitals',
        'latestTest',
        'previousTests',
        'vaccinations',
         'totalBookings',
        'upcoming',
        // 'lastTest',
        'takenDoses',
        'pendingTest',
        'nextDoseBooked'
    ));
}

//Show Hospital Data on request page 

    public function hospitalReq($id){
        $hospital = Hospital::findOrFail($id);

        return view('patient.hospitalReq',compact('hospital'));
    }
    //Showview result page 

    public function viewResult($id){
       $booking = TestBooking::with('hospital')
        ->where('id', $id)
        ->where('user_id', Auth::id())
        ->first(); 

    return view('patient.viewResult', compact('booking'));
    }


    //Show patient Dashboard's appontmeant page
     function appointments(){
        
        return redirect('/patientDashboard#tab-appointments');
    }

     //Show patient Dashboard's profile page
     function patientProfile(){
        
        return redirect('/patientDashboard#tab-profile');
    }
// Show test form
public function testForm($id)
{
    $hospital = Hospital::findOrFail($id);
    return view('patient.testForm',compact('hospital'));
}

// Show vaccination form
public function vaccForm($id)
{
   $hospital = Hospital::findOrFail($id);
    return view('patient.vaccForm',compact('hospital'));
}

    //Show User Register Form

    public function userRegForm(){
        return view('user.userRegister');
    }

     //Show User Login Form

    public function userLoginForm(){
        return view('user.userLogin');
    }

    // Register User
    public function regUser(Request $req){
        $data = $req->validate([
            'name'=>'required', 
            'age'=>'required',
            'gender'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'cnic'=>'required',
            'role'=>'required' 
        ]);
        $user = User::create($data);

        if($user){
            if($data['role']== 'hospital'){
             return redirect()->route('userLoginForm');}
            elseif($data['role']== 'patient'){
                return view('patient.patientAfterReg');
            }
   
        }else{
            return redirect()->back();
        }
    }
    



function vaccineBook(Request $req){
     $data = $req->validate([
            'dose_no'=>'required',
            'vaccine_type'=>'required',
            'preferred_date'=>'required',
            'time_slot'=>'required',
            'medical_notes'  => 'nullable',
            'hospital_id'=>'required',
            
        ]);
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $vaccine = VaccinationBooking::create($data);
        


                  if ($vaccine) {
                  return redirect()->route('appointments');}
                  else{
                    return 'failed';
                  }
                  

}


function testBook(Request $req){
     $data = $req->validate([
            'test_type'=>'required',
            'preferred_date'=>'required',
            'time_slot'=>'required',
            'sample_type'=>'required',
            'symptoms'=>'nullable',
            'notes'=>'nullable',
            'hospital_id'=>'required',
            
        ]);
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $test = TestBooking::create($data);

                  if ($test) {
                    return redirect()->route('appointments');}

                  else{
                    return 'failed';
                  }

                }
// Cancel test booking
 public function testBookingCancel($id){
        $result = TestBooking::destroy($id);

        if($result){
            return redirect()->route('appointments');
        }
    }


    // Cancel vaccination booking
 public function vaccBookingCancel($id){
        $result = VaccinationBooking::destroy($id);

        if($result){
            return redirect()->route('appointments');
        }
    }

// rebook vacc
public function rebookVaccBooking($id)
{
    $booking = VaccinationBooking::findOrFail($id);

    $booking->status = 'pending';
    $booking->save();

return redirect()->route('appointments');
    
}


//rebook test
public function rebookTestBooking($id)
{
    $booking = TestBooking::findOrFail($id);

    $booking->status = 'pending';
    $booking->save();

    return redirect()->route('approvedBookings');
}
///Update patient Profile
function updatePatientProfile(Request $req){

    $req->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'age' => 'required',
        'address' => 'required'
    ]);

    $patient = User::where('id',Auth::id())->where('role','patient')->first();

    $patient->update([
        'name' => $req->name,
        'email' => $req->email,
        'phone' => $req->phone,
        'age' => $req->age,
        'address' => $req->address
    ]);

    return redirect()->route('patientProfile');
}

 ///delete patient Account
   public function PatdeleteAccount($id){
        $Patient = User::destroy($id);

        return redirect()->route('homePage');
    }

    function showSearch(){
        $hospitals=Hospital::all();
        return view('patient.search',compact('hospitals'));
    }

    public function search(Request $req){
           
           $hospitals = Hospital::where('name','like',"%$req->name%")->get();
           return view('patient.search',compact('hospitals'));
    }

}

