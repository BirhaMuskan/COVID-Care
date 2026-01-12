@extends("home.navbar");
@section('content')

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Patient Login — COVIDCare</title>
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
        <div class="col-lg-6">
          <div class="cc-card p-4 p-lg-5">
            <h3 class="fw-bold mb-1">User Login</h3>
            <p class="cc-subtitle mb-4">Access your appointments and reports.</p>

            <form action="{{route('userLogin')}}" method="POST">
              @csrf
              <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input class="form-control" type="text" name="email" placeholder="e.g. birha@email.com " required>
              </div>
              <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Enter password" required>
              </div>
              <button class="btn btn-cc btn-cc-primary w-100" type="submit">Login</button>
            </form>

            <div class="text-center mt-3">
              <span class="cc-subtitle">No account?</span>
              <a href="patient-register.html" class="fw-semibold text-decoration-none">Register</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>


@endsection