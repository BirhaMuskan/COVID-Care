@extends('home.navbar')
@section('content')
<section id="hero" class="cc-hero">

  <div class="container">
    <div class="row align-items-center">

      <!-- LEFT -->
      <div class="col-lg-6">
        <div class="cc-hero-card p-5">

          <div class="cc-hero-badges mb-4">
            <span class="cc-badge"><i class="bi bi-shield-check me-1"></i> Verified Hospitals</span>
            <span class="cc-badge"><i class="bi bi-clock me-1"></i> 24/7 Support</span>
            <span class="cc-badge"><i class="bi bi-star-fill me-1"></i> Trusted by Users</span>
          </div>

          <h1 class="mb-3">
            Easy & Safe <span class="text-warning">COVIDCare</span><br>
            Testing and Vaccination Online
          </h1>

          <p class="mb-4">
            Book COVID tests, view results, and manage vaccination appointments with secure online access from anywhere.
          </p>

          <div class="d-flex gap-3 flex-wrap">
            <a href="#" class="btn btn-cc btn-cc-primary">Book Test / Vaccination</a>
            <a href="#" class="btn btn-cc btn-cc-hero-outline">
              <i class="bi bi-play-circle me-2"></i> How It Works
            </a>
          </div>

        </div>
      </div>

      <!-- RIGHT -->
      <div class="col-lg-6">
        <div class="cc-layout-hero-visual text-center">
          <img src="{{asset('home/assets/image/hospital.jpg')}}" class="img-fluid rounded-4">

          <div class="cc-layout-float-card">
            <strong>Next Available</strong><br>
            Today 2:30 PM
          </div>
        </div>
      </div>

    </div>
  </div>

</section>

<section id="about" class="cc-page-home cc-page-home-about py-5">

  <div class="container">
    <div class="row g-5 align-items-center">

      <!-- LEFT IMAGE -->
      <div class="col-lg-6">
        <div class="cc-page-home-about-visual position-relative">
          <img src="{{asset('home/assets/image/doctorsworking.jpg')}}" class="img-fluid rounded-4">

          <div class="cc-page-home-about-float">
            <strong>25+</strong>
            <span>Partner Hospitals</span>
          </div>
        </div>
      </div>

      <!-- RIGHT CONTENT -->
      <div class="col-lg-6">
        <h2 class="mb-3">Trusted Online COVIDCare Platform</h2>
        <p class="cc-muted mb-4">
          Manage COVID testing and vaccination appointments securely online. Get instant access to test results and vaccination records from verified hospitals.
        </p>

        <div class="row g-4">

          <div class="col-md-6">
            <div class="cc-card p-4">
              <h4 class="mb-1">10k+</h4>
              <p class="cc-muted mb-0">Tests Conducted</p>
            </div>
          </div>

          <div class="col-md-6">
            <div class="cc-card p-4">
              <h4 class="mb-1">5k+</h4>
              <p class="cc-muted mb-0">Vaccinations Done</p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>

</section>

<section id="features" class="cc-page-home cc-page-home-features py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2>How COVIDCare Works</h2>
      <p class="cc-muted">Seamless online COVID test and vaccination management for patients, hospitals, and admins</p>
    </div>

    <div class="row g-4">

      <!-- Card 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="cc-card">
          <img src="{{ asset('home/assets/image/doctor working.jpg') }}" alt="Patient Registration">
          <h3>Patient Registration</h3>
          <p>Patients can register online with their details and create a secure profile for managing COVID test and vaccination appointments.</p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-4 col-md-6">
        <div class="cc-card">
          <img src="{{ asset('home/assets/image/hospital outer area.jpg') }}" alt="Search Hospitals">
          <h3>Search Hospitals</h3>
          <p>Quickly find nearby hospitals offering COVID tests and vaccinations. Filter by services, city, and availability.</p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-lg-4 col-md-6">
        <div class="cc-card">
          <img src="{{ asset('home/assets/image/hospital.jpg') }}" alt="Book Appointment">
          <h3>Book Appointment</h3>
          <p>Reserve your test or vaccination slot online. Receive instant confirmation and reminders for your appointment.</p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-lg-4 col-md-6">
        <div class="cc-card">
          <img src="{{ asset('home/assets/image/doctor microscope.jpg') }}" alt="View Results">
          <h3>View Results</h3>
          <p>Patients can view their COVID test results and vaccination status directly through their secure online profile.</p>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-lg-4 col-md-6">
        <div class="cc-card">
          <img src="{{ asset('home/assets/image/reception.jpg') }}" alt="Hospital Management">
          <h3>Hospital Management</h3>
          <p>Hospitals can manage patient requests, approve appointments, update COVID test results, and track vaccination records.</p>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-lg-4 col-md-6">
        <div class="cc-card">
          <img src="{{ asset('home/assets/image/doctor file.jpg') }}" alt="Admin Dashboard">
          <h3>Admin Dashboard</h3>
          <p>Admins can monitor all patient and hospital activities, generate reports, and manage vaccination availability seamlessly.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<section id="why-choose" class="cc-page-home-why py-5">
  <div class="container">

    <!-- Heading -->
    <div class="text-center mb-5">
      <h2 class="cc-gradient-heading">
        Why Choose <span>COVIDCare</span>
      </h2>
      <p class="cc-muted">
        Simplifying online COVID testing and vaccination for everyone.
      </p>
    </div>

    

    <!-- Features -->
    <div class="cc-features-flex justify-content-center">
      <div class="feature-item">
        <div class="feature-icon">
          <img src="{{ asset('home/assets/image/doctors walking.jpg') }}" alt="Secure & Safe">
        </div>
        <h4>Secure & Safe</h4>
        <p>All patient data is encrypted and securely managed. Your health information is private and protected.</p>
      </div>

      <div class="feature-item">
        <div class="feature-icon">
          <img src="{{ asset('home/assets/image/doctor file.jpg') }}" alt="Easy Booking">
        </div>
        <h4>Easy Online Booking</h4>
        <p>Quickly book COVID tests and vaccination appointments online without any hassle or paperwork.</p>
      </div>

      <div class="feature-item">
        <div class="feature-icon">
          <img src="{{ asset('home/assets/image/doctorsworking.jpg') }}" alt="Real-Time Updates">
        </div>
        <h4>Real-Time Updates</h4>
        <p>Receive instant notifications for appointment confirmations, test results, and vaccination reminders.</p>
      </div>
    </div>
  </div>
</section>



@endsection