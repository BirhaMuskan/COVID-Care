<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    /* HERO BASE */
.cc-hero {
  position: relative;
  height: 75vh;
  min-height: 520px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  overflow: hidden;
}


/* GRADIENT SHEDDING */
.cc-hero-overlay {
  position: absolute;
  inset: 0;
  background:
    linear-gradient(
      90deg,
      rgba(7, 30, 60, 0.92) 0%,
      rgba(7, 30, 60, 0.78) 40%,
      rgba(7, 30, 60, 0.45) 65%,
      rgba(7, 30, 60, 0.15) 85%,
      rgba(7, 30, 60, 0) 100%
    );
  z-index: 1;
}

/* CONTENT */
.cc-hero-content {
  position: relative;
  z-index: 2;
  color: #fff;
  max-width: 520px;
}

/* TEXT HIERARCHY */
/* EYEBROW TEXT */
.cc-hero-eyebrow {
  display: inline-block;
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: rgba(255, 255, 255, 0.75);
  margin-bottom: 0.75rem;
}

/* MAIN HEADING */
.cc-hero-content h1 {
  font-size: 3.1rem;
  font-weight: 700;
  line-height: 1.1;
  letter-spacing: -0.02em;
  margin-bottom: 1.2rem;
}

/* SUBTITLE */
.cc-hero-subtitle {
  font-size: 1rem;
  line-height: 1.75;
  color: rgba(255, 255, 255, 0.85);
  margin-bottom: 2rem;
  max-width: 480px;
}

/* BUTTON POLISH */
.cc-btn-primary {
  padding: 0.75rem 1.8rem;
  font-size: 0.9rem;
  letter-spacing: 0.03em;
}


/* CTA BUTTON */
.cc-btn-primary {
  background: #2d8cff;
  color: #fff;
  padding: 0.7rem 1.6rem;
  border-radius: 6px;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
}

.cc-btn-primary:hover {
  background: #1c6fe0;
  color: #fff;
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .cc-hero {
    height: auto;
    padding: 4rem 0;
  }

  .cc-hero-content h1 {
    font-size: 2.3rem;
  }
}

  </style>
</head>
<body>
  <!-- HERO SECTION -->
<header class="cc-hero"
  style="background-image: url('{{ asset('home/assets/image/hospital2.jpg') }}');">

  <div class="cc-hero-overlay"></div>

  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-lg-6">
        <div class="cc-hero-content">
  <span class="cc-hero-eyebrow">Preventive Healthcare</span>

  <h1>Early Detection.<br>Better Outcomes.</h1>

  <p class="cc-hero-subtitle">
    Comprehensive health screenings designed to identify risks early,
    support timely treatment, and protect your long-term wellbeing.
  </p>

  <a href="#" class="btn cc-btn-primary">Schedule a Screening</a>
</div>

      </div>
    </div>
  </div>
</header>

</body>
</html>