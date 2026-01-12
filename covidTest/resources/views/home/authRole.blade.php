@extends('home.navbar');
@section('content')
  <div class="cc-auth-wrap">
    <div class="container">
      <div class="row g-4 align-items-stretch">
        <div class="col-lg-5">
          <div class="cc-auth-hero h-100">
            <h2 class="fw-bold mb-2">Welcome back</h2>
            <p class="mb-0">Choose your role to login or register with the correct dashboard access.</p>
            <hr class="border-white border-opacity-25 my-4">
            <div class="small">
              ✅ Patient: book & view results<br>
              ✅ Hospital: approve & update status<br>
              ✅ Admin: approve hospitals & reports
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="cc-card p-4 p-lg-5">
            <h3 class="fw-bold mb-1">Choose your role</h3>
            <p class="cc-subtitle mb-4">Select one option to continue.</p>

            <div class="row g-3">
              <div class="col-md-6">
                <div class="cc-card p-4 h-100">
                  <h5 class="fw-bold mb-2">👤 Patient</h5>
                  <p class="cc-subtitle mb-3">Book test/vaccination and view reports.</p>
                  <div class="d-grid gap-2">
                    <a class="btn btn-cc btn-cc-primary" href="{{route('userLoginForm')}}">Patient Login</a>
                    <a class="btn btn-cc btn-cc-success" href="{{route('userRegForm')}}">Patient Register</a>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="cc-card p-4 h-100">
                  <h5 class="fw-bold mb-2">🏥 Hospital</h5>
                  <p class="cc-subtitle mb-3">Approve requests & update results/status.</p>
                  <div class="d-grid gap-2">
                    <a class="btn btn-cc btn-cc-primary" href="{{route('hospitalLoginForm')}}">Hospital Login</a>
                    <a class="btn btn-cc btn-cc-success" href="{{route('hospitalRegForm')}}">Hospital Register</a>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="cc-card p-4">
                  <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div>
                      <h5 class="fw-bold mb-1">🛠 Admin</h5>
                      <div class="cc-subtitle">Admin account is pre-created (no register).</div>
                    </div>
                    <a class="btn btn-cc btn-cc-outline px-5" href="{{route('userLoginForm')}}">Admin Login</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="text-center cc-subtitle small mt-4">
              © 2025 COVIDCare • Secure role-based access
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>