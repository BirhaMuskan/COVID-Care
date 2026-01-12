@extends('home.navbar') 
@section('content')

<main class="guide-page">

  <!-- HERO -->
  <section id="home" class="guide-hero">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-6">
          <div class="guide-eyebrow">Simple • Fast • Verified Hospitals</div>
          <h1 class="guide-title">Book Your COVID Test<br>or Vaccination Easily</h1>
          <p class="guide-lead">
            COVIDCare helps you find hospitals, request a COVID test or vaccination,
            and track your appointment — all in one place.
          </p>

          <div class="d-flex gap-2 flex-wrap mt-3">
            <a class="btn btn-cc btn-cc-primary px-4" href="#patient">I’m a Patient</a>
            <a class="btn btn-cc btn-cc-outline px-4" href="#hospital">I’m a Hospital</a>
          </div>

          <div class="guide-badges mt-4">
            <span class="guide-badge">Easy Booking</span>
            <span class="guide-badge">Appointment Tracking</span>
            <span class="guide-badge">Results & Status</span>
          </div>
        </div>

        <!-- Collage with REAL images -->
        <div class="col-lg-6">
          <div class="guide-collage">
            <div class="tile tile-a">
              <img
                src="{{asset('home/assets/image/guidelines/hero-hospital.jpg')}}"
                alt="Hospital"
                onerror="this.src='https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=1200&q=70';"
              />
              <div class="tile-cap">Verified Hospitals</div>
            </div>

            <div class="tile tile-b">
              <img
                src="{{asset('home/assets/image/guidelines/hero-search.jpg')}}"
                alt="Search"
                onerror="this.src='https://images.unsplash.com/photo-1584982751601-97dcc096659c?auto=format&fit=crop&w=900&q=70';"
              />
              <div class="tile-cap">Search</div>
            </div>

            <div class="tile tile-c">
              <img
                src="{{asset('home/assets/image/guidelines/hero-booking.jpg')}}"
                alt="Booking"
                onerror="this.src='https://images.unsplash.com/photo-1582719478171-2ff7b57a7b18?auto=format&fit=crop&w=900&q=70';"
              />
              <div class="tile-cap">Booking</div>
            </div>

            <div class="tile tile-d">
              <img
                src="{{asset('home/assets/image/guidelines/hero-approval.jpg')}}"
                alt="Approval"
                onerror="this.src='https://images.unsplash.com/photo-1559757175-5700dde67548?auto=format&fit=crop&w=900&q=70';"
              />
              <div class="tile-cap">Approval</div>
            </div>

            <div class="tile tile-e">
              <img
                src="{{asset('home/assets/image/guidelines/hero-result.jpg')}}"
                alt="Result"
                onerror="this.src='https://images.unsplash.com/photo-1584516150909-c43483ee7932?auto=format&fit=crop&w=900&q=70';"
              />
              <div class="tile-cap">Result</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick cards bar -->
      <div class="guide-quickbar mt-4">
        <div class="row g-0">
          <div class="col-md-4">
            <div class="guide-quick-item">
              <div class="guide-icon">1</div>
              <div>
                <div class="fw-bold">Choose Service</div>
                <div class="cc-subtitle small">Test / Vaccine</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 border-start">
            <div class="guide-quick-item">
              <div class="guide-icon">2</div>
              <div>
                <div class="fw-bold">Book Slot</div>
                <div class="cc-subtitle small">Pick a time</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 border-start">
            <div class="guide-quick-item">
              <div class="guide-icon">3</div>
              <div>
                <div class="fw-bold">Track Status</div>
                <div class="cc-subtitle small">My Appointment</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- QUICK START (3 big picture cards) -->
  <section class="guide-section guide-soft">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end gap-3 mb-4 flex-wrap">
        <div>
          <h2 class="cc-section-title mb-1">Quick Start</h2>
          <p class="cc-subtitle mb-0">Choose what you want to do — patient booking or hospital onboarding.</p>
        </div>
        <a class="btn btn-cc btn-cc-outline px-4" href="#faq">FAQs</a>
      </div>

      <div class="row g-4">
        <div class="col-lg-4">
          <article class="guide-card">
            <div class="guide-card-img">
              <img
                src="{{asset('home/assets/image/guidelines/patient-test.jpg')}}"
                alt="Patient Test"
                onerror="this.src='https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1200&q=70';"
              />
              <span class="guide-chip">Patient</span>
            </div>
            <div class="guide-card-body">
              <h3>Book a Test</h3>
              <p>Register, find a hospital, request a test, and track your appointment.</p>
              <a class="btn btn-cc btn-cc-primary px-4" href="#patient">Patient Steps</a>
            </div>
          </article>
        </div>

        <div class="col-lg-4">
          <article class="guide-card">
            <div class="guide-card-img">
              <img
                src="{{asset('home/assets/image/guidelines/patient-vaccine.jpg')}}"
                alt="Patient Vaccine"
                onerror="this.src='https://images.unsplash.com/photo-1615461066841-6116e61058f4?auto=format&fit=crop&w=1200&q=70';"
              />
              <span class="guide-chip guide-chip-green">Patient</span>
            </div>
            <div class="guide-card-body">
              <h3>Book a Vaccination</h3>
              <p>Choose vaccine service, book a slot, and view vaccination status.</p>
              <a class="btn btn-cc btn-cc-success px-4" href="#patient">Patient Steps</a>
            </div>
          </article>
        </div>

        <div class="col-lg-4">
          <article class="guide-card">
            <div class="guide-card-img">
              <img
                src="{{asset('home/assets/image/guidelines/hospital-register.jpg')}}"
                alt="Hospital Register"
                onerror="this.src='https://images.unsplash.com/photo-1576765608866-5b51046452be?auto=format&fit=crop&w=1200&q=70';"
              />
              <span class="guide-chip guide-chip-red">Hospital</span>
            </div>
            <div class="guide-card-body">
              <h3>Register as Hospital</h3>
              <p>Submit hospital details, get approved, and start managing requests.</p>
              <a class="btn btn-cc btn-cc-outline px-4" href="#hospital">Hospital Steps</a>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <!-- PATIENT GUIDE -->
  <section id="patient" class="guide-section">
    <div class="container">
      <div class="row align-items-center g-4">
        <div class="col-lg-6">
          <h2 class="cc-section-title mb-2">For Patients: How to Book</h2>
          <p class="cc-subtitle mb-4">
            Booking on COVIDCare is designed to be simple. Create your account once,
            then request a test or vaccination anytime.
          </p>

          <div class="guide-steps">
            <div class="step">
              <div class="num">1</div><div><b>Create Patient Account</b><div class="cc-subtitle small">Register with basic details.</div></div>
            </div>
            <div class="step">
              <div class="num">2</div><div><b>Search Hospitals by Service</b><div class="cc-subtitle small">Filter by test/vaccine.</div></div>
            </div>
            <div class="step">
              <div class="num">3</div><div><b>Send Request</b><div class="cc-subtitle small">Select Test / Vaccine and submit.</div></div>
            </div>
            <div class="step">
              <div class="num">4</div><div><b>Book Appointment Slot</b><div class="cc-subtitle small">Pick available time.</div></div>
            </div>
            <div class="step">
              <div class="num">5</div><div><b>Track in “My Appointment”</b><div class="cc-subtitle small">View pending/approved.</div></div>
            </div>
            <div class="step">
              <div class="num">6</div><div><b>View Results / Status</b><div class="cc-subtitle small">See result/vaccination status.</div></div>
            </div>
          </div>

          <div class="d-flex gap-2 flex-wrap mt-4">
            <a class="btn btn-cc btn-cc-primary px-4" href="{{route('authRole')}}">Login / Register</a>
            <a class="btn btn-cc btn-cc-outline px-4" href="#faq">FAQs</a>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="guide-strip">
            <div class="strip-tile">
              <img
                src="{{asset('home/assets/image/guidelines/screen-register.jpg')}}"
                alt="Register Screen"
                onerror="this.src='https://images.unsplash.com/photo-1582719478171-2ff7b57a7b18?auto=format&fit=crop&w=1200&q=70';"
              />
              <div class="cap">Register Screen</div>
            </div>
            <div class="strip-tile">
              <img
                src="{{asset('home/assets/image/guidelines/screen-search.jpg')}}"
                alt="Search Hospitals"
                onerror="this.src='https://images.unsplash.com/photo-1584982751601-97dcc096659c?auto=format&fit=crop&w=1200&q=70';"
              />
              <div class="cap">Search Hospitals</div>
            </div>
            <div class="strip-tile">
              <img
                src="{{asset('home/assets/image/guidelines/screen-appointment.jpg')}}"
                alt="My Appointment"
                onerror="this.src='https://images.unsplash.com/photo-1584516150909-c43483ee7932?auto=format&fit=crop&w=1200&q=70';"
              />
              <div class="cap">My Appointment</div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- HOSPITAL GUIDE (Masonry gallery) -->
  <section id="hospital" class="guide-section guide-gallery">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="cc-section-title mb-2">For Hospitals: How to Register & Operate</h2>
        <p class="cc-subtitle mb-0">
          Join COVIDCare to serve patients, manage bookings, and update test/vaccination results.
          Hospitals are verified before going live.
        </p>
      </div>

      <div class="guide-masonry">
        <div class="m-item tall">
          <img
            src="{{asset('home/assets/image/guidelines/hosp-reg.jpg')}}"
            alt="Hospital Registration"
            onerror="this.src='https://images.unsplash.com/photo-1576765608866-5b51046452be?auto=format&fit=crop&w=1200&q=70';"
          />
          <div class="m-cap">Hospital Registration</div>
        </div>

        <div class="m-item">
          <img
            src="{{asset('home/assets/image/guidelines/hosp-approval.jpg')}}"
            alt="Approval"
            onerror="this.src='https://images.unsplash.com/photo-1559757175-5700dde67548?auto=format&fit=crop&w=1200&q=70';"
          />
          <div class="m-cap">Approval</div>
        </div>

        <div class="m-item">
          <img
            src="{{asset('home/assets/image/guidelines/hosp-requests.jpg')}}"
            alt="Manage Requests"
            onerror="this.src='https://images.unsplash.com/photo-1586773860418-d37222d8fce3?auto=format&fit=crop&w=1200&q=70';"
          />
          <div class="m-cap">Manage Requests</div>
        </div>

        <div class="m-item">
          <img
            src="{{asset('home/assets/image/guidelines/hosp-results.jpg')}}"
            alt="Update Results"
            onerror="this.src='https://images.unsplash.com/photo-1584516150909-c43483ee7932?auto=format&fit=crop&w=1200&q=70';"
          />
          <div class="m-cap">Update Results</div>
        </div>

        <div class="m-item wide">
          <img
            src="{{asset('home/assets/image/guidelines/hosp-slots.jpg')}}"
            alt="Slots and Status"
            onerror="this.src='https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1400&q=70';"
          />
          <div class="m-cap">Slots + Status Updates</div>
        </div>

        <div class="m-item">
          <img
            src="{{asset('home/assets/image/guidelines/hosp-reports.jpg')}}"
            alt="Reports"
            onerror="this.src='https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=70';"
          />
          <div class="m-cap">Reports</div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section id="faq" class="guide-section">
    <div class="container">
      <div class="d-flex justify-content-between align-items-end gap-3 mb-4 flex-wrap">
        <div>
          <h2 class="cc-section-title mb-1">Frequently Asked Questions</h2>
          <p class="cc-subtitle mb-0">Common questions from patients and hospitals.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-4">
          <div class="cc-card cc-card-hover p-4 h-100">
            <div class="guide-mini-img">
              <img
                src="{{asset('home/assets/image/guidelines/faq-book.jpg')}}"
                alt="FAQ Book"
                onerror="this.src='https://images.unsplash.com/photo-1582719478171-2ff7b57a7b18?auto=format&fit=crop&w=1200&q=70';"
              />
            </div>
            <h5 class="fw-bold mt-3 mb-2">How do I book?</h5>
            <p class="cc-subtitle mb-0">Register → Search → Request → Book slot → Track in “My Appointment”.</p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="cc-card cc-card-hover p-4 h-100">
            <div class="guide-mini-img">
              <img
                src="{{asset('home/assets/image/guidelines/faq-change.jpg')}}"
                alt="FAQ Change"
                onerror="this.src='https://images.unsplash.com/photo-1584516150909-c43483ee7932?auto=format&fit=crop&w=1200&q=70';"
              />
            </div>
            <h5 class="fw-bold mt-3 mb-2">Can I cancel or change?</h5>
            <p class="cc-subtitle mb-0">You can re-submit a request or select another hospital if needed.</p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="cc-card cc-card-hover p-4 h-100">
            <div class="guide-mini-img">
              <img
                src="{{asset('home/assets/image/guidelines/faq-approve.jpg')}}"
                alt="FAQ Approve"
                onerror="this.src='https://images.unsplash.com/photo-1559757175-5700dde67548?auto=format&fit=crop&w=1200&q=70';"
              />
            </div>
            <h5 class="fw-bold mt-3 mb-2">How hospital approval works?</h5>
            <p class="cc-subtitle mb-0">Hospitals submit details → admin verifies → hospital becomes active.</p>
          </div>
        </div>
      </div>

      <div class="row g-3 mt-4">
        <div class="col-lg-4">
          <div class="cc-card p-3"><div class="cc-subtitle"><b>Support:</b> Use Contact Us or email support</div></div>
        </div>
        <div class="col-lg-4">
          <div class="cc-card p-3"><div class="cc-subtitle"><b>Status:</b> Check “My Appointment” for updates</div></div>
        </div>
        <div class="col-lg-4">
          <div class="cc-card p-3"><div class="cc-subtitle"><b>Hospitals:</b> Keep slots updated to reduce pending</div></div>
        </div>
      </div>
    </div>
  </section>

</main>

<!-- PAGE-SCOPED CSS ONLY (keeps your main css intact; uses your variables) -->
<style>
  /* account for your fixed-top navbar */
  .guide-page { padding-top: 90px; }

  .guide-hero{ padding: 2.2rem 0 1.2rem; position:relative; overflow:hidden; }
  .guide-hero:before{
    content:"";
    position:absolute; inset:-40% -20% auto -20%;
    height:520px;
    background:
      radial-gradient(circle at 20% 30%, rgba(28,106,228,.30), transparent 55%),
      radial-gradient(circle at 70% 20%, rgba(24,160,106,.18), transparent 55%),
      radial-gradient(circle at 40% 70%, rgba(14,165,233,.22), transparent 55%);
    z-index:0;
  }
  .guide-hero .container{ position:relative; z-index:1; }

  .guide-eyebrow{
    font-size:.78rem; letter-spacing:.18em; text-transform:uppercase;
    color: var(--cc-muted); font-weight:700;
  }
  .guide-title{
    margin:.6rem 0 .6rem;
    font-weight: 800;
    letter-spacing: -1px;
    font-size: clamp(2.2rem, 4.1vw, 3.4rem);
    line-height: 1.06;
    color: var(--cc-ink);
  }
  .guide-lead{
    color: var(--cc-muted);
    line-height: 1.75;
    max-width: 58ch;
    margin: 0;
  }
  .guide-badges{ display:flex; gap:.6rem; flex-wrap:wrap; }
  .guide-badge{
    background: rgba(28,106,228,.08);
    border: 1px solid rgba(28,106,228,.18);
    padding: .5rem .85rem;
    border-radius: 999px;
    font-size:.85rem;
    color: var(--cc-blue);
    font-weight: 600;
  }

  /* Collage */
  .guide-collage{
    display:grid;
    grid-template-columns: 1fr 1fr;
    grid-auto-rows: 160px;
    gap: 12px;
  }
  .tile{
    border-radius: var(--cc-radius-lg);
    overflow:hidden;
    border: 1px solid rgba(15,23,42,.08);
    box-shadow: var(--cc-shadow-sm);
    position:relative;
    background:#fff;
  }
  .tile img{ width:100%; height:100%; object-fit:cover; display:block; }
  .tile-a{ grid-column: 1 / -1; grid-row: span 2; }
  .tile-cap{
    position:absolute; left:12px; bottom:12px;
    background: rgba(255,255,255,.92);
    border: 1px solid rgba(15,23,42,.08);
    padding: .35rem .6rem;
    border-radius: 999px;
    font-weight: 700;
    font-size: .85rem;
    color: var(--cc-ink);
  }

  /* Quickbar */
  .guide-quickbar{
    background:#fff;
    border:1px solid rgba(15,23,42,.08);
    border-radius: 18px;
    box-shadow: var(--cc-shadow-sm);
    overflow:hidden;
  }
  .guide-quick-item{ display:flex; align-items:center; gap:.9rem; padding: 1rem 1.2rem; }
  .guide-icon{
    width:44px;height:44px;border-radius:14px;
    display:grid; place-items:center;
    background: rgba(28,106,228,.10);
    border:1px solid rgba(28,106,228,.18);
    font-weight:800;
    color: var(--cc-blue);
    flex:0 0 auto;
  }

  /* Sections */
  .guide-section{ padding: 3.8rem 0; }
  .guide-soft{
    background: linear-gradient(135deg, rgba(24,160,106,.06), rgba(28,106,228,.06));
    border-top:1px solid rgba(15,23,42,.06);
    border-bottom:1px solid rgba(15,23,42,.06);
  }

  /* Picture cards */
  .guide-card{
    background:#fff;
    border: 1px solid rgba(15,23,42,.08);
    border-radius: var(--cc-radius);
    box-shadow: var(--cc-shadow-sm);
    overflow:hidden;
    height:100%;
    transition: transform .18s ease, box-shadow .18s ease;
  }
  .guide-card:hover{ transform: translateY(-4px); box-shadow: var(--cc-shadow); }
  .guide-card-img{ position:relative; height: 190px; }
  .guide-card-img img{ width:100%; height:100%; object-fit:cover; display:block; }
  .guide-chip{
    position:absolute; left:12px; top:12px;
    background: rgba(230,70,70,.12);
    border:1px solid rgba(230,70,70,.18);
    color: var(--cc-red);
    font-weight:700;
    font-size:.82rem;
    padding:.35rem .65rem;
    border-radius: 999px;
  }
  .guide-chip-green{
    background: rgba(24,160,106,.12);
    border-color: rgba(24,160,106,.18);
    color: var(--cc-green);
  }
  .guide-chip-red{
    background: rgba(28,106,228,.12);
    border-color: rgba(28,106,228,.18);
    color: var(--cc-blue);
  }
  .guide-card-body{ padding: 14px; }
  .guide-card-body h3{ margin: 4px 0 8px; font-weight: 800; }
  .guide-card-body p{ margin: 0 0 12px; color: var(--cc-muted); line-height: 1.65; }

  /* Patient steps */
  .guide-steps{
    background:#fff;
    border:1px solid rgba(15,23,42,.08);
    border-radius: 18px;
    box-shadow: var(--cc-shadow-sm);
    padding: 1.1rem;
  }
  .guide-steps .step{
    display:flex; gap:1rem; align-items:flex-start;
    padding: .75rem .9rem;
    border-radius: 14px;
  }
  .guide-steps .step:hover{ background: rgba(28,106,228,.05); }
  .guide-steps .num{
    width:44px;height:44px;border-radius:50%;
    background: rgba(28,106,228,.10);
    border:1px solid rgba(28,106,228,.18);
    display:grid; place-items:center;
    color: var(--cc-blue);
    font-weight:800;
    flex:0 0 auto;
  }

  /* Photo strip */
  .guide-strip{
    display:grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
  }
  .strip-tile{
    border-radius: var(--cc-radius-lg);
    overflow:hidden;
    border: 1px solid rgba(15,23,42,.08);
    box-shadow: var(--cc-shadow-sm);
    position:relative;
    height: 190px;
    background:#fff;
  }
  .strip-tile img{ width:100%; height:100%; object-fit:cover; display:block; }
  .strip-tile .cap{
    position:absolute; left:12px; bottom:12px;
    background: rgba(255,255,255,.92);
    border: 1px solid rgba(15,23,42,.08);
    padding: .35rem .6rem;
    border-radius: 999px;
    font-weight: 700;
    font-size: .85rem;
    color: var(--cc-ink);
  }

  /* Masonry */
  .guide-gallery{
    background: linear-gradient(180deg, rgba(28,106,228,.05), rgba(24,160,106,.04));
    border-top:1px solid rgba(15,23,42,.06);
  }
  .guide-masonry{
    display:grid;
    grid-template-columns: repeat(3, minmax(0,1fr));
    grid-auto-rows: 170px;
    gap: 12px;
  }
  .m-item{
    border-radius: var(--cc-radius-lg);
    overflow:hidden;
    border: 1px solid rgba(15,23,42,.08);
    box-shadow: var(--cc-shadow-sm);
    background:#fff;
    position:relative;
  }
  .m-item img{ width:100%; height:100%; object-fit:cover; display:block; }
  .m-item.tall{ grid-row: span 2; }
  .m-item.wide{ grid-column: span 2; }
  .m-cap{
    position:absolute; left:12px; bottom:12px;
    background: rgba(11,27,58,.72);
    color:#fff;
    border: 1px solid rgba(255,255,255,.18);
    padding: .35rem .6rem;
    border-radius: 999px;
    font-weight: 700;
    font-size: .85rem;
    backdrop-filter: blur(6px);
  }

  /* FAQ mini images */
  .guide-mini-img{
    border-radius: 16px;
    overflow:hidden;
    height: 160px;
    border:1px solid rgba(15,23,42,.08);
  }
  .guide-mini-img img{ width:100%; height:100%; object-fit:cover; display:block; }

  /* Responsive */
  @media (max-width: 991px){
    .guide-page{ padding-top: 84px; }
    .guide-strip{ grid-template-columns: 1fr; }
    .guide-masonry{ grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 560px){
    .guide-masonry{ grid-template-columns: 1fr; }
    .m-item.wide{ grid-column: auto; }
  }
</style>

@endsection