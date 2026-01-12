<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hospital;
use App\Models\VaccinationBooking;
use App\Models\TestBooking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class hospitalController extends Controller
{
     //Show hospital's approved bookings section
     function approvedBookings(){
        
        return redirect('/hospitalDashboard#tab-bookings');
    }

      //Show hospital's request bookings section
     function requestBookings(){
        
        return redirect('/hospitalDashboard#tab-requests');
    }
       //Show hospitalProfile
     function hospitalProfile(){
        
        return redirect('/hospitalDashboard#tab-profile');
    }

     //Show hospital's result update section
     function resultUpdate(){
        
        return redirect('/hospitalDashboard#tab-results');
    }

     //Show Hospital Login Form

    public function hospitalLoginForm(){
        return view('hospital.hospitalLogin');
    }
    
    //Show Hospital Register Form

    public function hospitalRegForm(){

        return view('hospital.hospitalRegister');
    }

     //Show hospital Dashboard
   public function hospitalDashboard()
{
    $hospital = auth()->user()->hospital;
   

    //////PENDING BOOKINGS

    $pendingTestBookings = $hospital->testBookings()
        ->where('status', 'pending')
        ->with('user')
        ->get()
        ->map(function ($booking) {
            $booking->service = 'COVID Test';
            return $booking;
        });

    $pendingVaccinationBookings = $hospital->vaccinationBookings()
        ->where('status', 'pending')
        ->with('user')
        ->get()
        ->map(function ($booking) {
            $booking->service = 'Vaccination';
            return $booking;
        });

    // Merge both into one collection
   $pendingBookings = collect([
    ...$pendingTestBookings,
    ...$pendingVaccinationBookings
]);

    //////APPROVED BOOKINGS

    $approvedTestBookings = $hospital->testBookings()
        ->where('status', 'approved')
        ->with('user')
        ->get()
        ->map(function ($booking) {
            $booking->service = 'COVID Test';
            return $booking;
        });
        
    $approvedVaccinationBookings = $hospital->vaccinationBookings()
        ->where('status', 'approved')
        ->with('user')
        ->get()
        ->map(function ($booking) {
            $booking->service = 'Vaccination';
            return $booking;
        });

    // Merge both into one collection
   $approvedBookings = collect([
    ...$approvedTestBookings,
    ...$approvedVaccinationBookings
]);

   $user = Auth::user();

    $newRequests =
        TestBooking::where('hospital_id', $hospital->id)->where('status', 'pending')->count()
      + VaccinationBooking::where('hospital_id', $hospital->id)->where('status', 'pending')->count();

    $todayBookings =
        TestBooking::where('hospital_id', $hospital->id)
            ->whereDate('preferred_date', Carbon::today())->count()
      + VaccinationBooking::where('hospital_id', $hospital->id)
            ->whereDate('preferred_date', Carbon::today())->count();

    $pendingResults = TestBooking::where('hospital_id', $hospital->id)
        ->whereNull('result')
        ->count();
    return view('hospital.hospitalDashboard', compact('pendingBookings','approvedBookings','hospital','newRequests','todayBookings','pendingResults'));
}


     // Register hospital
        public function regHospital(Request $req){
            $data = $req->validate([
                'name'=>'required',
                'license_no'=>'required',
                'phone'=>'required',
                'address'=>'required',
             'email' => 'required|email|unique:hospitals,email',
                'password'=>'required',
                'services'=>'required',
                'city'=>'required',
                "image"=>"required|image|mimes:jpg,jpeg,png,gif"

            ]);
        $file = $req->file('image')->store('hospitalImages','public');
        $path = basename($file);

        $data['user_id'] = Auth::id();
        $data['image']=$path;
        $data['role'] = 'hospital';
        $data['status'] = 'pending';
        $user = Hospital::create($data);

        if($user){
            return view('hospital.hospitalAfterReg');
        }else{
            return redirect()->back();
        }
    }

    
////Approve Test Booking

public function approveTestBooking($id)
{
    $booking = TestBooking::findOrFail($id);

    if ($booking->hospital_id !== auth()->user()->hospital->id) {
        abort(403, 'Unauthorized action.');
    }

    $booking->status = 'approved';
    $booking->save();

    return redirect()->route('approvedBookings');
}

// Approve Vaccination Booking
public function approveVaccBooking($id)
{
    $booking = VaccinationBooking::findOrFail($id);

       if ($booking->hospital_id !== auth()->user()->hospital->id) {
    abort(403);
}else{

    $booking->status = 'approved';
    $booking->save();

return redirect()->route('approvedBookings');}
    
}

//Reject Test Booking

public function rejectTestBooking($id)
{
    $booking = TestBooking::findOrFail($id);

    if ($booking->hospital_id !== auth()->user()->hospital->id) {
        return redirect()->back()->with('error', 'You are not allowed to reject this request.');
    }

    $booking->status = 'rejected';
    $booking->save();

    return redirect()->route('requestBookings')->with('success','The Request has been Rejected Successfully');

    
        
}

//Reject Vaccination Booking

public function rejectVaccBooking($id)
{
    $booking = VaccinationBooking::findOrFail($id);

       if ($booking->hospital_id !== auth()->user()->hospital->id) {
    abort(403);
}else{$booking->status = 'rejected';
    $booking->save();


    return redirect()->route('requestBookings')->with('success','The Request has been Rejected Successfully'); }

    
        
}



// delete test booking

 public function testBookingDelete($id){
        $result = TestBooking::destroy($id);

        if($result){
            return redirect()->route('approvedBookings')->with('success','The Appointment has been Mark Arrived Successfully');
        }
    }


    // delete vaccination booking

 public function vaccBookingDelete($id){
        $result = VaccinationBooking::destroy($id);

        if($result){
            return redirect()->route('approvedBookings')->with('success','The Appointment has been Mark Arrived Successfully');
        }
    }


// load test booking 
public function loadBooking(Request $request)
{
    $request->validate([
        'booking_id' => 'required|integer',
        'cnic' => 'required',
    ]);

    $hospitalId = auth()->user()->hospital->id;

    $bookingId = $request->booking_id;

$booking = TestBooking::where('id', $bookingId)
    ->where('hospital_id', $hospitalId)
    ->where('status', 'approved')
    ->whereRelation('user', 'cnic', $request->cnic)
    ->with('user')
    ->first();


    if (!$booking) {
        return back()->with('error', 'Booking not found or not eligible.');
    }

    return back()
        ->with('loadedBooking', $booking)
        ->with('activeTab', 'tab-results');
}

//Updated Result Save

public function saveResult(Request $request, $bookingId)
{
    $hospitalId = auth()->user()->hospital->id;

    $booking = TestBooking::where('id', $bookingId)
        ->where('hospital_id', $hospitalId)
        ->where('status', 'approved')
        ->first();

    if (!$booking) {
        return back()->with('error', 'Booking not found or already processed.');
    }

    $request->validate([
        'result' => 'required|in:positive,negative,inconclusive',
        'report_date' => 'required|date',
        'doctor_notes' => 'nullable|string',
    ]);

    // Save result
    $booking->update([
        'result' => $request->result,
        'report_date' => $request->report_date,
        'doctor_notes' => $request->doctor_notes,
        'status' => 'completed',
    ]);

    return back()
        ->with('success', 'Test result saved successfully.')
        ->with('activeTab', 'tab-results');
}


// load Vaccination booking 
public function loadVaccBooking(Request $request)
{
    $request->validate([
        'booking_id' => 'required|integer',
        'cnic' => 'required',
    ]);

    $hospitalId = auth()->user()->hospital->id;
    $bookingId  = $request->booking_id;

    $vaccbooking = VaccinationBooking::where('id', $bookingId)
        ->where('hospital_id', $hospitalId)
        ->where('status', 'approved')
        ->whereRelation('user', 'cnic', $request->cnic)
        ->with('user')
        ->first();

    if (!$vaccbooking) {
        return back()->with('error', 'Booking not found or not eligible.');
    }

    return back()
        ->with('loadedVaccBooking', $vaccbooking)
        ->with('activeTab', 'tab-vaccine');
}



//Updated Vacc Save

public function saveVaccUpdate(Request $request, $bookingId)
{
    $hospitalId = auth()->user()->hospital->id;

    $booking = VaccinationBooking::where('id', $bookingId)
    ->where('hospital_id', $hospitalId)
    ->where('status', 'approved')
    ->first();

    if (!$booking) {
        return back()->with('error', 'Booking not found or already processed.');
    }

    $request->validate([
        'dose_no' => 'required|in:1,2,booster',
        'vaccine_type' => 'required',
        'preferred_date' => 'required',
    ]);

    // Save result
    $booking->update([
        'dose_no' => $request->dose_no,
        'vaccine_type' => $request->vaccine_type,
        'preferred_date' => $request->preferred_date,
        'status' => 'completed',
    ]);

    return back()
        ->with('success', 'Vaccination Status has been updated successfully.')
        ->with('activeTab', 'tab-vaccine');
}
//update Profile
 public function updateProfile(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'city'    => 'required',
            'email'   => 'required|email',
            'phone'   => 'nullable',
            'address' => 'nullable',
            'services'=> 'required|in:covidTest,vaccination,both',
        ]);

        $hospital = Hospital::where('user_id', Auth::id())->firstOrFail();

        $hospital->update([
            'name'     => $request->name,
            'city'     => $request->city,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'services' => $request->services,
        ]);

         return redirect('/hospitalDashboard#tab-profile')
            ->with('success', 'Hospital profile updated successfully');
    }

    public function HosdeleteAccount($id){
        $hospital = Hospital::destroy($id);

        return redirect()->route('homePage');
    }

}
