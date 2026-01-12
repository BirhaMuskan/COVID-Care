@extends('home.navbar');
@section('content')

  <div class="cc-auth-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="cc-card p-4 p-lg-5">
            <h3 class="fw-bold mb-1">Hospital Registration</h3>
            @if(session('success'))
            <p>{{session('success')}}</p>
            @endif
            <p class="cc-subtitle mb-3">Register your hospital. Admin approval is required before login.</p>

            <div class="alert alert-warning rounded-4">
              <strong>Note:</strong> After registration, your status will be <b>Pending</b> until Admin approves.
            </div>

            <form action="{{route('regHospital')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Hospital Name</label>
                  <input class="form-control" name="name" type="text">
                  @error('name')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">License / Registration ID</label>
                  <input class="form-control" type="text" name="license_no" >
                           @error('license_no')
                  <p>{{$message}}</p>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Contact Number</label>
                  <input class="form-control" name="phone" type="text" >
                           @error('phone')
                  <p>{{$message}}</p>
                  @enderror
                </div>

                <div class="col-6">
                  <label class="form-label fw-semibold">Address</label>
                  <input class="form-control" type="text" name="address"   >
                           @error('address')
                  <p>{{$message}}</p>
                  @enderror
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Email</label>
                  <input class="form-control" type="email" name="email" value="{{Auth::user()->email}}"  readonly>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Password</label>
                  <input class="form-control" type="password" name="password" value="{{Auth::user()->password}}" readonly>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Services</label>
                  <select class="form-select" required name="services">
                    <option value="" selected disabled>Select</option>
                    <option value="covidTest">Covid Test</option>
                    <option value="vaccination">Vaccine</option>
                    <option value="both">Both (Covid Test + Vaccine)</option>

                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">City</label>
                  <input class="form-control" type="text" name="city"  >
                </div>
              </div>
              
                 <div class="col-md-6 mt-3">
                  <label class="form-label fw-semibold mt-3">Image of your Hospital</label>
                  <input class="form-control" type="file" name="image" >
                           @error('image')
                  <p>{{$message}}</p>
                  @enderror
                </div>
                 
              </div>

              
              </div>

              <button class="btn btn-cc btn-cc-success w-100 mt-4" type="submit">Submit for Approval</button>
            </form>

            <div class="text-center mt-3">
              <span class="cc-subtitle">Already registered?</span>
              <a href="hospital-login.html" class="fw-semibold text-decoration-none">Login</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection