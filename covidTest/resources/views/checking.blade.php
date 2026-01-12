<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hospital Guidelines</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="hospital-page.css">
</head>
<style>
  :root{
  --blue:#2563eb;
  --dark:#0b1220;
  --light:#f5f7ff;
  --text:#475569;
  --radius:20px;
}

*{
  font-family:'Poppins', sans-serif;
}

body{
  margin:0;
  background:#fff;
  color:#0f172a;
}

/* ================= HERO ================= */
.hero{
  position:relative;
  background:linear-gradient(180deg,#0f3d66,#0b2440);
  padding:140px 20px 200px;
  text-align:center;
  color:#fff;
}

.hero h1{
  font-size:48px;
  font-weight:700;
}

.hero p{
  max-width:620px;
  margin:20px auto 35px;
  color:#dbeafe;
}

.btn-hero{
  background:#2563eb;
  color:#fff;
  padding:14px 36px;
  border-radius:30px;
  font-weight:500;
  text-decoration:none;
}

.hero-wave{
  position:absolute;
  bottom:0;
  width:100%;
  height:160px;
  background:#fff;
  border-top-left-radius:100% 80px;
  border-top-right-radius:100% 80px;
}

/* ================= GUIDELINES ================= */
.guidelines{
  background:#fff;
  padding:0 0 120px;
}

.guideline-panel{
  margin-top:-120px;
  background:var(--dark);
  padding:60px;
  border-radius:32px;
  box-shadow:0 50px 100px rgba(0,0,0,.4);
}

.guideline-panel h2{
  color:#fff;
}

.muted{
  color:#cbd5e1;
}

.g-card{
  padding:28px;
  border-radius:var(--radius);
  height:100%;
}

.g-card.light{
  background:var(--light);
}

.g-card.dark{
  background:#111827;
}

.g-card h5{
  font-weight:600;
}

.g-card.dark h5{
  color:#fff;
}

.g-card.dark p{
  color:#cbd5e1;
}

/* ================= INFO ================= */
.info-section{
  padding:120px 0;
  background:#f8fafc;
}

.info-section h2{
  font-weight:700;
}

.info-section p{
  color:var(--text);
}

.info-list{
  list-style:none;
  padding:0;
}

.info-list li{
  margin-bottom:10px;
  padding-left:22px;
  position:relative;
}

.info-list li::before{
  content:"✔";
  position:absolute;
  left:0;
  color:var(--blue);
}

.info-card{
  background:#fff;
  padding:40px;
  border-radius:24px;
  box-shadow:0 30px 60px rgba(0,0,0,.1);
}

/* ================= FOOTER ================= */
.footer{
  background:#0b1220;
  color:#cbd5e1;
  padding:80px 0 30px;
}

.footer h5{
  color:#fff;
}

.footer ul{
  list-style:none;
  padding:0;
}

.footer ul li{
  margin-bottom:8px;
}

.footer-bottom{
  margin-top:40px;
  text-align:center;
  border-top:1px solid #1e293b;
  padding-top:20px;
  font-size:14px;
}

</style>
<body>

<!-- ================= HERO ================= -->
<section class="hero">
  <div class="container text-center">
    <h1>Hospital Safety & Care Guidelines</h1>
    <p>
      Ensuring patient safety, hygiene, emergency preparedness,
      and high-quality healthcare standards across all hospitals.
    </p>
    <a href="#guidelines" class="btn-hero">Explore Guidelines</a>
  </div>

  <div class="hero-wave"></div>
</section>

<!-- ================= GUIDELINES ================= -->
<section id="guidelines" class="guidelines">
  <div class="container">

    <!-- Floating Panel -->
    <div class="guideline-panel">

      <div class="row mb-5">
        <div class="col-lg-6">
          <h2>Core Hospital Principles</h2>
          <p class="muted">
            These principles guide daily operations, patient care,
            and emergency response across all departments.
          </p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="g-card light">
            <h5>Strict Hygiene</h5>
            <p>Sanitation and sterilization protocols are enforced hospital-wide.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="g-card dark">
            <h5>Emergency Ready</h5>
            <p>24/7 emergency response teams and fully equipped units.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="g-card dark">
            <h5>Patient Privacy</h5>
            <p>Medical records are secured and access controlled.</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="g-card light">
            <h5>Safe Environment</h5>
            <p>Routine inspections of infrastructure and equipment.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= INFORMATION ================= -->
<section class="info-section">
  <div class="container">
    <div class="row align-items-center g-5">

      <div class="col-lg-6">
        <h2>Patient-Centered Care</h2>
        <p>
          Our hospitals focus on compassionate, respectful, and
          transparent patient care supported by modern technology
          and trained professionals.
        </p>
        <ul class="info-list">
          <li>Qualified medical professionals</li>
          <li>Advanced medical equipment</li>
          <li>Clear communication with patients</li>
          <li>Continuous monitoring and audits</li>
        </ul>
      </div>

      <div class="col-lg-6">
        <div class="info-card">
          <h4>Compliance & Monitoring</h4>
          <p>
            Hospitals are regularly audited to ensure compliance
            with national healthcare standards and safety laws.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="footer">
  <div class="container">
    <div class="row gy-4">

      <div class="col-md-4">
        <h5>Hospital Network</h5>
        <p>Committed to safe and reliable healthcare services.</p>
      </div>

      <div class="col-md-4">
        <h5>Quick Links</h5>
        <ul>
          <li>Guidelines</li>
          <li>Departments</li>
          <li>Emergency</li>
          <li>Contact</li>
        </ul>
      </div>

      <div class="col-md-4">
        <h5>Contact</h5>
        <p>Email: support@hospital.com</p>
        <p>Phone: +92 300 0000000</p>
      </div>

    </div>

    <div class="footer-bottom">
      © 2026 Hospital Care System
    </div>
  </div>
</footer>

</body>
</html>
