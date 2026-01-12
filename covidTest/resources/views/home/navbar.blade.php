<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>COVIDCare — Online COVID Test & Vaccination Booking</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href={{asset("home/assets/css/home.css")}} rel="stylesheet" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg cc-navbar fixed-top">
    <div class="container">
      <a class="navbar-brand cc-brand" href="#">
        <span class="cc-brand-badge" aria-hidden="true"></span>
        <span class="cc-brand-text fs-4">
          <span>COVID</span><span>Care</span>
        </span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ccNav" aria-controls="ccNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="ccNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
          <li class="nav-item"><a class="nav-link" href="{{route('homePage')}}">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('aboutPage')}}">About</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('guidelinePage')}}">Guidelines</a></li>
          <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="{{route('contactPage')}}">Contact</a></li>

          <li class="nav-item ms-lg-2">
            <a class="btn btn-cc btn-cc-outline px-4" href="{{route('authRole')}}">Login</a>
          </li>
          <li class="nav-item ms-lg-2">
            <a class="btn btn-cc btn-cc-success px-4" href="{{route('authRole')}}">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>




  @yield('content')



  
  <!-- CONTACT / FOOTER -->
  <footer id="contact" class="cc-footer">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="cc-brand mb-2">
            <span class="cc-brand-badge" aria-hidden="true"></span>
            <div class="cc-brand-text fs-4"><span>COVID</span><span>Care</span></div>
          </div>
          <p class="cc-subtitle mb-0">Online COVID test & vaccination booking system with digital reports and verified hospitals.</p>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold">Quick Links</h6>
          <div class="d-grid gap-2">
            <a href="#home">Home</a>
            <a href="#services">Services</a>
            <a href="#about">About</a>
            <a href="#guidelines">Guidelines</a>
          </div>
        </div>

        <div class="col-6 col-lg-2">
          <h6 class="fw-bold">Support</h6>
          <div class="d-grid gap-2">
            <a href="#faq">FAQ</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms</a>
            <a href="#">Help</a>
          </div>
        </div>

        <div class="col-lg-4">
          <h6 class="fw-bold">Contact</h6>
          <div class="cc-subtitle">
            <div>📍 City, Country</div>
            <div>📞 Helpline: +92-000-0000000</div>
            <div>✉️ support@covidcare.com</div>
          </div>
          <div class="mt-3 d-flex gap-2 flex-wrap">
            <a class="btn btn-cc btn-cc-primary px-4" href="{{route('authRole')}}" id="login">Login</a>
            <a class="btn btn-cc btn-cc-outline px-4" href="{{route('authRole')}}">Register</a>
          </div>
        </div>
      </div>

      <hr class="my-4" />
      <div class="d-flex flex-wrap justify-content-between align-items-center cc-subtitle small">
        <div>© 2025 COVIDCare. All rights reserved.</div>
        <div class="d-flex gap-3">
          <a href="#">Privacy</a>
          <a href="#">Terms</a>
          <a href="#">Contact</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Smooth scroll JS) -->
  <script src={{asset("home/assets/js/home.js")}}></script>
</body>
</html>
