@extends('admin.layouts.admin_app')

@section('main')
<main>
  <div class="mb-4">
    <a href="{{ url()->previous()}}" class="badge bg-primary">&leftarrow; Kembali</a>
  </div>
  <h4 class="mb-4">Edit Data Petugas</h4>
  <form action="/admin/edit_petugas/{{ $data_petugas->id_petugas}}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="nama_petugas" class="form-label">Nama Petugas</label>
      <input type="text" name="nama_petugas" id="nama_petugas"
        class="form-control @error('nama_petugas') is-invalid @enderror" placeholder="nama asli petugas"
        aria-describedby="namaHelpId" value="{{ $data_petugas['nama_petugas'] }}">
      <div id=" namaHelp" class="form-text text-muted ">
        <small>Ubah nama asli petugas.</small>
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
        aria-describedby="usernameHelp" placeholder="username" value="{{ $data_petugas['username'] }}">
      <div class="form-text text-muted">
        <small>
          Ubah username , untuk petugas login.
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
        aria-describedby="passwordHelp" placeholder="password">
      <div class=" form-text text-muted">
        <small>
          Ubah password lama, jika tidak abaikan.
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
        aria-describedby="telpHelp" placeholder="telp" value="{{ $data_petugas['telp'] }}">
      <div class="form-text text-muted">
        <small>
          Ubah no telp petugas
        </small>
        <small class="text-danger">
          @error('telp')
          {{ $message }}
          @enderror
        </small>
      </div>
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </div>
  </form>
</main>
@endsection