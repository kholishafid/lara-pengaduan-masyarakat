@extends('layouts.app')

@section('main')
<main class="container py-4">
  <div class="mb-4">
    <a href="{{ URL::previous()}}" class="badge bg-primary btn text-white">&leftarrow; Back</a>
  </div>
  <div class="mb-4">
    <h2>Edit Aduan</h2>
  </div>
  <form action="/edit_aduan/{{ $dataPengaduan->id_pengaduan }}" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="mb-3">
      <label for="isi_laporan" class="form-label">Isi Aduan</label>
      <textarea class="form-control" name="isi_laporan" id="isi_laporan" rows="5"
        spellcheck="false">{{ $dataPengaduan->isi_laporan }}</textarea>
      <small id="helpIdLaporan" class="text-muted">Ketik apa yang ingin anda adukan. </small>
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Pilih Foto</label>
      <input type="file" class="form-control" name="foto" id="foto" placeholder="pilih foto"
        aria-describedby="fileHelpIdFoto">
      <div id="fileHelpIdFoto" class="form-text">Ganti foto aduan , <span class="text-danger">foto
          sebelumnya dihapus</span>
      </div>
      <div id="fileHelpIdFoto" class="form-text">Abaikan jika tidak ingin mengganti foto aduan.</span>
      </div>
    </div>
    <div>
      <button class="btn btn-primary">Submit</button>
    </div>

  </form>
</main>
@endsection