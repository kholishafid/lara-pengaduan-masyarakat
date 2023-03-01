@extends('admin.layouts.admin_app')

@section('main')
<main>
  <div class="mb-4">
    <a href="/admin/petugas" class="badge bg-primary">&leftarrow; Kembali</a>
  </div>
  <h4 class="mb-4">Tambah Petugas Baru</h4>
  <form action="/admin/add_petugas" method="POST">
    @csrf

    <div class="mb-3">
      <label for="nama_petugas" class="form-label">Nama Petugas</label>
      <input type="text" name="nama_petugas" id="nama_petugas"
        class="form-control @error('nama_petugas') is-invalid @enderror" placeholder="nama asli petugas"
        aria-describedby="namaHelpId" value="{{ old('nama_petugas') }}">
      <div id=" namaHelp" class="form-text text-muted ">
        <small>Masukkan nama asli petugas.</small>
        <small class="text-danger">
          @error('nama_petugas')
          {{ $message }}
          @enderror
        </small>
      </div>
    </div>

    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username"
        aria-describedby="usernameHelp" placeholder="username" value="{{ old('username') }}">
      <div class="form-text text-muted">
        <small>
          Masukkan username , untuk petugas login.
        </small>
        <small class="text-danger">
          @error('username')
          {{ $message }}
          @enderror
        </small>
      </div>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"
        aria-describedby="passwordHelp" placeholder="password" value="{{ old('password') }}">
      <div class="form-text text-muted">
        <small>
          Masukkan password , untuk petugas login.
        </small>
        <small class="text-danger">
          @error('password')
          {{ $message }}
          @enderror
        </small>
      </div>
    </div>

    <div class="mb-3">
      <label for="telp" class="form-label">No Telephone</label>
      <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp"
        aria-describedby="telpHelp" placeholder="telp" value="{{ old('telp') }}">
      <div class="form-text text-muted">
        <small>
          Masukkan no telp petugas
        </small>
        <small class="text-danger">
          @error('telp')
          {{ $message }}
          @enderror
        </small>
      </div>
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Tambahkan</button>
    </div>
  </form>
</main>
@endsection