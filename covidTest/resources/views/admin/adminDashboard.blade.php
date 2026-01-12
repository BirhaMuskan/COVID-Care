<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>COVIDCare — Admin Dashboard</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{ asset('home/assets/css/home.css') }}">

  <style>
    body{font-family:Poppins}
    .dash-wrap{padding-top:90px;padding-bottom:40px}
    .sidebar{
      background:#fff;border:1px solid #eee;border-radius:16px;
      padding:1rem;position:sticky;top:90px
    }
    .side-link{
      display:flex;gap:.6rem;padding:.7rem 1rem;
      border-radius:12px;text-decoration:none;
      color:#444;font-weight:600
    }
    .side-link:hover,.side-link.active{
      background:#f1e9ff;color:#6f42c1
    }
    .pill{
      padding:.25rem .6rem;border-radius:999px;
      border:1px solid #ddd;font-size:.82rem
    }
    .kpi{border-radius:16px;border:1px solid #eee}
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">COVIDCare</a>
    <div class="d-flex gap-2">
      <span class="pill d-none d-md-inline">Admin</span>
      <a class="btn btn-outline-secondary btn-sm" href="{{ url('/') }}">Home</a>
      <a class="btn btn-dark btn-sm" href="{{route('logout')}}">Logout</a>
    </div>
  </div>
</nav>

<div class="container dash-wrap">
  <div class="row g-4">

    <!-- Sidebar -->
    <div class="col-lg-3">
      <aside class="sidebar">
        <div class="fw-bold mb-2">Admin Panel</div>
        <p class="text-muted small">System monitoring & approvals</p>

        <div class="nav flex-column" role="tablist">
          <a class="side-link active" data-bs-toggle="pill" href="#overview">📊 Overview</a>
          <a class="side-link" data-bs-toggle="pill" href="#users">👥 Manage Users</a>
          <a class="side-link" data-bs-toggle="pill" href="#hospitals">🏥 Hospitals</a>
          <a class="side-link" data-bs-toggle="pill" href="#patients">🏥 Patients</a>
          <a class="side-link" data-bs-toggle="pill" href="#reports">📈 Reports</a>
          <a class="side-link" data-bs-toggle="pill" href="#settings">⚙️ Settings</a>
        </div>
      </aside>
    </div>

    <!-- Content -->
    <div class="col-lg-9">
      <div class="tab-content">

        <!-- 1) Overview -->
        <div class="tab-pane fade show active" id="overview">
          <div class="card p-4 mb-3">
            <h4 class="fw-bold">System Overview</h4>
            <p class="text-muted">Monitor overall COVIDCare activity</p>
          </div>

          <div class="row g-3">
            <div class="col-md-3">
              <div class="card p-3 text-center kpi">
                <div>Total Patients</div>
                <h3 class="text-primary">{{$totalPatients}}</h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card p-3 text-center kpi">
                <div>Hospitals</div>
                <h3 class="text-success">{{$totalHospitals}}</h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card p-3 text-center kpi">
                <div>Bookings</div>
                <h3 class="text-warning">{{$totalBookings}}</h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card p-3 text-center kpi">
                <div>Pending Approvals</div>
                <h3 class="text-danger">{{$pendingApprovals}}</h3>
              </div>
            </div>
          </div>
        </div>

        <!-- 2) Manage Users -->
        <div class="tab-pane fade" id="users">
          <div class="card p-4">
            <h5 class="fw-bold">Users</h5>
            <table class="table table-bordered mt-3">
              <thead class="table-light">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
              
             @foreach ($users as $user)
<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role }}</td>

    <!-- @if ($user->role == 'patient')
        <td><span class="badge bg-success">Active</span></td>
        <td class="text-end">
            <a href="{{route('userDelete',$user->id)}}"><button class="btn btn-sm btn-outline-danger">Deactivate</button></a>
        </td>

    @elseif ($user->role == 'hospital')
        <td><span class="badge bg-warning text-dark">Pending</span></td>
        <td class="text-end">
            <a href=""><button class="btn btn-sm btn-success">Approve</button></a>
        </td>
    @endif -->

    {{-- STATUS COLUMN --}}
<td>
    @if ($user->role === 'patient')
        <span class="badge bg-success">Active</span>

    @elseif ($user->role === 'hospital' && $user->hospital)
        @if ($user->hospital->status === 'approved')
            <span class="badge bg-primary">Approved</span>
        @else
            <span class="badge bg-warning text-dark">Pending</span>
        @endif
    @endif
</td>

{{-- ACTION COLUMN --}}
<td class="text-end"><a href="{{ route('userDelete', $user->id) }}"class="btn btn-sm btn-outline-danger"> Deactivate</a>
</td>
</tr>
@endforeach

              </tbody>
            </table>
          </div>
        </div>

        <!-- 3) Hospitals -->
        <div class="tab-pane fade" id="hospitals">
          <div class="card p-4">
            <h5 class="fw-bold">Registered Hospitals</h5>
            <table class="table table-striped mt-3">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hospitals as $hospital)
                
                <tr>
                  <td>{{$hospital->id}}</td>
                  <td>{{ $hospital->name }} Hospital</td>
                  <td>{{ $hospital->email }}</td>
                  @if($hospital->status == 'pending')
                  <td><span class="badge bg-warning text-dark">{{ $hospital->status }}</span></td>
                  @elseif($hospital->status == 'approved')
                  <td><span class="badge bg-primary ">{{ $hospital->status }}</span></td>
                  @endif

                

                  <td class="text-end">
                      @if ($hospital->status === 'pending')
           <a href="{{route('approve',$hospital->id)}}"
               class="btn btn-sm btn-success">
                Approve
            </a>
        @else
        <a href="#"
               class="btn btn-sm btn-secondary ">
                Approve
            </a>
            
        @endif
            
        </td>
                </tr>
                
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- ) Patients -->
        <div class="tab-pane fade" id="patients">
          <div class="card p-4">
            <h5 class="fw-bold">Registered Patients</h5>
            <table class="table table-striped mt-3">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($patients as $patient)
                
                <tr>
                  <td>{{$patient->id}}</td>
                  <td>{{ $patient->name }}</td>
                  <td>{{ $patient->email }}</td>
                  <td><span class="badge bg-success">Active</span></td>
                  <td class="text-end"><a href="{{ route('userDelete', $user->id) }}"class="btn btn-sm btn-outline-danger"> Deactivate</a></td>
                </tr>
                
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

        <!-- 4) Reports -->
        <div class="tab-pane fade" id="reports">
         <section class="py-4">
  
         <div class="container-fluid">

    <!-- PAGE HEADER -->
    <div class="cc-card p-4 mb-4">
      <h4 class="fw-bold mb-1">System Reports</h4>
      <p class="cc-subtitle mb-0">
        Generate COVID test and vaccination reports by date, week, or month
      </p>
    </div>

    <!-- FILTER CARD -->
    <div class="cc-card p-4 mb-4">
      <h5 class="fw-bold mb-3">Report Filters</h5>

      <div class="row g-3 align-items-end">

        <div class="col-md-3">
          <label class="form-label">Report Type</label>
          <select class="form-select">
            <option selected disabled>Select report</option>
            <option>COVID Test Report</option>
            <option>Vaccination Report</option>
          </select>
        </div>

        <div class="col-md-3">
          <label class="form-label">Time Range</label>
          <select class="form-select">
            <option selected disabled>Select range</option>
            <option>Date Wise</option>
            <option>Week Wise</option>
            <option>Month Wise</option>
          </select>
        </div>

        <div class="col-md-3">
          <label class="form-label">From</label>
          <input type="date" class="form-control">
        </div>

        <div class="col-md-3">
          <label class="form-label">To</label>
          <input type="date" class="form-control">
        </div>

        <div class="col-md-12 mt-3">
          <button class="btn btn-cc btn-cc-primary">
            Generate Report
          </button>
        </div>

      </div>
    </div>

    <!-- REPORT SUMMARY -->
    <div class="row g-4 mb-4">

      <div class="col-md-3">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Total Bookings</h6>
          <h3 class="fw-bold cc-text-blue">124</h3>
        </div>
      </div>

      <div class="col-md-3">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Positive Tests</h6>
          <h3 class="fw-bold cc-text-red">18</h3>
        </div>
      </div>

      <div class="col-md-3">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Negative Tests</h6>
          <h3 class="fw-bold cc-text-green">96</h3>
        </div>
      </div>

      <div class="col-md-3">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Vaccinations</h6>
          <h3 class="fw-bold">210</h3>
        </div>
      </div>

    </div>

    <!-- REPORT TABLE -->
    <div class="cc-card p-4 mb-4">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Report Details</h5>

        <button class="btn btn-cc btn-cc-success">
          Export XLS
        </button>
      </div>

      <div class="table-responsive">
        <table class="table align-middle">
          <thead class="table-light">
            <tr>
              <th>Date</th>
              <th>Hospital</th>
              <th>Type</th>
              <th>Total</th>
              <th>Positive</th>
              <th>Negative</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>13-Jan-2026</td>
              <td>City Care Hospital</td>
              <td>COVID Test</td>
              <td>42</td>
              <td class="cc-text-red fw-semibold">6</td>
              <td class="cc-text-green fw-semibold">36</td>
            </tr>
            <tr>
              <td>14-Jan-2026</td>
              <td>LifeLine Medical</td>
              <td>COVID Test</td>
              <td>38</td>
              <td class="cc-text-red fw-semibold">4</td>
              <td class="cc-text-green fw-semibold">34</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
</div>

        <!-- 5) Settings -->
        <div class="tab-pane fade" id="settings">
          <div class="card p-4">
            <h5 class="fw-bold">Admin Settings</h5>

            <div class="mb-3">
              <label class="form-label">System Status</label>
              <select class="form-select">
                <option>Online</option>
                <option>Maintenance</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Notification Email</label>
              <input class="form-control" value="admin@covidcare.com">
            </div>

            <button class="btn btn-success">Save Settings</button>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.querySelectorAll('.side-link').forEach(link=>{
    link.addEventListener('click',()=>{
      document.querySelectorAll('.side-link').forEach(l=>l.classList.remove('active'));
      link.classList.add('active');
    });
  });
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const hash = window.location.hash;

    if (hash) {
        const triggerEl = document.querySelector(
            `a[data-bs-toggle="pill"][href="${hash}"]`
        );

        if (triggerEl) {
            new bootstrap.Tab(triggerEl).show();
        }
    }
});
</script>


</body>
</html>
