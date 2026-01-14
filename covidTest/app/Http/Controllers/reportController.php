<?php

namespace App\Http\Controllers;
use App\Models\VaccinationBooking;
use App\Models\TestBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class reportController extends Controller
{
    function generateReport(Request $req){

    if($req['reportType']=="Vaccination"){
      
      $vaccineBooking = VaccinationBooking::whereBetween('created_at', [
      Carbon::parse($req->fromdate)->startOfDay(),
      Carbon::parse($req->todate)->endOfDay(),
      ])->get();

      $totalBookings= $vaccineBooking->count();
      $total1= $vaccineBooking->where('dose_no','1')->count();
      $total2= $vaccineBooking->where('dose_no','2')->count();  

      $hospitalVaccineBooking = VaccinationBooking::with('hospital')
            ->whereBetween('created_at', [
                Carbon::parse($req->fromdate)->startOfDay(),
                Carbon::parse($req->todate)->endOfDay(),
            ])
            ->get()
            ->groupBy('hospital_id');

      return view('admin.systemReport',compact('vaccineBooking','totalBookings','total1','total2','hospitalVaccineBooking'));

    }
    else{
        $testBooking = TestBooking::whereBetween('created_at', [
        Carbon::parse($req->fromdate)->startOfDay(),
        Carbon::parse($req->todate)->endOfDay(),
        ])->get();
        
      $totalBookings= $testBooking->count();  
      $totalNegative= $testBooking->where('result','negative')->count();
      $totalPositive= $testBooking->where('result','positive')->count(); 

      $hospitalTestBooking = VaccinationBooking::with('hospital')
            ->whereBetween('created_at', [
                Carbon::parse($req->fromdate)->startOfDay(),
                Carbon::parse($req->todate)->endOfDay(),
            ])
            ->get()
            ->groupBy('hospital_id');

      return view('admin.systemReport',compact('testBooking','totalBookings','totalNegative','totalPositive','hospitalTestBooking'));
    }

    }
}
