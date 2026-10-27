<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CV Generator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root{--biru:#1a7fb5;--biru-tua:#0f5c85;--biru-muda:#e8f4fa}
    body{background:var(--biru-muda);font-family:'Segoe UI',Arial,sans-serif}
    .navbar-cv{background:linear-gradient(90deg,var(--biru-tua),var(--biru))}
    .hero{background:linear-gradient(90deg,var(--biru-tua),var(--biru));color:#fff;border-radius:14px;padding:24px 28px;margin-bottom:24px}
    .card{border:0;border-radius:14px;box-shadow:0 4px 14px rgba(26,127,181,.15)}
    .btn-primary{background:var(--biru);border-color:var(--biru)}
    .btn-primary:hover{background:var(--biru-tua);border-color:var(--biru-tua)}
    .table thead{background:var(--biru);color:#fff}
    .table thead th{background:var(--biru);color:#fff;border:0}
    .table tbody tr:hover{background:var(--biru-muda)}
    .foto-tabel{width:64px;height:64px;object-fit:cover;border-radius:50%;border:3px solid var(--biru)}
    .form-control:focus,.form-select:focus{border-color:var(--biru);box-shadow:0 0 0 .2rem rgba(26,127,181,.2)}
    .badge-jenis{background:var(--biru);color:#fff;border-radius:20px;padding:4px 12px;font-size:12px}
    .btn-outline-primary{--bs-btn-color:#1a7fb5;--bs-btn-border-color:#1a7fb5;--bs-btn-hover-bg:#1a7fb5;--bs-btn-hover-border-color:#1a7fb5;--bs-btn-active-bg:#1a7fb5;--bs-btn-active-border-color:#1a7fb5}
  </style>
</head>
<body>
<nav class="navbar navbar-cv mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold text-white" href="{{ route('biodata.index') }}">
      <i class="bi bi-file-person-fill me-2"></i>CV Generator
    </a>
    <a class="text-white text-decoration-none" href="{{ route('aktivitas.index') }}">
      <i class="bi bi-clock-history me-1"></i>Riwayat
    </a>
  </div>
</nav>
<div class="container pb-5">
  @if(session('success'))
    <div class="alert alert-success shadow-sm"><i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}</div>
  @endif
  @if($errors->any())
    <div class="alert alert-danger shadow-sm"><i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $errors->first() }}</div>
  @endif
  @yield('content')
</div>
</body>
</html>
