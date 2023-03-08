@extends('layouts.sub')

@section('main')
<main class="container">
  <a href="{{ route('masyarakat_home') }}" style="margin-bottom: 1rem;display:inline-block"><small> &leftarrow;
      Back</small></a>
  <hgroup>
    <h3>Daftar Aduan</h3>
    <h4>Seluruh laporan 📄 yang telah anda tulis.</h4>
  </hgroup>
  @if ($aduan->count())
  @foreach($aduan as $aduan)
  <article style="margin: 1.5rem 0;padding:1rem">
    <a href="/aduan-detail/{{ $aduan->id_pengaduan }}">
      <div class="grid">
        <div>
          <small style="font-size: 14px">{{ $aduan->tgl_pengaduan }}</small>
          <div>
            <h6 style="margin-bottom:0rem">{{ $aduan->judul }}</h6>
          </div>
        </div>
        <div class="status" style="margin-left: auto">
          @if($aduan->status == 'ditolak')
          <mark style="background-color: grey;font-size:14px;">ditolak</mark>
          @elseif($aduan->status == 'dibatalkan')
          <mark style="background-color: gray;font-size:14px;">dibatalkan</mark>
          @elseif($aduan->status == '0')
          <mark style="background-color: rgb(228, 228, 89);color:black;font-size:14px;">pending</mark>
          @elseif($aduan->status == 'proses')
          <mark style="background-color: skyblue;color:black;font-size:14px;">diproses</mark>
          @else
          <mark style="background-color: rgb(142, 199, 57);color:black;font-size:14px;">selesai</mark>
          @endif
        </div>
  </article>
  @endforeach
  @else
  <p>Anda belum membuat pengaduan.</p>
  @endif
</main>
@endsection