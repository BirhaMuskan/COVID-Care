@extends('home.navbar');
@section('content')

  <div class="cc-auth-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">

          <div class="cc-card p-4 p-lg-5 text-center">
            <!-- icon -->
            <div class="mx-auto mb-3"
                 style="width:84px;height:84px;border-radius:24px;
                        display:grid;place-items:center;
                        background:rgba(28,106,228,.12);
                        border:1px solid rgba(28,106,228,.22);
                        font-size:34px;">
              🏥
            </div>

            <h2 class="fw-bold mb-2">Registration Submitted</h2>
            <p class="cc-subtitle mb-3">
              Thank you for registering your hospital. Your account status is:
            </p>

            <!-- Status badge -->
            <div class="d-inline-flex align-items-center gap-2 px-3 py-2 mb-4"
                 style="border-radius:999px;background:rgba(230,70,70,.10);
                        border:1px solid rgba(230,70,70,.22);">
              <span style="width:10px;height:10px;border-radius:50%;background:var(--cc-red);display:inline-block;"></span>
              <span class="fw-bold" style="color:var(--cc-red);">Pending Admin Approval</span>
            </div>

            <!-- What happens next -->
            <div class="row g-3 mb-3 text-start">
              <div class="col-md-6">
                <div class="cc-card p-3 h-100" style="box-shadow:none;">
                  <div class="fw-bold">What happens now?</div>
                  <div class="cc-subtitle small">
                    Admin will review your hospital details and approve your account.
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="cc-card p-3 h-100" style="box-shadow:none;">
                  <div class="fw-bold">After approval</div>
                  <div class="cc-subtitle small">
                    You can login, view requests, and update results/vaccination status.
                  </div>
                </div>
              </div>
            </div>

            <!-- Optional notice -->
            <div class="alert alert-warning rounded-4 text-start mb-4">
              <b>Note:</b> Login will not work until your hospital is approved.
            </div>

            <div class="d-grid gap-2 d-sm-flex justify-content-center">
              <a href="" class="btn btn-cc btn-cc-primary px-5">Back to Home</a>
              <a href="{{route('hospitalLoginForm')}}" class="btn btn-cc btn-cc-outline px-5">Go to Login</a>
            </div>

            <div class="cc-subtitle small mt-4">
              If needed, contact support: <b>support@covidcare.com</b>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection