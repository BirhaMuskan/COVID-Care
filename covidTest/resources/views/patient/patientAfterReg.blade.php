@extends('home.navbar');
@section('content')

  <div class="cc-auth-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-xl-6">

          <div class="cc-card p-4 p-lg-5 text-center">
            <!-- icon -->
            <div class="mx-auto mb-3"
                 style="width:84px;height:84px;border-radius:24px;
                        display:grid;place-items:center;
                        background:rgba(24,160,106,.12);
                        border:1px solid rgba(24,160,106,.22);
                        font-size:34px;">
              ✅
            </div>

            <h2 class="fw-bold mb-2">Registration Successful!</h2>
            <p class="cc-subtitle mb-4">
              Your <b>Patient</b> account has been created. You can now log in and book a COVID test or vaccination.
            </p>

            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <div class="cc-card p-3 h-100" style="box-shadow:none;">
                  <div class="fw-bold">Next Step</div>
                  <div class="cc-subtitle small">Login to access your dashboard</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="cc-card p-3 h-100" style="box-shadow:none;">
                  <div class="fw-bold">What you can do</div>
                  <div class="cc-subtitle small">Book appointment & view results</div>
                </div>
              </div>
            </div>

            <div class="d-grid gap-2 d-sm-flex justify-content-center">
              <a href="{{route('userLoginForm')}}" class="btn btn-cc btn-cc-primary px-5">Login Now</a>
              <a href="{{route('homePage')}}" class="btn btn-cc btn-cc-outline px-5">Go to Home</a>
            </div>

            <div class="cc-subtitle small mt-4">
              Tip: Use the same email/mobile you registered with.
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
