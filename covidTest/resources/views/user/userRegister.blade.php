@extends('home.navbar');
@section("content")

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Patient Register — COVIDCare</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="covidcare.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg cc-navbar fixed-top">
    <div class="container">
      <a class="navbar-brand cc-brand" href="index.html">
        <span class="cc-brand-badge"></span>
        <span class="cc-brand-text fs-4"><span>COVID</span><span>Care</span></span>
      </a>
      <a class="btn btn-cc btn-cc-outline" href="auth-role.html">Back</a>
    </div>
  </nav>

  <div class="cc-auth-wrap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="cc-card p-4 p-lg-5">
            <h3 class="fw-bold mb-1">User Registration</h3>
            <p class="cc-subtitle mb-4">Create your patient or User account.</p>

            <form action="{{route('regUser')}}" method="POST">
              @csrf
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Full Name</label>
                  <input class="form-control" type="text" name="name" placeholder="Enter name" required>
                </div>
                <div class="col-md-3">
                  <label class="form-label fw-semibold">Age</label>
                  <input class="form-control" type="number" name="age" placeholder="e.g. 22" required>
                </div>
                <div class="col-md-3">
                  <label class="form-label fw-semibold">Gender</label>
                  <select class="form-select" required name="gender">
                    <option value="" selected disabled>Select</option>
                    <option>Male</option><option>Female</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Mobile</label>
                  <input class="form-control" type="text" name="phone" placeholder="03xx..." required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Email</label>
                  <input class="form-control" type="email" name="email" placeholder="email@example.com" required>
                </div>

                <div class="col-12">
                  <label class="form-label fw-semibold">Address</label>
                  <input class="form-control" type="text" name="address" placeholder="Street, City" required>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Password</label>
                  <input class="form-control" type="password" name="password" placeholder="Create password" required>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">C-NIC</label>
                  <input class="form-control" type="number" name="cnic" placeholder="Enter your C-NIC" required>
                </div>
                 <div class="col-md-3">
                  <label class="form-label fw-semibold">Role</label>
                  <select class="form-select" required name="role">
                    <option value="" selected disabled>Select</option>
                    <option value="patient">Patient</option>
                    <option value="hospital">Hospital</option>
                  </select>
                </div>
                
              </div>

              <button  class="btn btn-cc btn-cc-success w-100 mt-4" type="submit">Create Account</button>
            </form>

            <div class="text-center mt-3">
              <span class="cc-subtitle">Already registered?</span>
              <a href="{{route('userLoginForm')}}" class="fw-semibold text-decoration-none">Login</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


@endsection