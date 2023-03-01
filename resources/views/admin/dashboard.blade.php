@extends('admin.layouts.admin_app')

@section('main')
<main>
  @auth
  <div class="py-4">
    <h2>Selamat Datang <span class="fw-bold">{{ $petugas->nama_petugas }}</span></h2>
  </div>
  @endauth
</main>
@endsection