@extends('layouts.sub')

@section('main')
<main class="container" style="padding: 1rem 0">
  <a href="{{ route('masyarakat_home') }}" style="margin-bottom: 1rem;display:inline-block"><small> &leftarrow;
      Back</small></a>
  <h2 style="margin-bottom: 1rem">Tulis Aduan 📝</h2>
  <form action="/new-pengaduan" enctype="multipart/form-data" method="POST">
    @csrf
    <label for="judul">
      Judul Laporan
      <input type="text" id="judul" name="judul">
    </label>
    <label for="isi_laporan">
      Isi Aduan
      <textarea name="isi_laporan" id="isi_laporan" style="resize: vertical" rows="5" @error('isi_laporan')
        aria-invalid="true" @enderror>{{ old('isi_laporan')}}</textarea>
      @error('isi_laporan')
      <small style="color: red">{{$message}}</small>
      @enderror
    </label>
    <label for="foto">
      Foto
      <input type="file" name="foto" id="foto">
      <small>Optional * </small>
    </label>
    <button style="max-width: 400px;display: block;">Submit</button>
  </form>
</main>
@endsection