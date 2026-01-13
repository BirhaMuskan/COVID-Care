@extends('home.navbar')
@section('content')

<main class="contact-page">

  <!-- HERO -->
  <section class="contact-hero" id="contact">
    <div class="container">
      <div class="contact-hero-card">
        <div class="row g-4 align-items-center">
          <div class="col-lg-7">
            <div class="contact-eyebrow">Support • Help Desk • Verified Response</div>
            <h1 class="contact-title">Contact COVIDCare</h1>
            <p class="contact-lead">
              Need help booking a test or vaccination? Want to register your hospital?
              Send us a message — we’ll guide you quickly.
            </p>

            <div class="contact-badges mt-3">
              <span class="contact-badge">Fast Replies</span>
              <span class="contact-badge">Patient Support</span>
              <span class="contact-badge">Hospital Onboarding</span>
            </div>

            <div class="d-flex gap-2 flex-wrap mt-4">
              <a class="btn btn-cc btn-cc-primary px-4" href="#send">Send Message</a>
              <a class="btn btn-cc btn-cc-hero-outline px-4" href="#find">Find Us</a>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="contact-collage">
              <div class="c-tile c-a">
                <img
                  src="{{asset('home/assets/image/support.jpg')}}"
                  alt="Support"
            
                />
                <div class="c-cap">Support</div>
              </div>
              <div class="c-tile c-b">
                <img
                  src="{{asset('home/assets/image/hospital3.jpg')}}"
                  alt="Hospitals"
        
                />
                <div class="c-cap">Hospitals</div>
              </div>
              <div class="c-tile c-c">
                <img
                  src="{{asset('home/assets/image/appointments fake.jpg')}}"
                  alt="Appointments"
                 
                />
                <div class="c-cap">Appointments</div>
              </div>
              <div class="c-tile c-d">
                <img
                  src="{{asset('home/assets/image/chat.jpg')}}"
                  alt="Chat"
                  
                />
                <div class="c-cap">Chat</div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- QUICK CONTACT BAR -->
      <div class="contact-quickbar mt-4">
        <div class="row g-0">
          <div class="col-md-4">
            <div class="q-item">
              <div class="q-icon">✉️</div>
              <div>
                <div class="fw-bold">Email</div>
                <div class="cc-subtitle small">support@covidcare.com</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 border-start">
            <div class="q-item">
              <div class="q-icon">📞</div>
              <div>
                <div class="fw-bold">Helpline</div>
                <div class="cc-subtitle small">+92-000-0000000</div>
              </div>
            </div>
          </div>
          <div class="col-md-4 border-start">
            <div class="q-item">
              <div class="q-icon">⏱️</div>
              <div>
                <div class="fw-bold">Hours</div>
                <div class="cc-subtitle small">Mon–Sat (9am–6pm)</div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- MAIN CONTENT: FORM + INFO -->
  <section class="contact-section" id="send">
    <div class="container">
      <div class="row g-4">
        <!-- FORM -->
        <div class="col-lg-7">
          <div class="cc-card cc-card-hover p-4 p-lg-5">
            <div class="d-flex justify-content-between align-items-end gap-3 mb-4 flex-wrap">
              <div>
                <h2 class="cc-section-title mb-1">Send us a message</h2>
                <p class="cc-subtitle mb-0">We typically respond within 24 hours.</p>
              </div>
              <span class="contact-pill">Secure • Private</span>
            </div>

            {{-- Replace action/route with your Laravel handler --}}
            <form method="POST" action="">
              @csrf

              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Full Name</label>
                  <input class="form-control" type="text" name="name" placeholder="Your name" required>
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-semibold">Email</label>
                  <input class="form-control" type="email" name="email" placeholder="you@email.com" required>
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">Phone (optional)</label>
                  <input class="form-control" type="text" name="phone" placeholder="+92 3xx xxxxxxx">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">I am</label>
                  <select class="form-select" name="role" required>
                    <option value="patient">Patient</option>
                    <option value="hospital">Hospital</option>
                    <option value="other">Other</option>
                  </select>
                </div>

                <div class="col-12">
                  <label class="form-label fw-semibold">Topic</label>
                  <select class="form-select" name="topic" required>
                    <option value="booking">Booking / Appointment</option>
                    <option value="results">Results / Status</option>
                    <option value="hospital-register">Hospital Registration</option>
                    <option value="technical">Technical Issue</option>
                    <option value="other">Other</option>
                  </select>
                </div>

                <div class="col-12">
                  <label class="form-label fw-semibold">Message</label>
                  <textarea class="form-control" name="message" rows="5" placeholder="Write your message..." required></textarea>
                </div>

                <div class="col-12 d-flex gap-2 flex-wrap mt-2">
                  <button class="btn btn-cc btn-cc-primary px-4" type="submit">Send Message</button>
                  <a class="btn btn-cc btn-cc-outline px-4" href="{{ route('authRole') }}">Login / Register</a>
                </div>
              </div>
            </form>

          </div>
        </div>

        <!-- INFO PANEL -->
        <div class="col-lg-5">
          <div class="contact-stack">

            <div class="cc-card p-4">
              <h5 class="fw-bold mb-2">Quick Help</h5>
              <div class="help-item">
                <div class="help-dot">1</div>
                <div>
                  <div class="fw-semibold">Patients</div>
                  <div class="cc-subtitle small">Booking issues, slot changes, appointment tracking.</div>
                </div>
              </div>
              <div class="help-item">
                <div class="help-dot">2</div>
                <div>
                  <div class="fw-semibold">Hospitals</div>
                  <div class="cc-subtitle small">Approval, onboarding, slot management & results.</div>
                </div>
              </div>
              <div class="help-item">
                <div class="help-dot">3</div>
                <div>
                  <div class="fw-semibold">Technical</div>
                  <div class="cc-subtitle small">Login, registration, dashboard & UI problems.</div>
                </div>
              </div>
            </div>

            <div class="cc-card p-4">
              <h5 class="fw-bold mb-2">Contact Details</h5>
              <div class="cc-subtitle">
                <div class="d-flex align-items-start gap-2 mb-2">
                  <span class="mini-ic">📍</span>
                  <div>
                    <div class="fw-semibold">Address</div>
                    <div class="small">City, Pakistan</div>
                  </div>
                </div>
                <div class="d-flex align-items-start gap-2 mb-2">
                  <span class="mini-ic">✉️</span>
                  <div>
                    <div class="fw-semibold">Email</div>
                    <div class="small">support@covidcare.com</div>
                  </div>
                </div>
                <div class="d-flex align-items-start gap-2">
                  <span class="mini-ic">📞</span>
                  <div>
                    <div class="fw-semibold">Helpline</div>
                    <div class="small">+92-000-0000000</div>
                  </div>
                </div>
              </div>

              <div class="d-flex gap-2 flex-wrap mt-3">
                <a class="btn btn-cc btn-cc-success px-4" href="{{ route('authRole') }}">Register</a>
                <a class="btn btn-cc btn-cc-outline px-4" href="#faq">FAQs</a>
              </div>
            </div>

            <div class="cc-card p-4 contact-tip">
              <div class="fw-bold mb-1">Tip</div>
              <div class="cc-subtitle mb-0">
                For faster support, mention your <b>appointment ID</b> (if any) and the hospital name.
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MAP / FIND US -->
  <section class="contact-section contact-find" id="find">
    <div class="container">
      <div class="row g-4 align-items-stretch">
        <div class="col-lg-5">
          <div class="cc-card p-4 p-lg-5 h-100">
            <h2 class="cc-section-title mb-2">Find Us</h2>
            <p class="cc-subtitle">
              You can reach our support office during working hours. We also provide online help for all cities.
            </p>

            <div class="find-list mt-3">
              <div class="find-item">
                <div class="find-ic">🕒</div>
                <div>
                  <div class="fw-semibold">Working Hours</div>
                  <div class="cc-subtitle small mb-0">Mon–Sat, 9:00 AM – 6:00 PM</div>
                </div>
              </div>
              <div class="find-item">
                <div class="find-ic">⚡</div>
                <div>
                  <div class="fw-semibold">Response Time</div>
                  <div class="cc-subtitle small mb-0">Usually within 24 hours</div>
                </div>
              </div>
              <div class="find-item">
                <div class="find-ic">🔒</div>
                <div>
                  <div class="fw-semibold">Privacy</div>
                  <div class="cc-subtitle small mb-0">Your details stay protected</div>
                </div>
              </div>
            </div>

            <div class="d-flex gap-2 flex-wrap mt-4">
              <a class="btn btn-cc btn-cc-primary px-4" href="#send">Send Message</a>
              <a class="btn btn-cc btn-cc-outline px-4" href="{{ route('aboutPage') }}">About</a>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="cc-card p-2 h-100 map-wrap">
            <!-- Replace with your real map later -->
            <iframe
              title="COVIDCare Location"
              src="https://www.google.com/maps?q=Pakistan&output=embed"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- MINI FAQ -->
  <section class="contact-section" id="faq">
    <div class="container">
      <div class="text-center mb-4">
        <h2 class="cc-section-title mb-2">Quick FAQs</h2>
        <p class="cc-subtitle mb-0">A few common questions before you contact us.</p>
      </div>

      <div class="row g-4">
        <div class="col-lg-4">
          <div class="cc-card cc-card-hover p-4 h-100">
            <div class="faq-img">
              <img
                src="{{asset('home/assets/image/where-status.jpg')}}"
                alt="FAQ"
               
              />
            </div>
            <h5 class="fw-bold mt-3 mb-2">Where can I see my status?</h5>
            <p class="cc-subtitle mb-0">Open your dashboard and check “My Appointment” for updates.</p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="cc-card cc-card-hover p-4 h-100">
            <div class="faq-img">
              <img
                src="{{asset('home/assets/image/how register-hospital.jpg')}}"
                alt="FAQ"
            
              />
            </div>
            <h5 class="fw-bold mt-3 mb-2">How to register as a hospital?</h5>
            <p class="cc-subtitle mb-0">Click Register → choose Hospital → submit details for admin approval.</p>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="cc-card cc-card-hover p-4 h-100">
            <div class="faq-img">
              <img
                src="{{asset('home/assets/image/can-change-slot.jpg')}}"
                alt="FAQ"
                
              />
            </div>
            <h5 class="fw-bold mt-3 mb-2">Can I change my slot?</h5>
            <p class="cc-subtitle mb-0">If the hospital allows, you can request again or choose another slot.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<style>
  /* fixed navbar spacing */
  .contact-page{ padding-top: 90px; }

  /* HERO CARD */
  .contact-hero{ padding: 2.2rem 0 1.2rem; position:relative; overflow:hidden; }
  .contact-hero:before{
    content:""; position:absolute; inset:-40% -20% auto -20%; height:520px;
    background:
      radial-gradient(circle at 20% 30%, rgba(28,106,228,.30), transparent 55%),
      radial-gradient(circle at 70% 20%, rgba(24,160,106,.18), transparent 55%),
      radial-gradient(circle at 40% 70%, rgba(14,165,233,.22), transparent 55%);
    z-index:0;
  }
  .contact-hero .container{ position:relative; z-index:1; }

  .contact-hero-card{
    background: linear-gradient(135deg, rgba(28,106,228,.95), rgba(45,124,240,.92));
    color:#fff;
    border-radius: 28px;
    box-shadow: var(--cc-shadow);
    border:1px solid rgba(255,255,255,.18);
    padding: 2rem;
    position:relative;
    overflow:hidden;
  }
  .contact-hero-card:after{
    content:""; position:absolute; right:-140px; top:-140px;
    width:380px; height:380px; border-radius:50%;
    background: rgba(255,255,255,.12);
  }
  .contact-hero-card:before{
    content:""; position:absolute; left:-120px; bottom:-120px;
    width:320px; height:320px; border-radius:50%;
    background: rgba(255,255,255,.10);
  }

  .contact-eyebrow{
    font-size:.78rem; letter-spacing:.18em; text-transform:uppercase;
    opacity:.88; font-weight:700;
  }
  .contact-title{
    margin:.6rem 0 .6rem;
    font-weight: 800;
    letter-spacing: -1px;
    font-size: clamp(2.2rem, 4.1vw, 3.4rem);
    line-height: 1.06;
  }
  .contact-lead{ color: rgba(255,255,255,.86); line-height: 1.75; margin: 0; max-width: 60ch; }

  .contact-badges{ display:flex; gap:.6rem; flex-wrap:wrap; }
  .contact-badge{
    background: rgba(255,255,255,.14);
    border: 1px solid rgba(255,255,255,.18);
    padding:.45rem .75rem;
    border-radius:999px;
    font-size:.85rem;
    color: rgba(255,255,255,.92);
    font-weight: 600;
  }

  /* Collage */
  .contact-collage{
    display:grid;
    grid-template-columns: 1fr 1fr;
    grid-auto-rows: 150px;
    gap: 12px;
    position:relative;
  }
  .c-tile{
    border-radius: 22px;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.18);
    background: rgba(255,255,255,.10);
    position:relative;
  }
  .c-a{ grid-column: 1 / -1; grid-row: span 2; }
  .c-tile img{ width:100%; height:100%; object-fit:cover; display:block; }
  .c-cap{
    position:absolute; left:12px; bottom:12px;
    background: rgba(255,255,255,.92);
    color: var(--cc-ink);
    border: 1px solid rgba(15,23,42,.08);
    padding: .35rem .6rem;
    border-radius: 999px;
    font-weight: 800;
    font-size:.85rem;
  }

  /* Quickbar */
  .contact-quickbar{
    background:#fff;
    border:1px solid rgba(15,23,42,.08);
    border-radius: 18px;
    box-shadow: var(--cc-shadow-sm);
    overflow:hidden;
  }
  .q-item{ display:flex; align-items:center; gap:.9rem; padding: 1rem 1.2rem; }
  .q-icon{
    width:44px;height:44px;border-radius:14px;
    display:grid;place-items:center;
    background: rgba(28,106,228,.10);
    border:1px solid rgba(28,106,228,.18);
    font-weight:800;
    color: var(--cc-blue);
    flex:0 0 auto;
  }

  /* Sections */
  .contact-section{ padding: 3.8rem 0; }
  .contact-pill{
    background: rgba(28,106,228,.08);
    border: 1px solid rgba(28,106,228,.18);
    padding: .45rem .8rem;
    border-radius: 999px;
    font-size:.85rem;
    color: var(--cc-blue);
    font-weight:700;
  }

  /* Right stack */
  .contact-stack{ display:grid; gap: 14px; }
  .help-item{ display:flex; gap:.9rem; align-items:flex-start; padding: .6rem 0; }
  .help-dot{
    width:38px;height:38px;border-radius: 14px;
    display:grid;place-items:center;
    background: rgba(24,160,106,.10);
    border:1px solid rgba(24,160,106,.18);
    font-weight:800;
    color: var(--cc-green);
    flex:0 0 auto;
  }
  .mini-ic{
    width:34px;height:34px;border-radius: 12px;
    display:grid;place-items:center;
    background: rgba(28,106,228,.10);
    border:1px solid rgba(28,106,228,.18);
    color: var(--cc-blue);
    flex:0 0 auto;
  }
  .contact-tip{
    background: linear-gradient(135deg, rgba(24,160,106,.10), rgba(28,106,228,.10));
    border:1px solid rgba(15,23,42,.06);
  }

  /* Find Us */
  .contact-find{
    background: linear-gradient(180deg, rgba(28,106,228,.05), rgba(24,160,106,.04));
    border-top:1px solid rgba(15,23,42,.06);
    border-bottom:1px solid rgba(15,23,42,.06);
  }
  .find-list{ display:grid; gap: 12px; }
  .find-item{ display:flex; gap:.9rem; align-items:flex-start; }
  .find-ic{
    width:44px;height:44px;border-radius:14px;
    display:grid; place-items:center;
    background: rgba(28,106,228,.10);
    border:1px solid rgba(28,106,228,.18);
    color: var(--cc-blue);
    font-weight:800;
    flex:0 0 auto;
  }
  .map-wrap{ overflow:hidden; border-radius: var(--cc-radius); }
  .map-wrap iframe{ width:100%; height: 420px; border:0; border-radius: 16px; }

  /* FAQ cards */
  .faq-img{
    border-radius: 16px;
    overflow:hidden;
    height: 160px;
    border:1px solid rgba(15,23,42,.08);
  }
  .faq-img img{ width:100%; height:100%; object-fit:cover; display:block; }

  @media (max-width: 991px){
    .contact-page{ padding-top: 84px; }
    .contact-hero-card{ padding: 1.5rem; }
    .map-wrap iframe{ height: 340px; }
  }
</style>

@endsection