@extends('patient.navbar')
@section('content')


<section class="cc-hero py-4">
  <div class="container">
    <div class="cc-card p-4">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
          <h3 class="fw-bold mb-1">COVID-19 Test Result</h3>
          <p class="cc-subtitle mb-0">Laboratory report details</p>
        </div>

        {{-- RESULT BADGE --}}
        @php
          $resultClasses = [
            'positive' => 'background:rgba(230,70,70,.15); color:var(--cc-red);',
            'negative' => 'background:rgba(24,160,106,.15); color:var(--cc-green);',
            'inconclusive' => 'background:rgba(28,106,228,.15); color:var(--cc-blue);'
          ];
        @endphp

        <span class="badge rounded-pill px-4 py-2 fs-6"
              style="{{ $resultClasses[$booking->result] }}">
          {{ strtoupper($booking->result) }}
        </span>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row g-4">

      {{-- TEST INFO --}}
      <div class="col-lg-4">
        <div class="cc-card p-4 h-100">
          <h5 class="fw-bold mb-3">Test Information</h5>

          <ul class="list-unstyled mb-0">
            <li class="mb-3">
              <small class="cc-subtitle">Test Type</small>
              <div class="fw-semibold">{{ $booking->test_type }}</div>
            </li>

            <li class="mb-3">
              <small class="cc-subtitle">Sample Type</small>
              <div class="fw-semibold">{{ $booking->sample_type }}</div>
            </li>

            <li class="mb-3">
              <small class="cc-subtitle">Hospital</small>
              <div class="fw-semibold">{{ $booking->hospital->name }}</div>
            </li>

            <li class="mb-3">
              <small class="cc-subtitle">Test Date</small>
              <div class="fw-semibold">{{ $booking->preferred_date }}</div>
            </li>

            <li>
              <small class="cc-subtitle">Report Date</small>
              <div class="fw-semibold">{{ $booking->report_date }}</div>
            </li>
          </ul>
        </div>
      </div>

      {{-- RESULT DETAILS --}}
      <div class="col-lg-8">

        <div class="cc-card p-4 mb-4">
          <h5 class="fw-bold mb-3">Result Summary</h5>

          <div class="p-4 rounded cc-bg-soft">
            <h2 class="fw-bold mb-2">
              {{ ucfirst($booking->result) }}
            </h2>

            <p class="mb-0 cc-subtitle">
              @if($booking->result === 'negative')
                No SARS-CoV-2 virus detected in the sample.
              @elseif($booking->result === 'positive')
                SARS-CoV-2 virus detected. Please consult a physician.
              @else
                Test result was inconclusive. Retesting is recommended.
              @endif
            </p>
          </div>
        </div>

        {{-- DOCTOR NOTES --}}
        <div class="cc-card p-4 mb-4">
          <h5 class="fw-bold mb-3">Doctor Notes</h5>

          <p class="mb-0">
            {{ $booking->doctor_notes ?? 'No additional notes provided.' }}
          </p>
        </div>

        {{-- ACTIONS --}}
        <div class="d-flex gap-3 flex-wrap">
          <a href=""
             class="btn btn-cc btn-cc-primary">
            Download Report
          </a>

          <a href="{{ route('patientDashboard') }}"
             class="btn btn-cc btn-cc-outline">
            Back to Dashboard
          </a>
        </div>

      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection