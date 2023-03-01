@extends('admin.layouts.admin_app')

@section('main')
<main>
  <div class="mb-4">
    <a href="/admin/masyarakat" class="badge bg-primary">&leftarrow; Kembali</a>
  </div>
  <h4 class="mb-4">Buat akun masyarakat.</h4>
  <form action="/admin/add_masyarakat" method="POST">
    @csrf

    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
        placeholder="nama asli" value="{{ old('nama') }}">
      <div id=" namaHelp" class="form-text text-muted ">
        <small>Masukkan nama asli yang bersangkutan.</small>
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
          placeholder="nik" value="{{ old('nik') }}">
        <div id=" namaHelp" class="form-text text-muted ">
          <small>Masukkan NIK yang bersangkutan.</small>
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
          placeholder="no-telp" value="{{ old('telp') }}">
        <div id=" namaHelp" class="form-text text-muted ">
          <small>Masukkan no telp yang bersangkutan.</small>
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
          aria-describedby="usernameHelp" placeholder="username" value="{{ old('username') }}">
        <div class="form-text text-muted">
          <small>
            Masukkan username , untuk masyarakat login.
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
          id="password" aria-describedby="passwordHelp" placeholder="password" value="{{ old('password') }}">
        <div class="form-text text-muted">
          <small>
            Masukkan password , untuk masyarakat login.
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
      <button type="submit" class="btn btn-primary">Buat</button>
    </div>
  </form>
</main>
@endsection