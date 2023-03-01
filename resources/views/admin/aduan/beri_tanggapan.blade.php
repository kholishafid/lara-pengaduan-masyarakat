@inject('carbon', 'Carbon\Carbon')

@extends('admin.layouts.admin_app')

@section('main')
<main class="container">
  <div class="mb-4 d-flex justify-content-between align-items-center">
    <a href="{{ '/admin/aduan/butuh_tanggapan' }}" class="badge bg-primary btn text-white">&leftarrow; Back</a>
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
  <div>
    <form action="/admin/aduan/beri_tanggapan/{{ $dataPengaduan->id_pengaduan }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="tanggapan" class="form-label">Tanggapi</label>
        <textarea class="form-control" name="tanggapan" id="tanggapan" rows="5" required></textarea>
      </div>
      <div>
        <input type="text" class="form-control" name="id_petugas" hidden value="{{ auth()->user()->id_petugas }}">

        <input type="text" class="form-control" name="id_pengaduan" hidden value="{{ $dataPengaduan->id_pengaduan }}">
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Tanggapi</button>
      </div>
    </form>
  </div>
  <div class="my-2">

    @error('tanggapan')
    <div class="alert alert-danger">
      {{ $message }}
    </div>
    @enderror
    @if ($errors->any())
    <div class="alert alert-danger">
      Something went wrong i can feel it.
    </div>
    @endif
  </div>

</main>

<!-- Optional: Place to the bottom of scripts -->

@endsection