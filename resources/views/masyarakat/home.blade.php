@extends('layouts.default')

@section('main')
<main class="container">
  @auth
  <hgroup>
    <h1>👋 Selamat Datang <mark>{{ $user->nama }}.</mark></h1>
    <h6>Apa yang akan kamu lakukan hari ini ? 🤔</h6>
  </hgroup>
  @endauth
  <div class="grid" style="max-width: 500px;margin-bottom:var(--block-spacing-vertical)">
    <a role="button" href="\new-pengaduan">Buat Aduan Baru</a>
    <a role="button" href="\aduan">Lihat Seluruh Aduan</a>
  </div>
  <div>
    <h4>Aduan Terbaru</h4>
    @if ($aduan_terbaru->count())
    @foreach($aduan_terbaru as $aduan)
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
            <mark style="background-color: rgb(228, 228, 89);font-size:14px;">pending</mark>
            @elseif($aduan->status == 'proses')
            <mark style="background-color: skyblue;font-size:14px;">diproses</mark>
            @else
            <mark style="background-color: rgb(142, 199, 57);font-size:14px;">selesai</mark>
            @endif
          </div>
    </article>
    </a>
    @endforeach
    @else
    <p>Anda belum membuat pengaduan.</p>
    @endif
  </div>
  </div>
</main>
@endsection