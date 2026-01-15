<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVIDCare — Hospital Dashboard</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Your theme CSS (Laravel) -->
  <link rel="stylesheet" href="{{ asset('home/assets/css/home.css') }}">

  <style>
    body{font-family:Poppins,system-ui,-apple-system,"Segoe UI",Roboto,Arial,sans-serif;}
    .dash-wrap{padding-top:90px; padding-bottom:40px;}
    .sidebar{
      background:#fff;border:1px solid rgba(15,23,42,.10);
      border-radius:16px;padding:1rem;
      position:sticky; top:90px;
    }
    .side-link{
      display:flex;align-items:center;gap:.65rem;
      padding:.72rem .9rem;border-radius:12px;
      text-decoration:none;color:rgba(11,27,58,.78);
      font-weight:600;
    }
    .side-link:hover,.side-link.active{background:rgba(24,160,106,.12);color:#18a06a;}
    .pill{
      display:inline-flex;align-items:center;gap:.4rem;
      border:1px solid rgba(15,23,42,.10);
      padding:.25rem .6rem;border-radius:999px;
      font-size:.82rem;color:rgba(11,27,58,.72);background:#fff;
    }
    .kpi{border:1px solid rgba(15,23,42,.10);border-radius:16px;}
    .muted{color:rgba(11,27,58,.62);}
    .table td,.table th{vertical-align:middle;}
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">COVIDCare</a>
    <div class="d-flex align-items-center gap-2">
      <span class="pill d-none d-md-inline">Hospital</span>
      <a class="btn btn-outline-success btn-sm" href="{{ url('/') }}">Home</a>
      <a class="btn btn-success btn-sm" href="{{route('logout')}}">Logout</a>
    </div>
  </div>
</nav>

<div class="container dash-wrap">
  <div class="row g-4">

    <!-- Sidebar -->
    <div class="col-lg-3">
      <aside class="sidebar">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <div class="fw-bold">Hospital Panel</div>
          <span class="pill">H-204</span>
        </div>
        <div class="muted small mb-3">Manage requests, bookings, results & vaccines.</div>

        <div class="nav flex-column" role="tablist">
          <a class="side-link active" data-bs-toggle="pill" href="#tab-overview" role="tab">🏥 Overview</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-requests" role="tab">📥 Patient Requests</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-bookings" role="tab">📅 Approved Bookings</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-results" role="tab">🧪 Update Test Results</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-vaccine" role="tab">💉 Vaccination Status</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-profile" role="tab">⚙️ Hospital Profile</a>
        </div>

        <hr class="my-3">
        <div class="muted small">
          Tip: Update results quickly to improve trust.
        </div>
      </aside>
    </div>

    <!-- Content -->
    <div class="col-lg-9">
      <div class="tab-content">
<!-- 1) Overview -->
<div class="tab-pane fade show active" id="tab-overview" role="tabpanel">

  <!-- Header -->
  <div class="card p-4 mb-3">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
      <div>
        <h4 class="fw-bold mb-1">{{ $hospital->name }}</h4>
        <div class="muted">Manage COVID test and vaccination operations.</div>
      </div>

      <div class="d-flex gap-2 flex-wrap">
        <span class="pill">
          Status:
          <b class="{{ $hospital->status === 'approved' ? 'text-success' : 'text-warning' }}">
            {{ ucfirst($hospital->status) }}
          </b>
        </span>

        <span class="pill">
          City: <b>{{ $hospital->city }}</b>
        </span>
      </div>
    </div>
  </div>

  <!-- KPIs -->
  <div class="row g-3 mb-3">

    <div class="col-md-3">
      <div class="card p-3 text-center kpi">
        <div class="muted">New Requests</div>
        <div class="fs-2 fw-bold text-success">
          {{ $newRequests }}
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 text-center kpi">
        <div class="muted">Today Bookings</div>
        <div class="fs-2 fw-bold text-primary">
          {{ $todayBookings }}
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 text-center kpi">
        <div class="muted">Pending Results</div>
        <div class="fs-2 fw-bold text-warning">
          {{ $pendingResults }}
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 text-center kpi">
        <div class="muted">Vaccines Stock</div>

       
          <div class="fs-2 fw-bold text-info">Available</div>
        

      </div>
    </div>

  </div>

  {{-- Quick Actions --}}
  {{-- <div class="card p-4">
    <h5 class="fw-bold mb-2">Quick Actions</h5>
    <div class="d-flex flex-wrap gap-2">
      <a class="btn btn-success" data-bs-toggle="pill" href="#tab-requests">
        View Requests
      </a>

      <a class="btn btn-outline-success" data-bs-toggle="pill" href="#tab-results">
        Update Results
      </a>

      <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-bookings">
        Today Bookings
      </a>

      <a class="btn btn-outline-secondary" data-bs-toggle="pill" href="#tab-vaccine">
        Update Vaccination
      </a>
    </div>
  </div>  --}}
<div class="card p-4">

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
              <div>
                <h5 class="fw-bold mb-0">Patient Requests</h5>
                <div class="muted">Approve or reject appointment requests.</div>
              </div>
             
            </div>

            <div class="table-responsive mt-3">
              <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th>Request ID</th>
                    <th>Patient</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Slot</th>
                    <th>Notes</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
  @forelse ($pendingBookings as $booking)
<tr>
    <td>R-{{ $booking->id }}</td>

    <td>
        {{ $booking->user->name }} <br>
        <small>CNIC: {{ $booking->user->cnic }}</small>
    </td>

    <td>
        <span class="badge bg-info">
            {{ $booking->service }}
        </span>
    </td>

    <td>{{ $booking->preferred_date }}</td>
    <td>{{ $booking->time_slot }}</td>

    <td class="text-end">
      @if($booking->service == 'COVID Test')
        <a href="{{route('approveTestBooking',$booking->id)}}" class="btn btn-sm btn-success">Approve</a>
        <a href="{{route('rejectTestBooking',$booking->id)}}" class="btn btn-sm btn-danger">Reject</a>
      @elseif($booking->service == 'Vaccination')
        <a href="{{route('approveVaccBooking',$booking->id)}}" class="btn btn-sm btn-success">Approve</a>
        <a href="{{route('rejectVaccBooking',$booking->id)}}" class="btn btn-sm btn-danger">Reject</a>

        @endif

    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-muted">
        No pending bookings
    </td>
</tr>
@endforelse

                </tbody>
              </table>
            </div>

          </div>
</div>


        <!-- 2) Patient Requests -->
        <div class="tab-pane fade" id="tab-requests" role="tabpanel">
          <div class="card p-4">

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
              <div>
                <h5 class="fw-bold mb-0">Patient Requests</h5>
                <div class="muted">Approve or reject appointment requests.</div>
              </div>
            </div>

            <div class="table-responsive mt-3">
              <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th>Request ID</th>
                    <th>Patient</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Slot</th>
                    <th>Notes</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
  @forelse ($pendingBookings as $booking)
<tr>
    <td>R-{{ $booking->id }}</td>

    <td>
        {{ $booking->user->name }} <br>
        <small>CNIC: {{ $booking->user->cnic }}</small>
    </td>

    <td>
        <span class="badge bg-info">
            {{ $booking->service }}
        </span>
    </td>

    <td>{{ $booking->preferred_date }}</td>
    <td>{{ $booking->time_slot }}</td>

    <td class="text-end">
      @if($booking->service == 'COVID Test')
        <a href="{{route('approveTestBooking',$booking->id)}}" class="btn btn-sm btn-success">Approve</a>
        <a href="{{route('rejectTestBooking',$booking->id)}}" class="btn btn-sm btn-danger">Reject</a>
      @elseif($booking->service == 'Vaccination')
        <a href="{{route('approveVaccBooking',$booking->id)}}" class="btn btn-sm btn-success">Approve</a>
        <a href="{{route('rejectVaccBooking',$booking->id)}}" class="btn btn-sm btn-danger">Reject</a>

        @endif

    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-muted">
        No pending bookings
    </td>
</tr>
@endforelse

                </tbody>
              </table>
            </div>

          </div>
        </div>

        <!-- 3) Approved Bookings -->
        <div class="tab-pane fade" id="tab-bookings" role="tabpanel">
          <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
              <div>
                <h5 class="fw-bold mb-0">Approved Bookings</h5>
                <div class="muted">Today/Upcoming confirmed appointments.</div>
              </div>
              <div class="d-flex gap-2">
                <!-- <input type="date" class="form-control form-control-sm">
                <button class="btn btn-sm btn-outline-primary">Filter</button> -->
              </div>
            </div>

            <div class="table-responsive mt-3">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Booking ID</th>
                    <th>Patient</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <!-- <th class="text-end">Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  @foreach($approvedBookings as $booking)
                  <tr>
                    <td>B-{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->service }}</td>
                    <td>{{ $booking->preferred_date }}</td>
                    <td>{{ $booking->time_slot }}</td>
                    <td><span class="badge bg-success">{{ $booking->status }}</span></td>
                    
                    <!-- <td class="text-end">
                      <a href=""><button class="btn btn-sm btn-outline-secondary">Mark Arrived</button></a>
                    </td> -->
                  
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>

          </div>
        </div>

        <!-- 4) Update Test Results -->
        <div class="tab-pane fade" id="tab-results" role="tabpanel">
          @if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
  {{ session('success') }}
  <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

          <div class="card p-4">
            <h5 class="fw-bold mb-1">Update COVID Test Results</h5>
            <div class="muted mb-3">Find a patient booking and update result.</div>

            @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


            <form method="POST" action="{{ route('loadBooking') }}">
            @csrf

            <div class="row g-2 mb-3">
              <div class="col-md-4">
                <input name="booking_id" class="form-control" placeholder="Booking ID (e.g. 12)" required>
              </div>
              <div class="col-md-4">
                <input name="cnic" class="form-control" placeholder="Patient CNIC" required>
              </div>
              <div class="col-md-4">
                <button class="btn btn-success w-100">Load Booking</button>
              </div>
            </div>
            </form>
            @if(session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
</div>
@endif

@if(session('loadedBooking'))
@php $booking = session('loadedBooking'); @endphp

<div class="card p-3 mb-3">
  <div class="d-flex flex-wrap justify-content-between gap-2">
    <div>
      <div class="fw-semibold">
        Patient: {{ $booking->user->name }}
      </div>
      <div class="muted small">
        Service: {{ $booking->test_type }} |
        Date: {{ $booking->preferred_date }} |
        Slot: {{ $booking->time_slot }}
      </div>
    </div>

    <span class="badge bg-warning text-dark align-self-start">
      Pending Result
    </span>
  </div>
</div>
@endif


 @if(session('loadedBooking'))
<form method="POST"
      action="{{ route('hospital.saveResult', session('loadedBooking')->id) }}"
      class="row g-3">
@csrf
@else
<form class="row g-3">
@endif

<fieldset {{ session('loadedBooking') ? '' : 'disabled' }}>

  <div class="col-md-6">
    <label class="form-label fw-semibold">Result</label>
    <select name="result" class="form-select" required>
      <option selected disabled>Select result</option>
      <option value="negative">Negative</option>
      <option value="positive">Positive</option>
      <option value="inconclusive">Inconclusive</option>
    </select>
  </div>

  <div class="col-md-6">
    <label class="form-label fw-semibold">Report Date</label>
    <input type="date" name="report_date" class="form-control" required>
  </div>

  <div class="col-12">
    <label class="form-label fw-semibold">Doctor Notes</label>
    <textarea name="doctor_notes" class="form-control" rows="3"></textarea>
  </div>

  <div class="col-12 d-flex gap-2 justify-content-end">
    <button type="submit" class="btn btn-success">Save Result</button>
  </div>

</fieldset>
</form>

          </div>
        </div>

        <!-- 5) Vaccination Status -->
        <div class="tab-pane fade" id="tab-vaccine" role="tabpanel">
                   @if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
  {{ session('success') }}
  <button class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
          <div class="card p-4">
            <h5 class="fw-bold mb-1">Update Vaccination Status</h5>
            <div class="muted mb-3">Update dose details after vaccination.</div>

                  @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

        <form method="POST" action="{{ route('loadVaccBooking') }}">
            @csrf
            <div class="row g-2 mb-3">
              <div class="col-md-4">
                <input name="booking_id" class="form-control" placeholder="Booking ID (e.g. 12)" required>
              </div>
              <div class="col-md-4">
                <input name="cnic" class="form-control" placeholder="Patient CNIC" required>
              </div>
              <div class="col-md-4">
                <button class="btn btn-success w-100">Load Booking</button>
              </div>
            </div>
            </form>

           @if(session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
</div>
@endif

@if(session('loadedVaccBooking'))
@php $booking = session('loadedVaccBooking'); @endphp

<div class="card p-3 mb-3">
  <div class="d-flex flex-wrap justify-content-between gap-2">
    <div>
      <div class="fw-semibold">
        Patient: {{ $booking->user->name }}
      </div>
      <div class="muted small">
        Service: {{ $booking->vaccine_type }} |
        Date: {{ $booking->preferred_date }} |
        Slot: {{ $booking->time_slot }}
      </div>
    </div>

    <span class="badge bg-warning text-dark align-self-start">
      Pending Result
    </span>
  </div>
</div>
@endif


 @if(session('loadedVaccBooking'))
<form method="POST"
      action="{{ route('hospital.saveVaccUpdate', session('loadedVaccBooking')->id) }}"
      class="row g-3">
@csrf
@else
<form class="row g-3">
@endif

<fieldset {{ session('loadedVaccBooking') ? '' : 'disabled' }}>

            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label fw-semibold">Dose</label>
                <select class="form-select" name ="dose_no" required>
                  <option selected disabled>Select dose</option>
                  <option value="1">Dose 1</option>
                  <option value="2">Dose 2</option>
                  <option value="booster">Booster</option>
                </select>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold">Vaccine Name</label>
                <input class="form-control" name="vaccine_type" placeholder="e.g. Pfizer, Sinopharm" required>
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold">Vaccination Date</label>
                <input type="date" class="form-control" name="preferred_date" required>
              </div>

              <div class="col-12">
                <div class="alert alert-info mb-0">
                  Make sure vaccine stock and record details are correct.
                </div>
              </div>

              <div class="col-12 d-flex gap-2 justify-content-end">
                <button type="submit" class="btn btn-success">Save Vaccination</button>

              </div>
  </div>
            </fieldset>
  </form>

            
          </div>
        </div>

        <!-- 6) Hospital Profile -->
        <div class="tab-pane fade" id="tab-profile" role="tabpanel">
          <div class="card p-4">
            <h5 class="fw-bold mb-1">Hospital Profile</h5>
            <div class="muted mb-3">Update hospital details shown to patients.</div>
@if(session('success'))
  <div class="alert alert-success mb-3">
    {{ session('success') }}
  </div>
@endif
            <form class="row g-3" method="post" action="{{ route('hospital.profile.update') }}">
              @csrf
              <div class="col-md-6">
                <label class="form-label fw-semibold">Hospital Name</label>
                <input class="form-control" name="name" value="{{$hospital->name}}">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">City</label>
                <input class="form-control" name="city" value="{{$hospital->city}}">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Contact Number</label>
                <input class="form-control" name="phone" value="{{$hospital->phone}}">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Email</label>
                <input class="form-control" name="email" value="{{$hospital->email}}">
              </div>
              <div class="col-12">
                <label class="form-label fw-semibold">Address</label>
                <input class="form-control" name="address" value="{{$hospital->address}}">
              </div>

              <div class="col-12">
           <label class="form-label fw-semibold">Services</label>

         <select name="services" class="form-select" required>
    <option value="covidTest" {{ $hospital->services == 'covidTest' ? 'selected' : '' }}>
      COVID Test
    </option>

    <option value="vaccination" {{ $hospital->services == 'vaccination' ? 'selected' : '' }}>
      Vaccination
    </option>

    <option value="both" {{ $hospital->services == 'both' ? 'selected' : '' }}>
      COVID Test + Vaccination
    </option>
         </select>
        </div>


              <div class="col-12 d-flex gap-2 justify-content-end">
                <a href="{{route('hospitalProfile')}}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
                <button type="submit" class="btn btn-success">Save Changes</button>
              </div>
              <div class="col-12 mt-2">
                <div class="alert alert-danger mb-0">
                  <b>Danger Zone:</b> Deleting your account removes your history.
                  <div class="mt-2">
                    <a href="{{route('HosdeleteAccount',$hospital->id)}}"><button type="button" class="btn btn-danger">Delete Account</button></a>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>

      </div><!-- /tab-content -->
    </div>

  </div>
</div>

<!-- Bootstrap JS (REQUIRED) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Keep sidebar active state synced -->
<script>
  document.querySelectorAll('.side-link').forEach(link=>{
    link.addEventListener('click', ()=>{
      document.querySelectorAll('.side-link').forEach(l=>l.classList.remove('active'));
      link.classList.add('active');
    });
  });

  
document.addEventListener("DOMContentLoaded", function () {
    if (window.location.hash) {
        const tabTrigger = document.querySelector(
            `.side-link[href="${window.location.hash}"]`
        );

        if (tabTrigger) {
            const tab = new bootstrap.Tab(tabTrigger);
            tab.show();
        }
    }
});


</script>

@if(session('activeTab'))
<script>
document.addEventListener("DOMContentLoaded", function () {
    const tabId = "{{ session('activeTab') }}";
    const tabTrigger = document.querySelector(
        `.side-link[href="#${tabId}"]`
    );

    if (tabTrigger) {
        const tab = new bootstrap.Tab(tabTrigger);
        tab.show();
    }
});
</script>
@endif


</body>
</html>
