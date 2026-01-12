@extends('home.navbar');
@section('content')

  <div class="cc-auth-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="cc-card p-4 p-lg-5">
            <h3 class="fw-bold mb-1">Admin Login</h3>
            <p class="cc-subtitle mb-4">Admin account is pre-created.</p>

            <form action="{{route('loginData')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input class="form-control" name="email" type="text" required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input class="form-control" name="password" type="password" required>
              </div>
              <button class="btn btn-cc btn-cc-primary w-100" type="submit">Login</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

@endsection