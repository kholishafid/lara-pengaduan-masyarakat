@extends('admin.layouts.admin_app')

@section('main')
<main>
  <div class="mb-4">
    <a href="/admin/masyarakat" class="badge bg-primary">&leftarrow; Kembali</a>
  </div>
  <div class="mb-2">
    <h4>Edit akun masyarakat.</h4>
    <small>Ubah data seperlunya, abaikan yang tidak perlu.</small>
  </div>
  <form action="/admin/edit_masyarakat/{{ $data_masyarakat->id }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
        placeholder="nama asli" value="{{ $data_masyarakat['nama'] }}">
      <div id=" namaHelp" class="form-text text-muted ">
        <small>Ubah nama asli yang bersangkutan.</small>
        <small class="text-danger">
          @error('nama')
          {{ $message }}
          @enderror
        </small>
      </div>
    </div>

    <div class="d-flex gap-2">
      <div class="mb-3 w-100">
        <label for="nik" class="form-label">NIK</label>
        <input type="number" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror"
          placeholder="nik" value="{{ $data_masyarakat['nik'] }}">
        <div id=" namaHelp" class="form-text text-muted ">
          <small>Ubah NIK yang bersangkutan.</small>
          <small class="text-danger">
            @error('nik')
            {{ $message }}
            @enderror
          </small>
        </div>
      </div>
      <div class="mb-3 w-100">
        <label for="telp" class="form-label">No Telp</label>
        <input type="number" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror"
          placeholder="no-telp" value="{{ $data_masyarakat['telp'] }}">
        <div id=" namaHelp" class="form-text text-muted ">
          <small>Ubah no telp yang bersangkutan.</small>
          <small class="text-danger">
            @error('telp')
            {{ $message }}
            @enderror
          </small>
        </div>
      </div>
    </div>

    <div class="d-flex gap-2">
      <div class="mb-3 w-100">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username"
          aria-describedby="usernameHelp" placeholder="username" value="{{ $data_masyarakat['username'] }}">
        <div class="form-text text-muted">
          <small>
            Ubah username , untuk masyarakat login.
          </small>
          <small class="text-danger">
            @error('username')
            {{ $message }}
            @enderror
          </small>
        </div>
      </div>
      <div class="mb-3 w-100">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
          id="password" aria-describedby="passwordHelp" placeholder="password">
        <div class=" form-text text-muted">
          <small>
            Ubah password lama, atau abaikan.
          </small>
          <small class="text-danger">
            @error('password')
            {{ $message }}
            @enderror
          </small>
        </div>
      </div>
    </div>

    <div>
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </div>
  </form>
</main>
@endsection