<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\patientController;
use App\Http\Controllers\hospitalController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\homeController;
use App\Http\Middleware\hospital;
use App\Http\Middleware\patient;
use App\Http\Middleware\admin;


Route::get('/checking', function () {
    return view('checking');
});


////    HOME CONTROLLER    /////

// show home page
Route::get('/',[homeController::class,'homePage'])->name('homePage');

// show about page
Route::get('/about',[homeController::class,'aboutPage'])->name('aboutPage');

// show contact page
Route::get('/contact',[homeController::class,'contactPage'])->name('contactPage');

// show guidline page
Route::get('/guidelines',[homeController::class,'guidelinePage'])->name('guidelinePage');



////  PATIENT CONTROLLER  ////


// show view result page
Route::get('/viewResult/{id}',[patientController::class,'viewResult'])->name('viewResult')->middleware(patient::class);

// show hospital Request page
Route::get('/hospitalReq/{id}',[patientController::class,'hospitalReq'])->name('hospitalReq')->middleware(patient::class);

// show appointments page
Route::get('/appointments',[patientController::class,'appointments'])->name('appointments')->middleware(patient::class);

// show test form
Route::get('/testForm/{id}',[patientController::class,'testForm'])->name('testForm')->middleware(patient::class);

// show vacc form
Route::get('/vaccForm/{id}',[patientController::class,'vaccForm'])->name('vaccForm')->middleware(patient::class);

// show patientRegister form
Route::get('/userRegForm',[patientController::class,'userRegForm'])->name('userRegForm');

// show patient dashboard
Route::get('/patientDashboard',[patientController::class,'patientDashboard'])->name('patientDashboard')->middleware(patient::class);

//Register Patient
Route::post('/regUser',[patientController::class,'regUser'])->name('regUser');

//show user login form
Route::get('/userlogin',[patientcontroller::class,'userLoginForm'])->name('userLoginForm');

// inssert vaccination appointment
Route::post('/vaccineBook',[patientController::class,'vaccineBook'])->name('vaccineBook')->middleware(patient::class);

// inssert covid test appointment
Route::post('/testBook',[patientController::class,'testBook'])->name('testBook')->middleware(patient::class);

//Rebook patient's Vacc booking
Route::get('/rebookpatientvacc/{id}',[patientController::class,'rebookVaccBooking'])->name('rebookVaccBooking')->middleware(patient::class);

//Rebook patient's Test booking
Route::get('/rebookpatienttest/{id}',[patientController::class,'rebookTestBooking'])->name('rebookTestBooking')->middleware(patient::class);

//Test Booking Cancel
Route::get('/testBookingCancel/{id}',[patientController::class,'testBookingCancel'])->name('testBookingCancel')->middleware(patient::class);

//vaccination Booking cancel
Route::get('/vaccBookingCancel/{id}',[patientController::class,'vaccBookingCancel'])->name('vaccBookingCancel')->middleware(patient::class);

// view patient test report
Route::get('/patient/test-report/{id}', [PatientDashboardController::class, 'viewReport'])->name('patient.test.report')->middleware(patient::class);

//Update Patient Profile
Route::post('Update/Patient/Profile',[patientController::class, 'updatePatientProfile'])->name('updatePatientProfile')->middleware(patient::class);

//show Patient Profile
Route::get('/Patient/Profile',[patientController::class, 'patientProfile'])->name('patientProfile')->middleware(patient::class);

//Patient account delete
Route::get('PatdeleteAccount/{id}',[patientController::class,'PatdeleteAccount'])->name('PatdeleteAccount')->middleware(patient::class);

// show search hospital search page
Route::get('/showSearch', [patientController::class, 'showSearch'])->name('showSearch');

//search hospital
Route::post('/search', [patientController::class, 'search'])->name('search');





////    HOSPITAL CONTROLLER  //////




// show hospital profile page
Route::get('/hospitalProfile',[hospitalController::class,'hospitalProfile'])->name('hospitalProfile')->middleware(hospital::class);

// show Result update page in hospital
Route::get('/resultUpdate',[hospitalController::class,'resultUpdate'])->name('resultUpdate')->middleware(hospital::class);

// show Approved Bookings page
Route::get('/approvedBookings',[hospitalController::class,'approvedBookings'])->name('approvedBookings')->middleware(hospital::class);

// show request Bookings page
Route::get('/requestBookings',[hospitalController::class,'requestBookings'])->name('requestBookings')->middleware(hospital::class);

// show hospital dashboard
Route::get('/hospitalDashboard',[hospitalController::class,'hospitalDashboard'])->name('hospitalDashboard')->middleware(hospital::class);

//Register Hospital
Route::post('/regHospital',[hospitalController::class,'regHospital'])->name('regHospital');

//show hospital login form
Route::get('/hoslogin',[hospitalcontroller::class,'hospitalLoginForm'])->name('hospitalLoginForm');

// show Hospital Register form
Route::get('/hospitalRegForm',[hospitalController::class,'hospitalRegForm'])->name('hospitalRegForm');

// Update hospital profile
Route::post('/hospital/profile/update', [HospitalController::class, 'updateProfile'])->name('hospital.profile.update')->middleware(hospital::class);

//Test Booking Delete
Route::get('/testBookingDelete/{id}',[hospitalController::class,'testBookingDelete'])->name('testBookingDelete')->middleware(hospital::class);

//vaccination Booking Delete
Route::get('/vaccBookingDelete/{id}',[hospitalController::class,'vaccBookingDelete'])->name('vaccBookingDelete')->middleware(hospital::class);

//Approve patient's test booking
Route::get('/approvepatient/test/{id}',[hospitalController::class,'approveTestBooking'])->name('approveTestBooking')->middleware(hospital::class);

//Approve patient's vaccine booking
Route::get('/approvepatientvacc/{id}',[hospitalController::class,'approveVaccBooking'])->name('approveVaccBooking')->middleware(hospital::class);

//Reject patient's test booking
Route::get('/rejectpatienttest/{id}',[hospitalController::class,'rejectTestBooking'])->name('rejectTestBooking')->middleware(hospital::class);

//Reject patient's vaccine booking
Route::get('/rejectpatientvacc/{id}',[hospitalController::class,'rejectVaccBooking'])->name('rejectVaccBooking')->middleware(hospital::class);

//load booking for result update in hospital
Route::post('/hospital/load-booking', [hospitalController::class, 'loadBooking'])->name('loadBooking')->middleware(hospital::class);

//save updated result
Route::post('/hospital/saveResult/{booking}',[HospitalController::class, 'saveResult'])->name('hospital.saveResult')->middleware(hospital::class);

//load booking for Vacccination update in hospital
Route::post('/hospital/loadVaccBooking', [hospitalController::class, 'loadVaccBooking'])->name('loadVaccBooking')->middleware(hospital::class);

//save updated Vaccination status
Route::post('/hospital/saveVaccUpdate/{booking}',[HospitalController::class, 'saveVaccUpdate'])->name('hospital.saveVaccUpdate')->middleware(hospital::class);

//Hospital Account Delete
Route::get('HosdeleteAccount/{id}',[hospitalController::class,'HosdeleteAccount'])->name('HosdeleteAccount')->middleware(hospital::class);



//////     ADMIN CONTROLLER   //////////

// show all users page page
Route::get('/allUsers',[adminController::class,'allUsers'])->name('allUsers')->middleware(admin::class);

// show admin dashboard with fetched users
Route::get('/adminDashboard',[adminController::class,'adminDashboard'])->name('adminDashboard')->middleware(admin::class);

// show system reports
Route::get('/systemReports',[adminController::class,'systemReports'])->name('systemReports')->middleware(admin::class);

//Approve
Route::get('/approve/{id}',[adminController::class,'approve'])->name('approve')->middleware(admin::class);


//User Delete
Route::get('/userDelete/{id}',[adminController::class,'userDelete'])->name('userDelete')->middleware(admin::class);





////////    AUTH CONTROLLER     ///////


//show register and login optio for roles
Route::get('/authRole',[authController::class,'authRole'])->name('authRole');

//to login
Route::post('userLogin',[authController::class,'userLogin'])->name('userLogin');

//to login
Route::post('hospitalLogin',[authController::class,'hospitalLogin'])->name('hospitalLogin');

//to logout
Route::get('/logout',[authController::class,'logout'])->name('logout');





///////Report Controller///////

Route::post("/generateReport",[reportController::class,'generateReport'])->name('generateReport');







