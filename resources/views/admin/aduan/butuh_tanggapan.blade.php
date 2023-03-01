@extends('admin.layouts.admin_app')

@section('main')
@if (session('alert'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong>{{session('alert')}}</strong>
</div>
@endif

<main>
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="m-0">Beri Tanggapan.</h4>
    </div>
  </div>
  <div>
    <ol class="list-group list-group-numbered">
      @foreach ($data_pengaduan as $pengaduan)
      <li class="list-group-item py-3 d-flex">
        <div class="ms-2 me-auto">
          <div class="fw-medium mb-1">{{$pengaduan->tgl_pengaduan}} </div>
          <small><span style="width: 100px;display: inline-block;">Pengadu</span> : {{$pengaduan->nama}}</small>
          <div>
            <small class="m-0"><span style="width: 100px;display: inline-block;">Isi Laporan </span> :
              {{$pengaduan->isi_laporan}}</small>
            <p class="m-0">
              <small><a href="/admin/aduan/beri_tanggapan/{{ $pengaduan->id_pengaduan }}">Beri Tanggapan</a></small>
            </p>
          </div>
        </div>
        </a>
        @endforeach
    </ol>
  </div>

  @if (!$data_pengaduan->count())
  <p>Belum ada Aduan terbaru.</p>
  @endif

</main>

@endsection