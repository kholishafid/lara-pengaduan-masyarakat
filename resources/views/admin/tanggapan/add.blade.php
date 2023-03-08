@extends('layouts.petugas-sub')

@section('main')
<main class="container" style="padding: 0">
  <a href="{{ route('butuh-tanggapan') }}" style="margin-bottom: 1rem;display:inline-block"><small> &leftarrow;
      Back</small></a>
  <h3>Tanggapi Aduan</h3>
  <div style="display: flex;">
    @if($aduan->foto)
    <img src="{{ asset($aduan->foto) }}" alt="{{$aduan->judul}}image"
      style="max-width: 400px;height: 100%;margin-right:var(--spacing);margin-bottom: var(--spacing)">
    @endif
    <ul style="flex: 1;margin:0;padding:0">
      <li style="list-style: none">
        <h6 style="width: 200px;display: inline-block;margin:0">Judul Aduan</h6> :
        {{$aduan->judul}}
      </li>
      <li style="list-style: none">
        <h6 style="width: 200px;display: inline-block;margin:0">Nama Pengadu</h6> :
        {{$aduan->nama}}
      </li>
      <li style="list-style: none">
        <h6 style="width: 200px;display: inline-block;margin:0">Tanggal Laporan </h6> :
        {{$aduan->tgl_pengaduan}}
      </li>
    </ul>
  </div>
  <div style="margin-bottom:1rem">
    <h5 style="width: 200px;display: inline-block;margin-bottom:0.75rem">Isi Laporan </h5>
    <textarea name="isi_laporan" style="width: 100%;resize: none;margin:0" readonly>{{ $aduan->isi_laporan }}</textarea>
  </div>
  <div>
    <h5 style="margin-bottom:1rem ">Tanggapi</h5>
    <form action="{{ route('tanggapi',['id' => $aduan->id_pengaduan]) }}" method="POST">
      @csrf
      <textarea name="tanggapan" id="tanggapan" cols="30" rows="6" @error('tanggapan') aria-invalid="true"
        @enderror>{{ old('tanggapan') }}</textarea>
      @error('tanggapan')
      <small style="color: tomato">{{ $message }}</small>
      @enderror
      <button>Tanggapi</button>
    </form>
  </div>
</main>
@endsection