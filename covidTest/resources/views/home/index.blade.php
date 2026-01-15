@extends('home.navbar')

@section('content')

  <style>
    :root{
      --cc-blue:#1c6ae4;
      --cc-blue-2:#2f7cf0;
      --cc-green:#18a06a;
      --cc-red:#e64646;
      --cc-ink:#0b1b3a;
      --cc-muted:#6c7a90;
      --cc-bg:#f4f8ff;
      --cc-card:#ffffff;
      --cc-border:rgba(15,23,42,.10);
      --cc-shadow: 0 18px 45px rgba(16,24,40,.08);
      --cc-shadow-sm: 0 10px 25px rgba(16,24,40,.06);
      --cc-radius: 18px;
      --cc-radius-lg: 24px;
    }

    *{box-sizing:border-box}
    body{
      margin:0;
      font-family:Poppins,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      color:var(--cc-ink);
      background:var(--cc-bg);
    }
    .container{ width:min(1180px, calc(100% - 40px)); margin:0 auto; }

   
    .brand{ display:flex; align-items:center; gap:10px; font-weight:800; letter-spacing:.2px; color:#fff; }
    .brand-badge{
      width:36px; height:36px; border-radius:12px;
      background:linear-gradient(135deg, var(--cc-blue), var(--cc-blue-2));
      box-shadow:var(--cc-shadow-sm);
      display:grid; place-items:center; color:#fff; font-weight:900;
    }


    /* ===== Hero wrapper ===== */
    .hero-wrap{ padding:92px 0 30px; }

    .hero{
      position:relative;
      border-radius:28px;
      overflow:hidden;
      min-height:520px;
      box-shadow:var(--cc-shadow);
      border:1px solid var(--cc-border);

      /* BACKGROUND IMAGE GOES HERE (replace later) */
      background:
        url("{{ asset('home/assets/image/hero.png') }}") center/cover no-repeat;
      background-color:#dbeafe; /* fallback */
    }

    /* LEFT SHADING (gradually fades to right) + slight overall tint */
    .hero::before{
      content:"";
      position:absolute; inset:0;
      background:
        /* main left-to-right shed */
        linear-gradient(90deg,
          rgba(9, 30, 66, .74) 0%,
          rgba(9, 30, 66, .56) 22%,
          rgba(9, 30, 66, .34) 42%,
          rgba(9, 30, 66, .12) 60%,
          rgba(9, 30, 66, 0) 72%
        ),
        /* gentle cool tint over image */
        radial-gradient(900px 520px at 22% 42%, rgba(28,106,228,.25), rgba(28,106,228,0) 60%);
      pointer-events:none;
      z-index:1;
    }

    /* Content layer on top */
    .hero-inner{
      position:relative;
      z-index:2;
      padding:54px 54px 110px;
      display:grid;
      grid-template-columns: 1.1fr .9fr;
      gap:26px;
      align-items:center;
    }

    .hero h1{
      margin:0 0 14px;
      font-size:52px;
      line-height:1.06;
      letter-spacing:-.7px;
      color:#fff;
      text-shadow:0 10px 35px rgba(0,0,0,.22);
      max-width:620px;
    }
    .hero p{
      margin:0 0 22px;
      max-width:520px;
      color:rgba(255,255,255,.86);
      font-size:15px;
      line-height:1.75;
    }

    .hero-cta{
      display:flex; align-items:center; gap:14px; flex-wrap:wrap;
    }

    .btn{
      border:none; border-radius:14px;
      padding:12px 16px;
      font-weight:700;
      cursor:pointer;
      transition:.15s ease;
      font-size:14px;
      display:inline-flex; align-items:center; gap:10px;
      text-decoration:none;
      user-select:none;
    }
    .btn-primary{
      background:linear-gradient(135deg, var(--cc-blue), var(--cc-blue-2));
      color:#fff;
      box-shadow:0 14px 30px rgba(28,106,228,.30);
    }
    .btn-primary:hover{ transform:translateY(-1px); }

    .btn-ghost{
      background:rgba(255,255,255,.14);
      border:1px solid rgba(255,255,255,.22);
      color:#fff;
      backdrop-filter: blur(10px);
    }
    .btn-ghost:hover{ background:rgba(255,255,255,.20); }

    .play{
      width:34px; height:34px; border-radius:12px;
      background:rgba(255,255,255,.18);
      border:1px solid rgba(255,255,255,.24);
      display:grid; place-items:center;
    }
    .triangle{
      width:0;height:0;
      border-left:9px solid #fff;
      border-top:6px solid transparent;
      border-bottom:6px solid transparent;
      margin-left:2px;
      opacity:.95;
    }

    /* Right side: keep EMPTY / placeholder area (no separate card),
       so it still looks like the screenshot where image is background */
    .hero-placeholder{
      height:320px;
      border-radius:24px;
      border:1px dashed rgba(255,255,255,.32);
      background:rgba(255,255,255,.06);
      display:grid;
      place-items:center;
      text-align:center;
      padding:18px;
      color:rgba(255,255,255,.85);
      backdrop-filter: blur(6px);
    }
    .hero-placeholder strong{ display:block; color:#fff; margin-bottom:6px; }
    .hero-placeholder code{
      color:#fff;
      background:rgba(0,0,0,.18);
      padding:2px 6px;
      border-radius:8px;
      border:1px solid rgba(255,255,255,.14);
    }

    /* Floating stats bar like the design */
    .stats{
      position:absolute;
      left:54px; right:54px;
      bottom:18px;
      z-index:3;

      background:rgba(255,255,255,.72);
      backdrop-filter: blur(10px);
      border:1px solid rgba(255,255,255,.30);
      border-radius:22px;
      box-shadow:var(--cc-shadow-sm);
      padding:18px 18px;

      display:grid;
      grid-template-columns: repeat(4, 1fr);
      gap:12px;
    }
    .stat{ padding:10px 12px; border-radius:16px; }
    .stat .num{ font-size:22px; font-weight:800; color:var(--cc-ink); letter-spacing:-.3px; }
    .stat .lbl{ font-size:12px; color:rgba(11,27,58,.62); font-weight:600; }

    /* Optional small badge (top right) */
    .badge{
      position:absolute;
      right:22px; top:82px;
      z-index:4;
      background:rgba(255,255,255,.78);
      border:1px solid rgba(255,255,255,.42);
      border-radius:18px;
      padding:10px 12px;
      display:flex; align-items:center; gap:10px;
      box-shadow:var(--cc-shadow-sm);
      backdrop-filter: blur(10px);
    }
    .badge .dot{
      width:10px; height:10px; border-radius:999px;
      background:var(--cc-green);
      box-shadow:0 0 0 6px rgba(24,160,106,.15);
    }
    .badge .big{ font-weight:800; color:var(--cc-ink); line-height:1; }
    .badge .small{ font-size:12px; color:rgba(11,27,58,.62); font-weight:600; }

    /* Responsive */
    @media (max-width: 980px){
      .nav-links{display:none}
      .hero-inner{ grid-template-columns:1fr; padding:40px 26px 120px; }
      .hero h1{ font-size:42px; }
      .stats{ grid-template-columns: repeat(2,1fr); left:26px; right:26px; }
      .badge{ top:74px; }
    }
    @media (max-width: 520px){
      .hero h1{ font-size:34px; }
      .stats{ grid-template-columns:1fr; }
      .icon-btn{ width:40px; height:40px; }
      .badge{ display:none; }
    }
  </style>
   <!-- HERO -->
  <main class="hero-wrap">
    <div class="container">
      <section class="hero" aria-label="Hero">

        <!-- Optional badge -->
        <div class="badge" aria-label="Patients recovered">
          <span class="dot" aria-hidden="true"></span>
          <div>
            <div class="big">150K+</div>
            <div class="small">Bookings supported</div>
          </div>
        </div>

        <div class="hero-inner">
          <!-- LEFT: text on top of shaded background -->
          <div>
            <h1>Compassionate care,<br/>exceptional results</h1>
            <p>
              COVIDCare helps you book a COVID test, register for vaccination, and find verified hospitals near you.
              Simple steps, fast booking, and clear guidance.
            </p>

            <div class="hero-cta">
              <a class="btn btn-primary" href="{{route('authRole')}}">
                Register as a Patient <span aria-hidden="true"></span>
              </a>

              <a class="btn btn-ghost" href="{{route('authRole')}}">
                {{-- <span class="play" aria-hidden="true"></span> --}}
                Register as a Hospital
              </a>
            </div>
          </div>
        </div>

        <!-- STATS BAR -->
        <div class="stats" role="list" aria-label="Quick stats">
          <div class="stat" role="listitem">
            <div class="num">2000+</div>
            <div class="lbl">Partner hospitals</div>
          </div>
          <div class="stat" role="listitem">
            <div class="num">95%</div>
            <div class="lbl">User satisfaction</div>
          </div>
          <div class="stat" role="listitem">
            <div class="num">5000+</div>
            <div class="lbl">Tests & vaccines booked</div>
          </div>
          <div class="stat" role="listitem">
            <div class="num">100,000+</div>
            <div class="lbl">Patients</div>
          </div>
        </div>

      </section>
    </div>
  </main>

      <!-- QUICK ACTION BAR -->
      {{-- <div class="cc-quickbar mt-4">
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
  </header> --}}


 

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
          <a href="{{route('showSearch')}}"  class="btn btn-danger rounded-pill px-4">
            Explore Hospitals
          </a>
          <a href="{{route('aboutPage')}}"  class="btn btn-outline-light rounded-pill px-4">
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
<section id="workflow" class="py-5">
  <div class="container">

    <div class="text-center mb-5">
  <h2 class="mb-2">How <span class="text-accent">COVIDCare</span> Works</h2>
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
        <img src="{{ asset('home/assets/image/search-hospital.png') }}" class="img-fluid rounded-4" alt="Search Hospitals">
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
        <img src="{{ asset('home/assets/image/book appointment.png') }}" class="img-fluid rounded-4" alt="Book Appointment">
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
        <img src="{{ asset('home/assets/image/result.png') }}" class="img-fluid rounded-4" alt="View Results">
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
  <section id="about" style="padding-top:150px; padding-bottom:200px;">
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
            <a href="{{route('authRole')}}"  class="btn btn-cc btn-cc-success px-4">Register Now</a>
            <a href="{{route('guidelinePage')}}"  class="btn btn-cc btn-cc-outline px-4">View Guidelines</a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="cc-card p-4">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <h5 class="fw-bold mb-1">Safe &amp; Verified Process</h5>
                <div class="cc-subtitle">Appointments, approvals, and reports in one system.</div>
              </div>
              {{-- <span class="badge text-bg-primary rounded-pill">Trusted</span> --}}
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