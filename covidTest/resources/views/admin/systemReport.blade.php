@extends('admin.navbar')
@section('content')

 <!-- 4) Reports -->
 
         <section class="py-4" style="margin-top:80px;">
  
         <div class="container">

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

      

       <form action="{{route('generateReport')}}" method="post">
        @csrf
        <div class="row g-3 align-items-end">
         <div class="col-md-3">
          <label class="form-label">Report Type</label>
          <select class="form-select" name="reportType">
            <option selected disabled>Select report</option>
            <option  value="COVID">COVID Test Report</option>
            <option  value="Vaccination">Vaccination Report</option>
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
          <input type="date" name="fromdate" class="form-control">
        </div>

        <div class="col-md-3">
          <label class="form-label">To</label>
          <input type="date" name="todate" class="form-control">
        </div>

        <div class="col-md-12 mt-3">
         <button type="submit" class="btn btn-cc btn-cc-primary">
            Generate Report
          </button>
        </div>
         </div>
       </form>

     
    </div>

    <!-- REPORT SUMMARY -->
     @if(isset($testBooking))
    <div class="row g-4 mb-4">

      <div class="col-md-4">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Total Bookings</h6>
          <h3 class="fw-bold cc-text-blue">{{$totalBookings}}</h3>
        </div>
      </div>

      <div class="col-md-4">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Positive Tests</h6>
          <h3 class="fw-bold cc-text-red">{{$totalPositive}}</h3>
        </div>
      </div>

      <div class="col-md-4">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Negative Tests</h6>
          <h3 class="fw-bold cc-text-green">{{$totalNegative}}</h3>
        </div>
      </div>

    </div>
    @elseif(isset($vaccineBooking))
    <div class="row g-4 mb-4">

      <div class="col-md-4">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Total Bookings</h6>
          <h3 class="fw-bold cc-text-blue">{{$totalBookings}}</h3>
        </div>
      </div>

      <div class="col-md-4">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Dose 1</h6>
          <h3 class="fw-bold cc-text-red">{{$total1}}</h3>
        </div>
      </div>

      <div class="col-md-4">
        <div class="cc-card p-4 text-center">
          <h6 class="cc-subtitle mb-1">Dose 2</h6>
          <h3 class="fw-bold cc-text-green">{{$total2}}</h3>
        </div>
      </div>

    </div>
    @endif
    <!-- REPORT TABLE -->
     
    @if(isset($testBooking))
<div class="cc-card p-4 mb-4">
  <h5 class="fw-bold mb-3">Report Details</h5>

  <div class="table-responsive">
    <table class="table align-middle">
      <thead class="table-light">
        <tr>
          <th>Hospital</th>
          <th>Type</th>
          <th>Total</th>
          <th>Positive</th>
          <th>Negative</th>
        </tr>
      </thead>

      <tbody>
      @forelse($hospitalTestBooking as $hospitalBookings)
        @php
          $hospital = $hospitalBookings->first()->hospital;
          $total = $hospitalBookings->count();
          $positive = $hospitalBookings->where('result','positive')->count();
          $negative = $hospitalBookings->where('result','negative')->count();
        @endphp

        <tr>
          <td>{{ $hospital->name }}</td>
          <td>COVID Test</td>
          <td>{{ $total }}</td>
          <td class="cc-text-red fw-semibold">{{ $positive }}</td>
          <td class="cc-text-green fw-semibold">{{ $negative }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="5" class="text-center text-muted">
            No test records found
          </td>
        </tr>
      @endforelse
      </tbody>
    </table>
  </div>
</div>
@endif
@if(isset($vaccineBooking))
<div class="cc-card p-4 mb-4">
  <h5 class="fw-bold mb-3">Report Details</h5>

  <div class="table-responsive">
    <table class="table align-middle">
      <thead class="table-light">
        <tr>
          <th>Hospital</th>
          <th>Total</th>
          <th>Dose 1</th>
          <th>Dose 2</th>
        </tr>
      </thead>

      <tbody>
      @forelse($hospitalVaccineBooking as $hospitalBookings)
        @php
          $hospital = $hospitalBookings->first()->hospital;
          $total = $hospitalBookings->count();
          $dose1 = $hospitalBookings->where('dose_no','1')->count();
          $dose2 = $hospitalBookings->where('dose_no','2')->count();
        @endphp

        <tr>
          <td>{{ $hospital->name }}</td>
          <td>{{ $total }}</td>
          <td>{{ $dose1 }}</td>
          <td>{{ $dose2 }}</td>
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
</div>
@endif


  </div>
</section>

@endsection