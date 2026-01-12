@extends('patient.navbar')

@section('content')

    <!-- Sidebar -->
    <div class="col-lg-3">
      <aside class="sidebar">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <div class="fw-bold">Patient Panel</div>
          <span class="pill">ID: P-102</span>
        </div>
        <div class="muted small mb-3">Bookings, appointments, results & profile.</div>

        <!-- REQUIRED nav structure for Bootstrap pills -->
        <div class="nav flex-column" role="tablist">
          <a class="side-link active" data-bs-toggle="pill" href="#tab-dashboard" role="tab">🏠 Dashboard</a>
          <a class="side-link"  href="{{route('showSearch')}}">🔍 Search Hospital</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-vaccination" role="tab">📅 Book Vaccination</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-test" role="tab">📅 Book Test</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-appointments" role="tab">📋 My Appointments</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-results" role="tab">🧾 Results</a>
          <a class="side-link" data-bs-toggle="pill" href="#tab-profile" role="tab">👤 Profile</a>
        </div>

        <hr class="my-3">
        <div class="muted small">
          Tip: Carry CNIC and follow hospital instructions.
        </div>
      </aside>
    </div>

    <!-- Content -->
    <div class="col-lg-9">
      <div class="tab-content">

        <!-- 1) Dashboard -->
<div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel">

  <!-- Header -->
  <div class="card p-4 mb-3">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
      <div>
        <h4 class="fw-bold mb-1">Welcome, {{ $user->name }}</h4>
        <div class="muted">Track COVID test/vaccination appointments and reports.</div>
      </div>

      <div class="d-flex gap-2 flex-wrap">
        <span class="pill">
          Test:
          <b>
            {{ $pendingTest ? 'Pending' : 'Completed' }}
          </b>
        </span>

        <span class="pill">
          Vaccine:
          <b>{{ $takenDoses }}/2</b>
        </span>
      </div>
    </div>
  </div>

  <!-- KPIs -->
  <div class="row g-3 mb-3">

    <div class="col-md-3">
      <div class="card p-3 text-center kpi">
        <div class="muted">Total Bookings</div>
        <div class="fs-2 fw-bold text-primary">
          {{ $totalBookings }}
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 text-center kpi">
        <div class="muted">Upcoming</div>
        <div class="fs-2 fw-bold text-success">
          {{ $upcoming }}
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 text-center kpi">
        <div class="muted">Last Test</div>

        @if($latestTest)
          <span class="badge 
            {{ $latestTest->result === 'Negative' ? 'bg-success' : 'bg-danger' }} fs-6">
            {{ $latestTest->result }}
          </span>
        @else
          <span class="badge bg-secondary fs-6">No Test</span>
        @endif
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 text-center kpi">
        <div class="muted">Next Dose</div>

        @if($takenDoses >= 2)
          <span class="badge bg-success fs-6">Completed</span>
        @elseif($nextDoseBooked)
          <span class="badge bg-warning text-dark fs-6">Booked</span>
        @else
          <span class="badge bg-info text-dark fs-6">Not Booked</span>
        @endif
      </div>
    </div>

  </div>

  <!-- Notifications -->
  <div class="card p-4">
    <h5 class="fw-bold mb-2">Notifications</h5>

    <ul class="mb-0 muted">
      @if($upcoming > 0)
        <li>Your appointment request is under review.</li>
      @endif

      <li>Bring CNIC and wear a mask during visit.</li>

      @if($latestTest)
        <li>You can download reports from the Results tab.</li>
      @endif
    </ul>
  </div>

</div>
<!-- 2) Search Hospital (STATIC) -->
<!-- <div class="tab-pane fade" id="tab-search" role="tabpanel">
  <div class="card p-4 mb-3">
    <h5 class="fw-bold mb-1">Search Hospitals</h5>
    <div class="muted mb-3">Filter by hospital name, city and service type.</div>

   
    <form action="{{route('search')}}" method='post' class="row g-2">
      @csrf
            
      <div class="col-md-7">
       <input type="text" name="name" class="form-control"
             placeholder="Hospital name"
             value="">

      </div>

   

    
      <div class="col-md-3">
        <select id="serviceFilter" class="form-select">
          <option value="all">Both (Test + Vaccination)</option>
          <option value="covidTest">COVID Test</option>
          <option value="vaccination">Vaccination</option>
        </select>
      </div>

      <div class="col-md-2">
        <button class="btn btn-primary w-100" type=submit>
          Search
        </button>
      </div>

    </form>


  </div>



          <div class="table-responsive">
            <table class="table table-bordered bg-white">
              <thead class="table-light">
                <tr>
                  <th>Hospital</th>
                  <th>City</th>
                  <th>Services</th>
                  <th>Status</th>
                  <th class="text-end">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($hospitals as $hospital)
                
                <tr>
                  <td class="fw-semibold">{{$hospital->name}} Hospital</td>
                  <td>{{$hospital->city}}</td>
                  <td><span class="badge bg-primary">{{$hospital->services}}</span></td>
                  <td><span class="badge bg-success">Available</span></td>
                  <td class="text-end">
                    <a class="btn btn-sm btn-primary"  href="{{route('hospitalReq',$hospital->id)}}">Request</a>
                  </td>
                </tr>
                
                @endforeach
            
              </tbody>
            </table>
          </div>
        </div> -->


         <!-- Book vaccination -->      
        
               <div class="tab-pane fade" id="tab-vaccination" role="tabpanel">
         <!-- <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="test-tab"> -->

          <div class="row g-4">
            <div class="col-lg-8">
              <div class="cc-card p-4">
                <h5 class="fw-bold mb-1">Vaccination Appointment</h5>
                <div class="cc-subtitle mb-4">Select dose and slot. Hospital will confirm availability.</div>

                <form method="POST" action="{{route('vaccineBook')}}">
                  @csrf

                  <div class="row g-3">

                    <!-- Hospital -->
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Select Hospital</label>
                      <select name="hospital_id" class="form-select" required>
                        <option value="" selected disabled>Choose hospital</option>
                        @foreach($hospitals as $hospital)
                          @if($hospital->services == 'vaccination' || $hospital->services == 'both')
                          <option value="{{$hospital->id}}">{{ $hospital->name }}</option>
                           @endif
                        @endforeach
                      </select>
                      @error('hospital_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Dose -->
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Dose</label>
                      <select name="dose_no" class="form-select" required>
                        <option value="" selected disabled>Select dose</option>
                        <option value="1">Dose 1</option>
                        <option value="2">Dose 2</option>
                        <option value="booster">Booster</option>
                      </select>
                      @error('dose_no') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Vaccine Type -->
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Vaccine Type</label>
                      <select name="vaccine_type" class="form-select" required>
                        <option value="" selected disabled>Select vaccine</option>
                        <option value="Pfizer">Pfizer</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm</option>
                        <option value="Sinovac">Sinovac</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                      </select>
                      @error('vaccine_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Date -->
                    <div class="col-md-3">
                      <label class="form-label fw-semibold">Preferred Date</label>
                      <input type="date" name="preferred_date" class="form-control" required>
                      @error('preferred_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Time Slot -->
                    <div class="col-md-3">
                      <label class="form-label fw-semibold">Preferred Slot</label>
                      <select name="time_slot" class="form-select" required>
                        <option value="" selected disabled>Select slot</option>
                        <option value="09:00-09:30">09:00 - 09:30</option>
                        <option value="10:00-10:30">10:00 - 10:30</option>
                        <option value="11:00-11:30">11:00 - 11:30</option>
                        <option value="12:00-12:30">12:00 - 12:30</option>
                      </select>
                      @error('time_slot') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Allergy / Medical -->
                    <div class="col-md-12">
                      <label class="form-label fw-semibold">Allergy / Medical Condition (optional)</label>
                      <input type="text" name="medical_notes" class="form-control"
                             placeholder="e.g. allergy, blood pressure, diabetes">
                      @error('medical_notes') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12">
                      <div class="alert alert-info rounded-4 mb-0">
                        <b>Note:</b> Hospital may adjust your slot depending on vaccine availability.
                      </div>
                    </div>

                    <div class="col-12 d-grid d-sm-flex gap-2 justify-content-end mt-2">
                      <button class="btn btn-cc btn-cc-outline px-5" type="reset">Clear</button>
                      <button class="btn btn-cc btn-cc-success px-5" type="submit">Submit Vaccination Request</button>
                    </div>

                  </div>
                </form>

              </div>
            </div>

            <!-- Right Side Info -->
            <div class="col-lg-4">
              <div class="cc-card p-4 h-100">
                <h6 class="fw-bold mb-2">After booking</h6>
                <ul class="mb-0">
                  <li class="mb-2">Hospital approves your vaccination request</li>
                  <li class="mb-2">Vaccination status updates after appointment</li>
                  <li class="mb-2">Dose history appears in your dashboard</li>
                  <li>Book next dose when needed</li>
                </ul>
              </div>
            </div>

          </div>
        
        </div>

        
        <!-- 3) Book Test -->
        <div class="tab-pane fade" id="tab-test" role="tabpanel">
         <!-- <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="test-tab"> -->

          <div class="row g-4">
            <div class="col-lg-8">
              <div class="cc-card p-4">
                <h5 class="fw-bold mb-1">COVID Test Request</h5>
                <div class="cc-subtitle mb-4">Fill details and choose a preferred slot. Hospital will approve/reject.</div>

                <form method="POST" action="{{route('testBook')}}">
                  @csrf

                  <div class="row g-3">

                    <!-- Hospital -->
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Select Hospital</label>
                      <select name="hospital_id" class="form-select" required>
                        <option value="" selected disabled>Choose hospital</option>
                        @foreach($hospitals as $hospital)
                        @if($hospital->services == 'covidTest' || $hospital->services == 'both')
                          <option value="{{$hospital->id}}">{{ $hospital->name }}</option>
                           @endif
                        @endforeach
                      </select>
                      @error('hospital_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Test Type -->
                    <div class="col-md-6">
                      <label class="form-label fw-semibold">Test Type</label>
                      <select name="test_type" class="form-select" required>
                        <option value="" selected disabled>Choose test type</option>
                        <option value="PCR">PCR</option>
                        <option value="Antigen">Antigen</option>
                      </select>
                      @error('test_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Date -->
                    <div class="col-md-4">
                      <label class="form-label fw-semibold">Preferred Date</label>
                      <input type="date" name="preferred_date" class="form-control" required>
                      @error('preferred_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Time Slot -->
                    <div class="col-md-4">
                      <label class="form-label fw-semibold">Preferred Time Slot</label>
                      <select name="time_slot" class="form-select" required>
                        <option value="" selected disabled>Select slot</option>
                        <option value="09:00-09:30">09:00 AM - 09:30 AM</option>
                        <option value="10:00-10:30">10:00 AM - 10:30 AM</option>
                        <option value="11:00-11:30">11:00 AM - 11:30 AM</option>
                        <option value="12:00-12:30">12:00 PM - 12:30 PM</option>
                      </select>
                      @error('time_slot') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Sample -->
                    <div class="col-md-4">
                      <label class="form-label fw-semibold">Sample Type</label>
                      <select name="sample_type" class="form-select" required>
                        <option value="" selected disabled>Choose sample</option>
                        <option value="Nasal Swab">Nasal Swab</option>
                        <option value="Throat Swab">Throat Swab</option>
                        <option value="Saliva">Saliva</option>
                      </select>
                      @error('sample_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Symptoms -->
                    <div class="col-md-12">
                      <label class="form-label fw-semibold">Symptoms (optional)</label>
                      <input type="text" name="symptoms" class="form-control"
                             placeholder="e.g. fever, cough, sore throat">
                      @error('symptoms') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Notes -->
                    <div class="col-md-12">
                      <label class="form-label fw-semibold">Notes (optional)</label>
                      <textarea name="notes" class="form-control" rows="3"
                                placeholder="Any extra information for hospital..."></textarea>
                      @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-12">
                      <div class="alert alert-warning rounded-4 mb-0">
                        <b>Status:</b> Your test request will be <b>Pending</b> until the hospital approves it.
                      </div>
                    </div>

                    <div class="col-12 d-grid d-sm-flex gap-2 justify-content-end mt-2">
                      <button class="btn btn-cc btn-cc-outline px-5" type="reset">Clear</button>
                      <button class="btn btn-cc btn-cc-primary px-5" type="submit">Submit Test Request</button>
                    </div>

                  </div>
                </form>
              </div>
            </div>

            <!-- Right Side Info -->
            <div class="col-lg-4">
              <div class="cc-card p-4 h-100">
                <h6 class="fw-bold mb-2">What happens next?</h6>
                <ul class="mb-0">
                  <li class="mb-2">Hospital receives your request</li>
                  <li class="mb-2">Hospital approves / rejects</li>
                  <li class="mb-2">After test, hospital updates result</li>
                  <li>You can download report from “Results”</li>
                </ul>
              </div>
            </div>

          </div>
        
        </div>


       

        <!-- 4) My Appointments -->
        <div class="tab-pane fade" id="tab-appointments" role="tabpanel">
          <div class="card p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2">
              <div>
                <h5 class="fw-bold mb-0">My Appointments</h5>
                <div class="muted">Track status and details.</div>
              </div>
              <a class="btn btn-primary" data-bs-toggle="pill" href="#tab-book">New Booking</a>
            </div>

            <div class="table-responsive mt-3">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Hospital</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($test_bookings as $booking)
                    <tr>
                    <td>{{ $booking->hospital->name }}</td>
                    <td>COVID Test</td>
                    <td>{{ $booking->preferred_date }}</td>
                    <td>{{ $booking->time_slot }}</td>
                     @if($booking->status == 'approved')
                    <td><span class="badge bg-success">{{ $booking->status }}</span></td>
                    <td class="text-end">
                      <a href="{{route('testBookingCancel',$booking->id)}}"><button class="btn btn-sm btn-outline-danger">Cancel</button></td></a>

                    @elseif($booking->status == 'pending')
                    <td><span class="badge bg-warning text-dark">{{ $booking->status }}</span></td>
                    <td class="text-end">
                    <a href="{{route('testBookingCancel',$booking->id)}}"><button class="btn btn-sm btn-outline-danger">Cancel</button></td></a>


                    @elseif($booking->status == 'rejected')
                     <td><span class="badge bg-danger">{{ $booking->status }}</span></td>
                     <td class="text-end">
                      <a href="{{route('rebookTestBooking',$booking->id)}}"><button class="btn btn-sm btn-outline-secondary">Rebook</button></td></a>
                    @elseif($booking->status == 'completed')
                    <td>
                       <span class="badge bg-secondary">completed</span>
                    </td>
                    <td class="text-end">
                         <a class="btn btn-sm btn-outline-primary"
                         href="{{route('viewResult',$booking->id)}}">
                         View Result
                        </a>
                     </td>

                    @endif
                  </tr>
                  @endforeach
                  
                   @foreach($vaccination_bookings as $booking)
                    <tr>
                    <td>{{ $booking->hospital->name }}</td>
                    <td>Vaccination</td>
                    <td>{{ $booking->preferred_date }}</td>
                    <td>{{ $booking->time_slot }}</td>
                    @if($booking->status == 'approved')
                    <td><span class="badge bg-success">{{ $booking->status }}</span></td>
                    <td class="text-end">
                  <a href="{{route('vaccBookingCancel',$booking->id)}}"><button class="btn btn-sm btn-outline-danger">Cancel</button></td></a>
                    @elseif($booking->status == 'pending')
                    <td><span class="badge bg-warning text-dark">{{ $booking->status }}</span></td>
                    <td class="text-end">
                  <a href="{{route('vaccBookingCancel',$booking->id)}}"><button class="btn btn-sm btn-outline-danger">Cancel</button></td></a>
                  @elseif($booking->status == 'rejected')
                  <td><span class="badge bg-danger">{{ $booking->status }}</span></td>
                  <td class="text-end">
                      <a href="{{route('rebookVaccBooking',$booking->id)}}"><button class="btn btn-sm btn-outline-secondary">Rebook</button></td></a>
                    @endif
                    

                  </tr>
                  @endforeach
          
                </tbody>
              </table>
            </div>

          </div>
        </div>

        <!-- 5) Results -->
                 

        <!-- <div class="tab-pane fade show active" id="tab-results" role="tabpanel"> -->
             <div class="tab-pane fade " id="tab-results" role="tabpanel">
  <div class="row g-4">

    {{-- =========================
         COVID TEST RESULTS
    ========================== --}}
    <div class="col-lg-6">
      <div class="card p-4 h-100 cc-card">

        <div class="d-flex justify-content-between align-items-start mb-2">
          <div>
            <h5 class="fw-bold mb-1">COVID Test Result</h5>
            <small class="text-muted">Latest test report</small>
          </div>

          @if($latestTest)
            <span class="badge 
              {{ $latestTest->result === 'negative' ? 'bg-success' : 'bg-danger' }}
              fs-6 px-3 py-2">
              {{ ucfirst($latestTest->result) }}
            </span>
          @endif
        </div>

        @if($latestTest)
          {{-- Meta pills --}}
          <div class="d-flex flex-wrap gap-2 my-3">
            <span class="pill">📅 {{ \Carbon\Carbon::parse($latestTest->report_date)->format('d-M-Y') }}</span>
            <span class="pill">🏥 {{ $latestTest->hospital->name }}</span>
            <span class="pill">🧪 {{ $latestTest->test_type }}</span>
          </div>

          {{-- Doctor Notes --}}
          <div class="alert alert-info mb-4">
            {{ $latestTest->doctor_notes ?? 'If symptoms continue, consult a doctor and follow safety precautions.' }}
          </div>

          {{-- Actions --}}
          <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('patient.test.report', $latestTest->id) }}"
               class="btn btn-outline-primary btn-sm">
              Download PDF
            </a>

            <a href="{{ route('viewResult', $latestTest->id) }}"
               class="btn btn-primary btn-sm">
              View Full Report
            </a>
          </div>

          <hr class="my-4">

          {{-- Previous Reports --}}
          <h6 class="fw-semibold mb-2">Previous Test Reports</h6>

          <div class="table-responsive">
            <table class="table table-sm align-middle">
              <thead class="table-light">
                <tr>
                  <th>Test ID</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @forelse($previousTests as $test)
                  <tr>
                    <td>T-{{ $test->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($test->report_date)->format('d-M-Y') }}</td>
                    <td>
                      <span class="badge 
                        {{ $test->result === 'negative' ? 'bg-success' : 'bg-danger' }}">
                        {{ ucfirst($test->result) }}
                      </span>
                    </td>
                    <td>
                      <a href="{{ route('viewResult', $test->id) }}"
                         class="fw-semibold text-decoration-none">
                        View
                      </a>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" class="text-center text-muted">
                      No previous test reports found
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        @else
          <div class="alert alert-warning mt-3">
            No COVID test results available yet.
          </div>
        @endif

      </div>
    </div>

    {{-- =========================
         VACCINATION STATUS
    ========================== --}}
    <div class="col-lg-6">
      <div class="card p-4 h-100 cc-card">

        <h5 class="fw-bold mb-1">Vaccination Status</h5>
        <small class="text-muted d-block mb-3">
          Dose history and recommendations
        </small>

        <div class="table-responsive">
          <table class="table table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th>Dose</th>
                <th>Vaccine</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @forelse($vaccinations as $vax)
                <tr>
                  <td>{{ ucfirst($vax->dose_no) }}</td>
                  <td>{{ $vax->vaccine_type }}</td>
                  <td>
                    {{ $vax->status === 'completed'
                      ? \Carbon\Carbon::parse($vax->preferred_date)->format('d-M-Y')
                      : '—' }}
                  </td>
                  <td>
                    <span class="badge 
                      {{ $vax->status === 'completed' ? 'bg-success' : 'bg-secondary' }}">
                      {{ ucfirst($vax->status) }}
                    </span>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center text-muted">
                    No vaccination records found
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        {{-- Vaccination Recommendation --}}
        @php
          $completedDoses = $vaccinations->where('status','completed')->count();
        @endphp

        @if($completedDoses === 1)
          <div class="alert alert-warning mt-3">
            Next dose is recommended after 30 days of Dose 1.
            Please book an appointment to complete vaccination.
          </div>
        @endif
<!-- 
        <div class="d-flex justify-content-end mt-2">
          <a class="btn btn-success btn-sm"
             data-bs-toggle="pill"
             href="">
            Book Next Dose
          </a>
        </div> -->

      </div>
    </div>

  </div>
</div>


        <!-- 6) Profile -->
        <div class="tab-pane fade" id="tab-profile" role="tabpanel">
          <div class="card p-4">
            <h5 class="fw-bold mb-1">My Profile</h5>
            <div class="muted mb-3">Update your details.</div>
            @if(session('success'))
  <div class="alert alert-success mb-3">
    {{ session('success') }}
  </div>
@endif
            <form class="row g-3" action="{{route('updatePatientProfile')}}" method="post">
              @csrf
              <div class="col-md-6">
                <label class="form-label fw-semibold">Full Name</label>
                <input class="form-control" name="name" value="{{$user->name}}">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Email</label>
                <input class="form-control" name="email" value="{{$user->email}}">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Mobile</label>
                <input class="form-control" name="phone" value="{{$user->phone}}">
              </div>
              <div class="col-md-6">
                <label class="form-label fw-semibold">Age</label>
                <input class="form-control" name="age" value="{{$user->age}}">
              </div>
              <div class="col-6">
                <label class="form-label fw-semibold">Address</label>
                <input class="form-control" name="address" value="{{$user->address}}">
              </div>

              <div class="col-12 d-flex gap-2 justify-content-end">
                <a href="{{route('patientProfile')}}"><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
                <button type="submit" class="btn btn-success">Save Changes</button>
              </div>

              <div class="col-12 mt-2">
                <div class="alert alert-danger mb-0">
                  <b>Danger Zone:</b> Deleting your account removes your history.
                  <div class="mt-2">
                    <a href="{{route('PatdeleteAccount',$user->id)}}"><button type="button" class="btn btn-danger">Delete Account</button></a>
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
            `[href="${window.location.hash}"]`
        );

        if (tabTrigger) {
            new bootstrap.Tab(tabTrigger).show();
        }
    }
});


</script>

</body>
</html>
@endsection