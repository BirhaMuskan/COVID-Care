@extends('admin.navbar')
@section('content')

<style>
    :root{
      --bg:#ffffff;                 /* ✅ no purple */
      --panel:#ffffff;
      --card:#ffffff;
      --text:#1b2559;
      --muted:#7a86a8;
      --line:#eef1fb;

      --primary:#3e4fdd;
      --primary-2:#5a6bff;
      --primary-soft:#eef0ff;

      --shadow: 0 18px 45px rgba(17, 24, 39, .08);
      --shadow-sm: 0 10px 25px rgba(17, 24, 39, .06);

      --r-xl:28px;
      --r-lg:20px;
      --r-md:14px;
    }

    body{font-family:Poppins;background:var(--bg);color:var(--text);}

    /* ===== Top Navbar ===== */
    .topbar{
      height:70px;
      background:#fff;
      border-bottom:1px solid var(--line);
    }
    .topbar .brand{
      display:flex;align-items:center;gap:10px;font-weight:900;
    }
    .topbar .logo{
      width:36px;height:36px;border-radius:14px;
      display:grid;place-items:center;
      background:linear-gradient(135deg,var(--primary),var(--primary-2));
      color:#fff;
      box-shadow:var(--shadow-sm);
      font-weight:900;
    }
    .pill{
      padding:.25rem .6rem;border-radius:999px;
      border:1px solid var(--line);font-size:.82rem;
      background:#fbfcff;
    }

    /* ===== Full page dashboard layout ===== */
    .dash-shell{
      min-height:calc(100vh - 70px);
      padding:18px;
      background:#fff;
    }

    .dash-panel{
      width:100%;
      min-height:calc(100vh - 70px - 36px);
      background:var(--panel);
      border-radius:var(--r-xl);
      border:1px solid var(--line);
      box-shadow:var(--shadow);
      overflow:hidden;
    }

    .dash-grid{
      display:grid;
      grid-template-columns: 260px 1fr 360px;
      min-height:calc(100vh - 70px - 36px);
    }

    /* ===== Sidebar ===== */
    .sidebar{
      border-right:1px solid var(--line);
      padding:18px 14px;
      background:#fff;
      display:flex;
      flex-direction:column;
      gap:10px;
    }
    .side-head{padding:8px 10px 4px;}
    .side-title{font-weight:900;margin:0;font-size:14px;}
    .side-sub{margin:4px 0 0;color:var(--muted);font-weight:600;font-size:12px;}

    .side-nav{
      display:flex;
      flex-direction:column;
      gap:6px;
      padding:6px;
    }
    .side-link{
      display:flex;
      align-items:center;
      gap:10px;
      padding:11px 12px;
      border-radius:12px;
      text-decoration:none;
      color:rgba(27,37,89,.75);
      font-weight:700;
      font-size:13px;
      position:relative;
    }
    .side-link i{font-size:15px;color:rgba(27,37,89,.55);}
    .side-link:hover{background:rgba(62,79,221,.08);color:var(--text);}
    .side-link.active{
      background:rgba(62,79,221,.10);
      color:var(--primary);
    }
    .side-link.active i{color:var(--primary);}
    .side-link.active::after{
      content:"";
      position:absolute;
      right:-6px;
      top:10px;
      bottom:10px;
      width:4px;
      border-radius:10px;
      background:var(--primary);
    }

    .side-spacer{flex:1;}
    .side-logout{
      margin:0 6px 6px;
      padding:11px 12px;
      border-radius:12px;
      border:1px solid var(--line);
      background:#fbfcff;
      display:flex;align-items:center;gap:10px;
      text-decoration:none;
      color:rgba(27,37,89,.78);
      font-weight:800;
      font-size:13px;
    }
    .side-logout:hover{background:#f5f7ff}

    /* ===== Main ===== */
    .main{
      padding:16px 16px 20px;
      background:linear-gradient(180deg,#fff 0%, #fff 70%, #fbfcff 100%);
    }

    .main-top{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:12px;
      padding:6px 6px 14px;
    }

    .search{
      flex:1;
      max-width:720px;
      display:flex;
      align-items:center;
      gap:10px;
      background:#f5f7ff;
      border:1px solid var(--line);
      padding:10px 12px;
      border-radius:14px;
    }
    .search i{color:rgba(27,37,89,.55)}
    .search input{
      border:none;outline:none;background:transparent;width:100%;
      font-family:inherit;font-size:13px;color:var(--text);
    }

    .btn-primary-soft{
      background:var(--primary);
      border:none;
      color:#fff;
      border-radius:12px;
      padding:10px 14px;
      font-weight:900;
      box-shadow:0 12px 26px rgba(62,79,221,.25);
    }
    .btn-primary-soft:hover{filter:brightness(.98);transform:translateY(-1px);}

    /* Banner (use dynamic stats in it) */
    .banner{
      margin:6px;
      border-radius:18px;
      padding:20px;
      background:linear-gradient(135deg, var(--primary) 0%, var(--primary-2) 100%);
      color:#fff;
      position:relative;
      overflow:hidden;
      box-shadow:0 18px 45px rgba(62,79,221,.22);
      display:flex;
      justify-content:space-between;
      align-items:center;
      gap:14px;
      min-height:120px;
    }
    .banner::before{
      content:"";
      position:absolute;
      width:260px;height:260px;border-radius:50%;
      right:-110px; top:-140px;
      background:rgba(255,255,255,.14);
    }
    .banner::after{
      content:"";
      position:absolute;
      width:190px;height:190px;border-radius:50%;
      right:70px; bottom:-120px;
      background:rgba(255,255,255,.10);
    }
    .banner h3{margin:0 0 6px;font-size:18px;font-weight:900;}
    .banner p{margin:0;opacity:.88;font-size:12px;font-weight:600;line-height:1.6}
    .banner .art{
      width:170px;height:120px;
      border-radius:18px;
      background:rgba(255,255,255,.10);
      border:1px solid rgba(255,255,255,.18);
      display:grid;place-items:center;
      font-weight:900;font-size:12px;opacity:.95;
      z-index:1;
    }

    .section-head{
      display:flex;align-items:center;justify-content:space-between;
      margin:16px 6px 10px;
    }
    .section-head h4{
      margin:0;font-size:12px;font-weight:950;
      letter-spacing:.2px;color:rgba(27,37,89,.86);
    }
    .chip{
      background:#f5f7ff;
      border:1px solid var(--line);
      color:rgba(27,37,89,.74);
      padding:6px 10px;
      border-radius:999px;
      font-weight:900;
      font-size:11px;
      cursor:pointer;
    }

    /* KPI cards like reference */
    .kpi-row{
      display:grid;
      grid-template-columns: repeat(4, 1fr);
      gap:12px;
      padding:0 6px;
    }
    .kpi-card{
      background:var(--card);
      border:1px solid var(--line);
      border-radius:18px;
      padding:14px 12px;
      box-shadow:0 10px 24px rgba(17,24,39,.04);
      min-height:86px;
    }
    .kpi-icon{
      width:36px;height:36px;border-radius:14px;
      display:grid;place-items:center;
      background:var(--primary-soft);
      color:var(--primary);
      margin-bottom:10px;
      font-weight:900;
    }
    .kpi-card .t1{margin:0;font-size:11px;font-weight:950;}
    .kpi-card .val{margin:2px 0 0;font-size:22px;font-weight:950;letter-spacing:-.3px;}
    .kpi-card .sub{margin:2px 0 0;font-size:10px;color:var(--muted);font-weight:700;}

    /* Tables/cards */
    .cc-box{
      background:#fff;
      border:1px solid var(--line);
      border-radius:20px;
      box-shadow:0 12px 28px rgba(17,24,39,.05);
      overflow:hidden;
    }
    .cc-box .box-head{
      padding:12px 14px;
      display:flex;align-items:center;justify-content:space-between;
      border-bottom:1px solid var(--line);
    }
    .cc-box .box-head strong{font-size:12px;font-weight:950;}
    .cc-table thead th{
      background:#fbfcff !important;
      color:rgba(27,37,89,.55) !important;
      font-size:11px;
      font-weight:950;
      border-bottom:1px solid var(--line) !important;
    }
    .cc-table td{
      font-size:11px;
      font-weight:650;
      color:rgba(27,37,89,.82);
      border-top:1px solid var(--line) !important;
      vertical-align:middle;
    }
    .row-active{
      background:rgba(62,79,221,.08) !important;
    }
    .row-active td:first-child{
      border-left:4px solid var(--primary);
    }

    /* Right panel */
    .right{
      border-left:1px solid var(--line);
      padding:16px 16px 18px;
      background:#fff;
    }
    .profile{
      display:flex;align-items:center;justify-content:space-between;
      gap:10px;
      padding:4px 2px 12px;
      border-bottom:1px solid var(--line);
      margin-bottom:12px;
    }
    .profile .who{line-height:1.1}
    .profile strong{display:block;font-size:12px;font-weight:950;}
    .profile span{display:block;font-size:10px;color:var(--muted);font-weight:800;}
    .avatar{
      width:36px;height:36px;border-radius:999px;
      background:linear-gradient(135deg,#ffd2d2,#ffe7c2);
      border:1px solid rgba(0,0,0,.05);
    }

    .r-card{
      background:#fff;
      border:1px solid var(--line);
      border-radius:20px;
      padding:12px;
      box-shadow:0 12px 28px rgba(17,24,39,.05);
      margin-bottom:12px;
    }
    .r-card h5{margin:0 0 10px;font-size:11px;font-weight:950;color:rgba(27,37,89,.88);}

    .cal-head{
      display:flex;justify-content:space-between;
      margin-bottom:10px;font-size:10px;color:var(--muted);font-weight:950;
    }
    .cal-grid{
      display:grid;grid-template-columns:repeat(7,1fr);gap:8px;
      font-size:10px;text-align:center;
    }
    .cal-grid .d{
      padding:8px 0;border-radius:12px;border:1px solid var(--line);
      background:#fbfcff;font-weight:950;color:rgba(27,37,89,.75);
    }
    .cal-grid .d.active{
      background:rgba(62,79,221,.12);
      border-color:rgba(62,79,221,.25);
      color:var(--primary);
    }

    .mini-list{display:flex;flex-direction:column;gap:10px;}
    .mini-item{
      display:flex;align-items:center;justify-content:space-between;gap:10px;
    }
    .mini-left{display:flex;align-items:center;gap:10px;min-width:0;}
    .pavatar{
      width:32px;height:32px;border-radius:999px;
      background:var(--primary-soft);
      border:1px solid var(--line);
    }
    .mini-meta{min-width:0;line-height:1.1}
    .mini-meta strong{
      display:block;font-size:11px;font-weight:950;
      white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
    }
    .mini-meta span{display:block;font-size:10px;color:var(--muted);font-weight:800;}
    .mini-actions{display:flex;gap:8px;}
    .mini-actions a, .mini-actions button{
      width:30px;height:30px;border-radius:11px;
      border:1px solid var(--line);
      background:#fbfcff;
      display:grid;place-items:center;
      color:rgba(27,37,89,.6);
      text-decoration:none;
      cursor:pointer;
    }
    .mini-actions a:hover, .mini-actions button:hover{background:#f5f7ff;}

    /* Responsive */
    @media (max-width: 1300px){
      .dash-grid{grid-template-columns:240px 1fr 330px;}
      .kpi-row{grid-template-columns:repeat(2,1fr);}
    }
    @media (max-width: 980px){
      .dash-grid{grid-template-columns:1fr;}
      .sidebar{border-right:none;border-bottom:1px solid var(--line);}
      .right{border-left:none;border-top:1px solid var(--line);}
      .kpi-row{grid-template-columns:repeat(2,1fr);}
    }
    @media (max-width: 560px){
      .kpi-row{grid-template-columns:1fr;}
      .dash-shell{padding:10px;}
      .dash-panel{border-radius:18px;}
    }
  </style>

<div class="dash-shell" style="padding-top:90px;">
  <div class="dash-panel">
    <div class="dash-grid">

      <aside class="sidebar">
        <div class="side-head">
          <p class="side-title mb-0">Admin Panel</p>
          <p class="side-sub">System monitoring & approvals</p>
        </div>

        <!-- ✅ Proper tab roles/aria -->
        <div class="side-nav nav flex-column" role="tablist" aria-orientation="vertical">
          <a class="side-link active" id="tab-overview" data-bs-toggle="pill" href="#overview" role="tab" aria-controls="overview" aria-selected="true">
            <i class="bi bi-grid"></i> Overview
          </a>
          <a class="side-link" id="tab-users" data-bs-toggle="pill" href="#users" role="tab" aria-controls="users" aria-selected="false">
            <i class="bi bi-people"></i> Manage Users
          </a>
          <a class="side-link" id="tab-hospitals" data-bs-toggle="pill" href="#hospitals" role="tab" aria-controls="hospitals" aria-selected="false">
            <i class="bi bi-hospital"></i> Hospitals
          </a>
          <a class="side-link" id="tab-patients" data-bs-toggle="pill" href="#patients" role="tab" aria-controls="patients" aria-selected="false">
            <i class="bi bi-person-heart"></i> Patients
          </a>
          <a class="side-link" id="tab-reports"  href="{{route('systemReports')}}"  aria-controls="reports" aria-selected="false">
            <i class="bi bi-bar-chart"></i> Reports
          </a>
        </div>

        <div class="side-spacer"></div>

        <a class="side-logout" href="{{ route('logout') }}">
          <i class="bi bi-box-arrow-right"></i> Logout
        </a>
      </aside>

      <main class="main">

        <section class="banner">
          <div>
            <h3>Good Morning Admin</h3>
            <p>
              You have <b>{{ $pendingApprovals }}</b> pending approvals and
              <b>{{ $totalBookings }}</b> total bookings.
            </p>
            <p style="margin-top:6px;opacity:.78">
              Total Patients: <b>{{ $totalPatients }}</b> • Hospitals: <b>{{ $totalHospitals }}</b>
            </p>
          </div>
          {{-- <div class="art">Illustration</div> --}}
        </section>

        <div class="tab-content">

          <!-- OVERVIEW -->
          <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="tab-overview" tabindex="0">
            <div class="section-head">
              <h4>OVERVIEW</h4>
              <span class="chip">Live</span>
            </div>

            <div class="kpi-row">
              <div class="kpi-card">
                <div class="kpi-icon"><i class="bi bi-people"></i></div>
                <p class="t1">Total Patients</p>
                <div class="val text-primary">{{ $totalPatients }}</div>
                <div class="sub">Registered users</div>
              </div>

              <div class="kpi-card">
                <div class="kpi-icon"><i class="bi bi-hospital"></i></div>
                <p class="t1">Hospitals</p>
                <div class="val text-success">{{ $totalHospitals }}</div>
                <div class="sub">Registered hospitals</div>
              </div>

              <div class="kpi-card">
                <div class="kpi-icon"><i class="bi bi-calendar2-check"></i></div>
                <p class="t1">Bookings</p>
                <div class="val text-warning">{{ $totalBookings }}</div>
                <div class="sub">All time</div>
              </div>

              <div class="kpi-card">
                <div class="kpi-icon"><i class="bi bi-shield-exclamation"></i></div>
                <p class="t1">Pending Approvals</p>
                <div class="val text-danger">{{ $pendingApprovals }}</div>
                <div class="sub">Needs review</div>
              </div>
            </div>

            <div class="section-head mt-4">
              <h4>RECENT ACTIVITY</h4>
              <span class="chip">Updated</span>
            </div>

            <!-- ✅ FIXED: only ONE cc-box wrapper, correctly closed -->
            <div class="cc-box">
              <div class="box-head">
                <strong>Hospitals</strong>
                <span style="font-size:11px;color:var(--muted);font-weight:900;">
                  {{ $hospitals->count() }} total • approve pending
                </span>
              </div>

              <div class="table-responsive">
                <table class="table cc-table mb-0">
                  <thead>
                    <tr>
                      <th style="width:70px;">ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th style="width:140px;">Status</th>
                      <th class="text-end" style="width:160px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($hospitals as $hospital)
                      <tr class="{{ $hospital->status === 'pending' ? 'row-active' : '' }}">
                        <td>{{ $hospital->id }}</td>
                        <td>{{ $hospital->name }} Hospital</td>
                        <td>{{ $hospital->email }}</td>
                        <td>
                          @if($hospital->status === 'pending')
                            <span class="badge bg-warning text-dark">{{ $hospital->status }}</span>
                          @else
                            <span class="badge bg-primary">{{ $hospital->status }}</span>
                          @endif
                        </td>
                        <td class="text-end">
                          @if ($hospital->status === 'pending')
                            <a href="{{ route('approve', $hospital->id) }}" class="btn btn-sm btn-success">
                              <i class="bi bi-check2-circle me-1"></i> Approve
                            </a>
                          @else
                            <button class="btn btn-sm btn-secondary" disabled>
                              <i class="bi bi-check2-circle me-1"></i> Approved
                            </button>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- USERS -->
          <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="tab-users" tabindex="0">
            <div class="section-head">
              <h4>MANAGE USERS</h4>
              <span class="chip">{{ $users->count() }} Users</span>
            </div>

            <div class="cc-box">
              <div class="box-head">
                <strong>Users</strong>
                <span – style="font-size:11px;color:var(--muted);font-weight:900;">excluding admin</span>
              </div>

              <div class="table-responsive">
                <table class="table cc-table mb-0">
                  <thead>
                    <tr>
                      <th style="width:70px;">ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th style="width:120px;">Role</th>
                      <th style="width:140px;">Status</th>
                      <th class="text-end" style="width:140px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      @if($user->role !== 'admin')
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td><span class="badge text-bg-light">{{ $user->role }}</span></td>

                          <td>
                            @if ($user->role === 'patient')
                              <span class="badge bg-success">Active</span>
                            @elseif ($user->role === 'hospital' && $user->hospital)
                              @if ($user->hospital->status === 'approved')
                                <span class="badge bg-primary">Approved</span>
                              @else
                                <span class="badge bg-warning text-dark">Pending</span>
                              @endif
                            @else
                              <span class="badge text-bg-secondary">—</span>
                            @endif
                          </td>

                          <td class="text-end">
                            <a href="{{ route('userDelete', $user->id) }}" class="btn btn-sm btn-outline-danger">
                              <i class="bi bi-slash-circle me-1"></i> Deactivate
                            </a>
                          </td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- HOSPITALS -->
          <div class="tab-pane fade" id="hospitals" role="tabpanel" aria-labelledby="tab-hospitals" tabindex="0">
            <div class="section-head">
              <h4>REGISTERED HOSPITALS</h4>
              <span class="chip">{{ $hospitals->count() }} Hospitals</span>
            </div>

            <div class="cc-box">
              <div class="box-head">
                <strong>Hospitals</strong>
                <span style="font-size:11px;color:var(--muted);font-weight:900;">approve pending</span>
              </div>

              <div class="table-responsive">
                <table class="table cc-table mb-0">
                  <thead>
                    <tr>
                      <th style="width:70px;">ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th style="width:140px;">Status</th>
                      <th class="text-end" style="width:160px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($hospitals as $hospital)
                      <tr class="{{ $hospital->status === 'pending' ? 'row-active' : '' }}">
                        <td>{{ $hospital->id }}</td>
                        <td>{{ $hospital->name }} Hospital</td>
                        <td>{{ $hospital->email }}</td>
                        <td>
                          @if($hospital->status === 'pending')
                            <span class="badge bg-warning text-dark">{{ $hospital->status }}</span>
                          @else
                            <span class="badge bg-primary">{{ $hospital->status }}</span>
                          @endif
                        </td>
                        <td class="text-end">
                          @if ($hospital->status === 'pending')
                            <a href="{{ route('approve', $hospital->id) }}" class="btn btn-sm btn-success">
                              <i class="bi bi-check2-circle me-1"></i> Approve
                            </a>
                          @else
                            <button class="btn btn-sm btn-secondary" disabled>
                              <i class="bi bi-check2-circle me-1"></i> Approved
                            </button>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- PATIENTS -->
          <div class="tab-pane fade" id="patients" role="tabpanel" aria-labelledby="tab-patients" tabindex="0">
            <div class="section-head">
              <h4>REGISTERED PATIENTS</h4>
              <span class="chip">{{ $patients->count() }} Patients</span>
            </div>

            <div class="cc-box">
              <div class="box-head">
                <strong>Patients</strong>
                <span style="font-size:11px;color:var(--muted);font-weight:900;">active users</span>
              </div>

              <div class="table-responsive">
                <table class="table cc-table mb-0">
                  <thead>
                    <tr>
                      <th style="width:70px;">ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th style="width:140px;">Status</th>
                      <th class="text-end" style="width:140px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($patients as $patient)
                      <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->email }}</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td class="text-end">
                          <a href="{{ route('userDelete', $patient->id) }}" class="btn btn-sm btn-outline-danger">
                            <i class="bi bi-slash-circle me-1"></i> Deactivate
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        

        </div>
      </main>

      <aside class="right">
        <div class="profile">
          <div class="who">
            <strong>Admin</strong>
            <span>System overview</span>
          </div>
          <div class="avatar"></div>
        </div>

        {{-- <div class="r-card">
          <h5>Schedule Calendar</h5>
          <div class="cal-head">
            <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Sun</span>
          </div>
          <div class="cal-grid">
            <div class="d">21</div><div class="d">22</div><div class="d active">23</div>
            <div class="d">24</div><div class="d">25</div><div class="d">26</div><div class="d">27</div>
          </div>
        </div> --}}

        <div class="r-card">
          <h5>Pending Approvals</h5>
          <div class="mini-list">
            <div class="mini-item">
              <div class="mini-left">
                <div class="pavatar"></div>
                <div class="mini-meta">
                  <strong>Hospital Requests</strong>
                  <span>{{ $pendingApprovals }} pending</span>
                </div>
              </div>
              
            </div>

            <div class="mini-item">
              <div class="mini-left">
                <div class="pavatar"></div>
                <div class="mini-meta">
                  <strong>Total Patients</strong>
                  <span>{{ $totalPatients }} registered</span>
                </div>
              </div>
             
            </div>
          </div>
        </div>

        <<div class="r-card">
  <h5>Admin Tips</h5>

  <ul class="list-unstyled small mb-0 text-muted">
    <li class="d-flex align-items-start mb-2">
      <i class="bi bi-lightbulb text-primary me-2 mt-1"></i>
      Review newly registered hospitals daily to avoid delays in approval.
    </li>

    <li class="d-flex align-items-start mb-2">
      <i class="bi bi-shield-check text-success me-2 mt-1"></i>
      Ensure hospital licenses and contact details are verified before activation.
    </li>

    <li class="d-flex align-items-start mb-2">
      <i class="bi bi-people text-secondary me-2 mt-1"></i>
      Regularly monitor user roles to maintain proper access control.
    </li>

    <li class="d-flex align-items-start mb-2">
      <i class="bi bi-graph-up text-warning me-2 mt-1"></i>
      Use reports to track test requests, vaccination trends, and system usage.
    </li>

    <li class="d-flex align-items-start">
      <i class="bi bi-exclamation-circle text-danger me-2 mt-1"></i>
      Immediately suspend accounts showing suspicious or incomplete activity.
    </li>
  </ul>
</div>

      </aside>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Keep active highlight on side links
  document.querySelectorAll('.side-link').forEach(link=>{
    link.addEventListener('click',()=>{
      document.querySelectorAll('.side-link').forEach(l=>l.classList.remove('active'));
      link.classList.add('active');
    });
  });

  // Hash open
  document.addEventListener("DOMContentLoaded", function () {
    const hash = window.location.hash;
    if (hash) {
      const triggerEl = document.querySelector(`a[data-bs-toggle="pill"][href="${hash}"]`);
      if (triggerEl) new bootstrap.Tab(triggerEl).show();
    }
  });
</script>

</body>
</html>

@endsection