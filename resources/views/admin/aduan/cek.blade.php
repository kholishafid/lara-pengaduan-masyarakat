@inject('carbon', 'Carbon\Carbon')

@extends('admin.layouts.admin_app')

@section('main')
<main class="container">
  <div class="mb-4 d-flex justify-content-between align-items-center">
    <a href="{{ URL()->previous() }}" class="badge bg-primary btn text-white">&leftarrow; Back</a>
    <div class="d-flex align-items-center gap-2">
      <span>Verif : </span>
      <a href="/admin/aduan_approve/{{ $dataPengaduan->id_pengaduan }}" class="btn btn-success" data-bs-toggle="tooltip"
        data-bs-title="approve">&check;</a>
      <a href="/admin/aduan_reject/{{ $dataPengaduan->id_pengaduan }}" class="btn btn-danger" data-bs-toggle="tooltip"
        data-bs-title="reject">&cross;</a>
    </div>
  </div>
  <div class="my-4 d-flex">
    @if ($dataPengaduan->foto)
    <img src="{{ asset($dataPengaduan->foto) }}" alt="foto-laporan" class="me-3" style="max-width: 400px;height:100%"
      draggable="false">
    @endif
    <div class="d-flex flex-column flex-grow-1">
      <p><span class="d-inline-block" style="width: 130px">Pelapor</span> : {{ $pelapor->nama }}</p>
      <p><span class="d-inline-block" style="width: 130px">Tanggal Aduan </span> : {{
        $carbon::parse($dataPengaduan->tgl_pengaduan)->format('d M
        Y') }}</p>
      <p><span class="d-inline-block" style="width: 130px">Isi Laporan </span> : </p>
      <div class="border px-3 py-2 rounded bg-light" style="width: 100%">{{$dataPengaduan->isi_laporan}}</div>
    </div>
  </div>
</main>

<!-- Optional: Place to the bottom of scripts -->
<script>
  const myModal = new bootstrap.Modal(document.getElementById('modalId'))
</script>
@endsection