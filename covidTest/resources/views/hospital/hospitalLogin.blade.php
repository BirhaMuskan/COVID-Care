@extends('home.navbar');
@section('content')

  <div class="cc-auth-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="cc-card p-4 p-lg-5">
            <h3 class="fw-bold mb-1">Hospital Login</h3>
            <p class="cc-subtitle mb-4">Login is available only after admin approval.</p>

            <form action="{{route('hospitalLogin')}}" method="POST">
              @csrf

 @if (session('error'))
    <div class="border-start border-4 border-danger bg-light p-3 rounded-2 mb-3">
        <h6 class="text-danger mb-1">Access Denied</h6>
        <p class="mb-0 text-muted">{{ session('error') }}</p>
    </div>
@endif



              <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input class="form-control" name="email" type="email" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input class="form-control" name="password" type="password" required>
              </div>
              <button class="btn btn-cc btn-cc-primary w-100" type="submit">Login</button>
            </form>

            <div class="text-center mt-3">
              <span class="cc-subtitle">New hospital?</span>
              <a href="hospital-register.html" class="fw-semibold text-decoration-none">Register</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection