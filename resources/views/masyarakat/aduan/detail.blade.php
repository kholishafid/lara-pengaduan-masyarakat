@extends('layouts.sub')

@section('main')
<main class="container" style="padding: 2rem 0">
  <a href="{{ route('masyarakat_home') }}" style="margin-bottom: 1rem;display:inline-block"><small> &leftarrow;
      Back</small></a>
  <h3>Detail Laporan</h3>
  <div style="display: flex;">
    @if($aduan->foto)
    <img src="{{ asset($aduan->foto) }}" alt="{{$aduan->judul}}image"
      style="max-width: 400px;height: 100%;margin-right:var(--spacing);margin-bottom: var(--spacing);border:1px solid var(--form-element-border-color);border-radius:8px;">
    @endif
    <ul style="flex: 1;margin:0;padding:0">
      <li style="list-style: none">
        <h6 style="width: 200px;display: inline-block;margin:0">Judul Aduan</h6> :
        {{$aduan->judul}}
      </li>
      <li style="list-style: none">
        <h6 style="width: 200px;display: inline-block;margin:0">Tanggal Laporan </h6> :
        {{$aduan->tgl_pengaduan}}
      </li>
      <li style="list-style: none">
        <div class="status">
          <h6 style="width: 200px;display: inline-block;margin:0">Status </h6> :
          @if($aduan->status == 'ditolak')
          <mark style="background-color: grey;">ditolak</mark>
          @elseif($aduan->status == 'dibatalkan')
          <mark style="background-color: gray;">dibatalkan</mark>
          @elseif($aduan->status == '0')
          <mark style="background-color: rgb(228, 228, 89);color:black;">pending</mark>
          @elseif($aduan->status == 'proses')
          <span style="background-color: skyblue;color:black;">diproses</span>
          @else
          <span style="background-color: rgb(142, 199, 57);color:black;">selesai</span>
          @endif
        </div>
      </li>
      <li style="list-style: none">
        <h6 style="width: 200px;display: inline-block;margin-bottom:0.75rem">Isi Laporan </h6>
        <textarea name="isi_laporan" style="width: 100%;resize: none;margin:0"
          readonly>{{ $aduan->isi_laporan }}</textarea>
      </li>
    </ul>
  </div>
  <div>
    <h6 style="width: 200px;display: inline-block;margin-bottom:0.75rem">Tanggapan</h6>
    @if ($tanggapan)
    <textarea name="isi_laporan" style="width: 100%;resize: none" rows="10"
      readonly>{{ $tanggapan->tanggapan }}</textarea>
    Ditanggapi pada : {{$tanggapan->tgl_tanggapan}} oleh <mark>{{ $tanggapan->username}}</mark>
    @else
    <textarea name="isi_laporan" style="width: 100%;resize: none" readonly>Belum ada tanggapan</textarea>
    @endif
  </div>
</main>
@endsection