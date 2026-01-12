@extends('home.navbar')

@section('content')

  <!-- HERO -->
  <header id="home" class="cc-hero">
    <div class="container">
      <div class="cc-hero-card p-4 p-lg-5">
        <div class="row g-4 align-items-center">
          <div class="col-lg-7 position-relative">
            <div class="cc-hero-badges mb-3">
              <span class="cc-badge">Approved Hospitals</span>
              <span class="cc-badge">Digital Reports</span>
              <span class="cc-badge">Fast Booking</span>
            </div>

            <h1 class="display-5 mb-3">Online COVID Test &amp;<br class="d-none d-md-block"> Vaccination Booking System</h1>
            <p class="lead mb-4">Get tested and vaccinated easily online. Search hospitals, book appointments, and view your reports securely.</p>

            <div class="d-flex flex-wrap gap-3">
              <a href="{{route('userRegForm')}}" class="btn btn-cc btn-cc-primary px-4">Book COVID Test</a>
              <a href="{{route('userRegForm')}}" class="btn btn-cc btn-cc-success px-4">Book Vaccination</a>
              <a href="#find-hospital" class="btn btn-cc btn-cc-outline px-4 text-white border-white" style="background:rgba(255,255,255,.12);">Find Hospital</a>
            </div>
          </div>

<div class="col-lg-5 position-relative d-none d-lg-block">

  <!-- Glow behind -->
  <div style="
    position:absolute;
    right:-90px;
    top:50%;
    transform:translateY(-50%);
    width:380px;
    height:380px;
    background:rgba(255,255,255,0.18);
    filter:blur(70px);
    border-radius:50%;
    z-index:0;
  "></div>

  <!-- Image on top (not blurred) -->
  <div style="
    position:absolute;
    right:-80px;
    top:50%;
    transform:translateY(-50%);
    width:520px;
    z-index:2;
    pointer-events:none;
    padding-right:50px;
  ">
    <img
      src="{{ asset('home/assets/image/doctors.png') }}"
      alt="Medical Team"
      class="img-fluid"
      style="
        filter: drop-shadow(0 22px 45px rgba(0,0,0,0.28));
      "
    >
  </div>

</div>


        </div>
      </div>

      <!-- QUICK ACTION BAR -->
      <div class="cc-quickbar mt-4">
        <div class="row g-0">
          <div class="col-md-3 border-end">
            <div class="cc-quick-item">
              <div class="cc-icon">🔎</div>
              <div>
                <h6>Find Hospital</h6>
                <small>Search by city & service</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 border-end">
            <div class="cc-quick-item">
              <div class="cc-icon">📅</div>
              <div>
                <h6>Book Appointment</h6>
                <small>Choose date & slot</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 border-end">
            <div class="cc-quick-item">
              <div class="cc-icon">🧾</div>
              <div>
                <h6>View Result</h6>
                <small>Check test/vaccine status</small>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="cc-quick-item">
              <div class="cc-icon">👤</div>
              <div>
                <h6>Login / Register</h6>
                <small>Access your dashboard</small>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </header>


 

   <!-- Hospital Section  -->

 <section class="hospitals-section">

  <div class="container">

    <!-- SECTION HEADER -->
    <div class="section-header text-center">
      <h2 class="section-title">Verified Partner Hospitals</h2>
      <p class="section-subtitle">
        Trusted medical institutions providing COVID testing, vaccination,
        and professional patient care.
      </p>
    </div>

    <!-- LEFT ARROW -->
    <button class="slider-arrow left" onclick="scrollHospitals(-1)">
      &#10094;
    </button>

    <!-- RIGHT ARROW -->
    <button class="slider-arrow right" onclick="scrollHospitals(1)">
      &#10095;
    </button>

    <!-- SLIDER -->
    <div class="hospital-slider" id="hospitalSlider">

      @foreach($hospitals as $hospital)
        <div class="hospital-card">

          <img src="{{ asset('storage/hospitalImages/' . $hospital->image) }}"
               alt="{{ $hospital->name }}">

          <h5>{{ $hospital->name }}</h5>

          @if($hospital->services == 'both')
            <span class="service-both">COVID Testing & Vaccination</span>
          @elseif($hospital->services == 'covidTest')
            <span class="service-covid">COVID Testing</span>
          @elseif($hospital->services == 'vaccination')
            <span class="service-vaccine">Vaccination</span>
          @endif

        </div>
      @endforeach

    </div>

  </div>
</section>

<section id="workflow" class="py-5">
  <div class="container">

    <div class="text-center mb-5">
      <h2 class="mb-2">How COVIDCare Works</h2>
      <p class="cc-muted">A smooth, simple, and safe COVID testing and vaccination experience</p>
    </div>

    <!-- Step 1 -->
    <div class="row align-items-center mb-5">
      <div class="col-md-6 image">
        <img src="{{ asset('home/assets/image/register.png') }}" class="img-fluid rounded-4" alt="Patient Registration">
      </div>
      <div class="col-md-6">
        <div class="workflow-text">
          <span class="step-number">1</span>
          <h3>Patient Registration</h3>
          <p>Create your secure profile online. Add your details once, and manage all your COVID test and vaccination appointments easily.</p>
        </div>
      </div>
    </div>

    <!-- Step 2 -->
    <div class="row align-items-center mb-5 flex-md-row-reverse">
      <div class="col-md-6 image">
        <img src="{{ asset('home/assets/image/hospital outer area.jpg') }}" class="img-fluid rounded-4" alt="Search Hospitals">
      </div>
      <div class="col-md-6">
        <div class="workflow-text">
          <span class="step-number">2</span>
          <h3>Search Hospitals</h3>
          <p>Quickly find nearby verified hospitals offering COVID tests and vaccinations. Filter by services, city, and availability for convenience.</p>
        </div>
      </div>
    </div>

    <!-- Step 3 -->
    <div class="row align-items-center mb-5">
      <div class="col-md-6 image">
        <img src="{{ asset('home/assets/image/hospital.jpg') }}" class="img-fluid rounded-4" alt="Book Appointment">
      </div>
      <div class="col-md-6">
        <div class="workflow-text">
          <span class="step-number">3</span>
          <h3>Book Appointment</h3>
          <p>Reserve your test or vaccination slot online. Receive instant confirmations and reminders to stay on track with your health.</p>
        </div>
      </div>
    </div>

    <!-- Step 4 -->
    <div class="row align-items-center mb-5 flex-md-row-reverse">
      <div class="col-md-6 image">
        <img src="{{ asset('home/assets/image/doctor microscope.jpg') }}" class="img-fluid rounded-4" alt="View Results">
      </div>
      <div class="col-md-6">
        <div class="workflow-text">
          <span class="step-number">4</span>
          <h3>View Results</h3>
          <p>Securely access your COVID test reports online and monitor your vaccination records from your profile.</p>
        </div>
      </div>
    </div>

  </div>
</section>



 <!-- 2nd New Section -->

 
<section class="image-feature-section">
  <div class="overlay"></div>

  <div class="container position-relative">
    <div class="row">
      <div class="col-lg-6 text-white">

        <small class="section-label">HEALTHCARE SERVICES</small>

        <h2 class="section-heading">
          Smart Care for <br>
          <span>Your Health</span>
        </h2>

        <p class="section-text">
          Book COVID tests, manage vaccination records,
          and connect with verified hospitals and doctors
          through one secure platform.
        </p>

      </div>
    </div>

    <!-- SERVICE BOXES -->
    <div class="service-boxes">
      <div class="service-box"id="one">
        <h6>Working Hours</h6>
        <p>Mon – Sat<br><strong>9am – 8pm</strong></p>
      </div>

      <div class="service-box " id="two">
        <h6>Book Appointment</h6>
        <p>Online & instant booking</p>
      </div>

      <div class="service-box"id="three">
        <h6>Emergency Support</h6>
        <p><strong>24/7</strong> Helpline</p>
      </div>
    </div>

  </div>
</section>

 
     

 

  <!-- ABOUT -->
  <section id="about">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6">
          <h2 class="cc-section-title mb-3">About COVIDCare</h2>
          <p class="cc-subtitle">
            COVIDCare is an online platform that connects patients with hospitals for COVID-19 test and vaccination
            appointments. It helps users track appointments, results, and vaccination history safely.
          </p>

          <div class="cc-card p-4">
            <h6 class="fw-bold mb-2">Why Choose Us?</h6>
            <ul class="mb-0 cc-subtitle">
              <li>Verified hospitals and appointment slots</li>
              <li>Fast booking with status tracking</li>
              <li>Digital reports and vaccination history</li>
              <li>Admin monitoring and reporting</li>
            </ul>
          </div>

          <div class="mt-3 d-flex gap-2 flex-wrap">
            <a href="#register" class="btn btn-cc btn-cc-success px-4">Register Now</a>
            <a href="#guidelines" class="btn btn-cc btn-cc-outline px-4">View Guidelines</a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="cc-card p-4">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h5 class="fw-bold mb-1">Safe &amp; Verified Process</h5>
                <div class="cc-subtitle">Appointments, approvals, and reports in one system.</div>
              </div>
              <span class="badge text-bg-primary rounded-pill">Trusted</span>
            </div>
            <hr />
            <div class="row g-3">
              <div class="col-md-6">
                <div class="cc-card p-3 h-100" style="box-shadow:none;">
                  <div class="fw-bold">Patient</div>
                  <div class="cc-subtitle small">Book & track easily</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="cc-card p-3 h-100" style="box-shadow:none;">
                  <div class="fw-bold">Hospital</div>
                  <div class="cc-subtitle small">Update results/status</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="cc-card p-3 h-100" style="box-shadow:none;">
                  <div class="fw-bold">Admin</div>
                  <div class="cc-subtitle small">Approve & report</div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="cc-card p-3 h-100" style="box-shadow:none;">
                  <div class="fw-bold">Reports</div>
                  <div class="cc-subtitle small">Date/week/month export</div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
<!-- New section -->
 <section class="hero-health py-5" >
  <div class="container">
    <div class="row align-items-center g-5">

      <!-- LEFT CONTENT -->
      <div class="col-md-6 text-white">

        <span class="badge bg-light text-primary mb-3 px-3 py-2">
          Verified Healthcare Network
        </span>

        <h1 class="fw-bold mb-3" style="line-height:1.2;">
          Trusted Hospitals <br>
          <span style="color:#ffd27d;">Qualified Doctors</span>
        </h1>

        <p class="opacity-75 mb-4" style="max-width:460px;">
          Connect with verified hospitals and experienced doctors.
          Book appointments, manage patient records, and access
          COVID services — all in one secure platform.
        </p>

        <div class="d-flex gap-3 mb-4">
          <a href="#" class="btn btn-danger rounded-pill px-4">
            Explore Hospitals
          </a>
          <a href="#" class="btn btn-outline-light rounded-pill px-4">
            Learn More
          </a>
        </div>

        <!-- STATS (MOVED INSIDE LEFT COLUMN) -->
        <div class="d-flex gap-5 mt-3">
          <div>
            <h4 class="fw-bold mb-0">500+</h4>
            <small class="opacity-75">Hospitals</small>
          </div>
          <div>
            <h4 class="fw-bold mb-0">10k+</h4>
            <small class="opacity-75">Patients</small>
          </div>
        </div>

      </div>

      <!-- RIGHT IMAGE -->
      <div class="col-md-6 text-center position-relative">
        <div class="doctor-image mx-auto">
          <img src="{{ asset('home/assets/image/doctor.jpg') }}" alt="Doctor">
        </div>
      </div>

    </div>
  </div>
</section>


  <!-- FAQ -->
  <section id="faq" style="padding-top:0;">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="cc-section-title">FAQ — Frequently Asked Questions</h2>
        <p class="cc-subtitle mb-0">Common questions about booking and reports.</p>
      </div>

      <div class="accordion" id="faqAcc">
        <div class="accordion-item mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#q1" aria-expanded="true">
              How do I book a COVID test?
            </button>
          </h2>
          <div id="q1" class="accordion-collapse collapse show" data-bs-parent="#faqAcc">
            <div class="accordion-body cc-subtitle">
              Register/login as a patient, search a hospital, select COVID test, choose a date/time slot, and submit the request.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q2">
              Who approves my appointment request?
            </button>
          </h2>
          <div id="q2" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
            <div class="accordion-body cc-subtitle">
              The hospital can approve/reject requests. In some workflows, admin approval may also be involved based on system policy.
            </div>
          </div>
        </div>

        <div class="accordion-item mb-3">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q3">
              How do I view my test result or vaccination status?
            </button>
          </h2>
          <div id="q3" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
            <div class="accordion-body cc-subtitle">
              After the hospital updates your result/status, you can view it in your Patient Dashboard under “View Results”.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#q4">
              Can hospitals register on the platform?
            </button>
          </h2>
          <div id="q4" class="accordion-collapse collapse" data-bs-parent="#faqAcc">
            <div class="accordion-body cc-subtitle">
              Yes. Hospitals register first, then admin approves the hospital before it becomes available for patient bookings.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cc-cta" id="register">
    <div class="container">
      <div class="cc-cta-box">
        <div class="row g-4 align-items-center">
          <div class="col-lg-8">
            <h3 class="fw-bold mb-2">Stay Safe. Get Tested. Get Vaccinated.</h3>
            <p class="cc-subtitle mb-0">Create your account and start booking appointments with approved hospitals.</p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a class="btn btn-cc btn-cc-success px-5" href="{{route('authRole')}}">Register Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  
@endsection