@extends('admin.navbar')
@section('content')

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
          <a class="side-link"  href="{{route('systemReports')}}">📈 Reports</a>
          <!-- <a class="side-link" data-bs-toggle="pill" href="#settings">⚙️ Settings</a> -->
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
             @if($user->role !=='admin')
<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->role }}</td>

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
@endif
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

       

        <!-- 5) Settings -->
        <!-- <div class="tab-pane fade" id="settings">
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
        </div> -->

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
@endsection