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
    .side-link:hover,.side-link.active{background:rgba(28,106,228,.10);color:#1c6ae4;}
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

<!-- Simple Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">COVIDCare</a>
    <div class="d-flex align-items-center gap-2">
      <span class="pill d-none d-md-inline">Patient</span>
      <a class="btn btn-outline-primary btn-sm" href="{{ url('/') }}">Home</a>
      <a class="btn btn-primary btn-sm" href="{{route('logout')}}">Logout</a>
    </div>
  </div>
</nav>

<div class="container dash-wrap">
  <div class="row g-4">




  @yield('content')




        
