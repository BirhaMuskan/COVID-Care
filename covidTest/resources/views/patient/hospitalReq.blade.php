<!-- @extends('home.navbar');

@section('content') -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>COVIDCare — Hospital Request</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- SAME GLOBAL CSS -->
  <link rel="stylesheet" href="{{ asset('home/assets/css/home.css') }}">
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg fixed-top cc-navbar">
  <div class="container">
    <a class="navbar-brand cc-brand" href="#">
      <div class="cc-brand-badge"></div>
      <div class="cc-brand-text">
        <span>COVID</span><span>Care</span>
      </div>
    </a>

    <div class="ms-auto d-flex gap-2">
      <a href="{{route('patientDashboard')}}"><span class="btn btn-sm btn-cc-outline">Patient</span></a>
      <a href="{{ url('/') }}" class="btn btn-sm btn-cc-outline">Home</a>
      <a href="{{route('logout')}}" class="btn btn-sm btn-cc-primary">Logout</a>
    </div>
  </div>
</nav>
<!-- ================= CONTENT ================= -->
<section class="cc-auth-wrap">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">

        <!-- TITLE -->
        <div class="mb-4">
          <h2 class="cc-section-title">Hospital Request</h2>
          <p class="cc-subtitle">
            Review hospital details and choose a service.
          </p>
        </div>

        <!-- ================= BIG IMAGE ================= -->
        <div class="cc-card mb-4 overflow-hidden">
          <img
            src="{{ asset('storage/hospitalImages/'.$hospital->image) }}"
            alt="Panda Care Hospital"
            style="width:100%; height:420px; object-fit:cover;"
          >
        </div>

        <!-- ================= HOSPITAL INFO ================= -->
        <div class="cc-card p-4 mb-4">
          <div class="row align-items-center">
            <div class="col-md-8">
              <h4 class="fw-bold mb-1">{{$hospital->name}}</h4>
              <p class="cc-subtitle mb-2">
                <strong>City:</strong> {{$hospital->city}}
              </p>
           
              <div class="d-flex gap-2 flex-wrap">
                @if($hospital->services == 'both')
                <a href="{{route('testForm',$hospital->id)}}"><span class="badge rounded-pill bg-primary">COVID Test</span></a>
                <a href="{{route('vaccForm',$hospital->id)}}"><span class="badge rounded-pill bg-success">Vaccination</span></a>
                @elseif($hospital->services == 'covidTest')
                <a href="{{route('testForm',$hospital->id)}}"><span class="badge rounded-pill bg-primary">COVID Test</span></a>
                @elseif($hospital->services == 'vaccination')
                <a href="{{route('vaccForm',$hospital->id)}}"><span class="badge rounded-pill bg-success">Vaccination</span></a>
                @endif
              </div>
              
            </div>

            <div class="col-md-4 text-md-end mt-3 mt-md-0">
              <span class="badge rounded-pill bg-success px-3 py-2">
                Available
              </span>
            </div>
          </div>
        </div>

        <!-- ================= ACTIONS ================= -->
        <div class="cc-card p-4">
          <h5 class="fw-bold mb-3">Choose Service</h5>
          <p class="cc-subtitle mb-4">
            Select the service you want to request.
          </p>

          <div class="row g-3">
            @if($hospital->services == 'both')
            <div class="col-md-6">
              <a href="{{route('testForm',$hospital->id)}}"
                 class="btn btn-cc btn-cc-primary w-100 py-3">
                Request COVID Test
              </a>
            </div>

            <div class="col-md-6">
              <a href="{{route('vaccForm',$hospital->id)}}"
                 class="btn btn-cc btn-cc-success w-100 py-3">
                Request Vaccination
              </a>
            </div>
          
          @elseif($hospital->services == 'covidTest')
          <div class="col-md-6">
              <a href="{{route('testForm',$hospital->id)}}"
                 class="btn btn-cc btn-cc-primary w-100 py-3">
                Request COVID Test
              </a>
            </div>
          @elseif($hospital->services == 'vaccination')
          div class="col-md-6">
              <a href="{{route('vaccForm',$hospital->id)}}"
                 class="btn btn-cc btn-cc-success w-100 py-3">
                Request Vaccination
              </a>
            </div>
            @endif
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

</body>
</html>

<!-- @endsection -->