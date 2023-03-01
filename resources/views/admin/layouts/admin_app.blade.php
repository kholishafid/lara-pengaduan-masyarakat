<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

@php
$url = url()->current();
$explodedUrl = explode('/',$url);
@endphp

<body>
  <div class="d-flex flex-column" style="height: 100vh">
    <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm">
      <div class="container-fluid px-4">
        <a class="navbar-brand" href="/admin/home">Pengaduan Maysarakat</a>
        <a href="/logout" class="btn btn-danger">Logout</a>
      </div>
    </nav>
    <div class="d-flex flex-grow-1" style="height: 100vh;overflow: hidden;">
      <aside class="p-4 d-flex gap-2 flex-column" style="width: 230px">
        @if (auth()->user()->level == 'admin')
        <a class="btn text-start @if( in_array('petugas',$explodedUrl) ) btn-primary @endif"
          href="/admin/petugas">Petugas</a>
        <a class="btn text-start @if( in_array('masyarakat',$explodedUrl) ) btn-primary @endif"
          href="/admin/masyarakat">Akun
          Masyarakat</a>
        @endif
        <a class="btn text-start @if( in_array('verif_aduan',$explodedUrl) ) btn-primary @endif"
          href="/admin/verif_aduan">Verif
          Aduan</a>
        <a class="btn text-start @if( in_array('butuh_tanggapan',$explodedUrl) ) btn-primary @endif"
          href="/admin/aduan/butuh_tanggapan">Beri Tanggapan</a>
      </aside>
      <div class="bg-body-secondary p-4" style="flex: 1;overflow-y: auto;">
        @yield('main')
      </div>
    </div>
  </div>
  <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    const myModal = new bootstrap.Modal(document.getElementById('modalId'))
  </script>
</body>

</html>