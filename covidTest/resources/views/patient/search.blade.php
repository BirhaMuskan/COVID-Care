          @extends('patient.navbar')
          @section('content')
          
          <!-- 2) Search Hospital (STATIC) -->

  <div class="card p-4 mb-3" >
    <div class="mb-2" style="margin-left:1100px;">
    <a href="{{ route('patientDashboard') }}"
       class="btn btn-outline-primary btn-sm">
      ← Back to your Dashboard
    </a>
  </div>
    <h5 class="fw-bold mb-1">Search Hospitals</h5>
    <div class="muted mb-3">Filter by hospital name, city and service type.</div>

    <!-- <div class="row g-2"> -->

    <form action="{{route('search')}}" method='post' class="row g-2">
      @csrf
            <!-- Hospital Name -->
      <div class="col-md-7">
       <input type="text" name="name" class="form-control"
             placeholder="Hospital name"
             value="">

      </div>

    

      <!-- Service -->
      <div class="col-md-3">
        <select id="serviceFilter" class="form-select">
          <option value="all">Both (Test + Vaccination)</option>
          <option value="covidTest">COVID Test</option>
          <option value="vaccination">Vaccination</option>
        </select>
      </div>

      <!-- Search Button -->
      <div class="col-md-2">
        <button class="btn btn-primary w-100" type=submit>
          Search
        </button>
      </div>

    </form>

    <!-- </div> -->
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
                  <td class="fw-semibold">{{$hospital->name}}</td>
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



    
@endsection