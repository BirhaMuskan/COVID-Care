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
      <a href="{{route('adminDashboard')}}" style="text-decoration:none;"><span class="pill d-none d-md-inline">Admin</span></a>
      <a class="btn btn-outline-secondary btn-sm" href="{{ url('/') }}">Home</a>
      <a class="btn btn-dark btn-sm" href="{{route('logout')}}">Logout</a>
    </div>
  </div>
</nav>
@yield('content')