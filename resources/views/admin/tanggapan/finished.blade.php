@extends('layouts.petugas')

@section('main')
<main class="container">
  <hgroup style="margin-bottom: 1rem">
    <h3>Aduan telah ditanggapi</h3>
    <h4>Total : {{ $aduan->count() }}</h4>
  </hgroup>
  @foreach($aduan as $aduan)
  <article style="margin: 1rem 0;padding:1rem">
    <a href="{{route('aduan-selesai-detail', ['id' => $aduan->id_pengaduan])}}">
      <div class="grid">
        <div>
          <small style="font-size: 14px">{{ $aduan->tgl_pengaduan }}</small>
          <div>
            <h6 style="margin-bottom:0rem">{{ $aduan->judul }}</h6>
          </div>
        </div>
      </div>
    </a>
  </article>
  @endforeach
</main>
@endsection