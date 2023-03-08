@extends('layouts.petugas-sub')

@section('main')
<main>
  <a href="{{ route('kelola_masyarakat') }}" style="margin-bottom: 1rem;display:inline-block"><small> &leftarrow;
      Back</small></a>
  <form action="{{ route('edit_masyarakat' , ['id' => $masyarakat->id ])}}" method="POST" style="margin: 0">
    @csrf
    <hgroup>
      <h2>Edit account Masyarakat</h2>
      <h2></h2>
    </hgroup>
    <div class="grid">
      <label for="nama">
        Nama
        <input type="text" id="nama" name="nama" placeholder="nama" @error('nama') aria-invalid="true" @enderror
          value="{{ $masyarakat['nama'] }}">
        @error('nama')
        <small style="color: tomato" class="highlighted">{{$message}}</small>
        @enderror
      </label>
      <div class="grid">
        <label for="nik">
          NIK
          <input type="number" id="nik" name="nik" placeholder="nik" @error('nik') aria-invalid="true" @enderror
            value="{{ $masyarakat['nik'] }}">
          @error('nik')
          <small style="color: tomato" class="highlighted">{{$message}}</small>
          @enderror
        </label>
        <label for="telp">
          Telp
          <input type="number" id="telp" name="telp" placeholder="telp" @error('telp') aria-invalid="true" @enderror
            value="62{{ $masyarakat['telp'] }}">
          @error('telp')
          <small style="color: tomato" class="highlighted">{{$message}}</small>
          @enderror
        </label>
      </div>
    </div>
    <div class="grid">
      <label for="username">
        Username
        <input type="string" id="username" name="username" placeholder="username" @error('username') aria-invalid="true"
          @enderror value="{{ $masyarakat['username'] }}">
        @error('username')
        <small style="color: tomato" class="highlighted">{{$message}}</small>
        @enderror
      </label>
      <label for="password">
        Password
        <input type="password" id="password" name="password" placeholder="password">
        @error('password')
        <small style="color: tomato" class="highlighted">{{$message}}</small>
        @enderror
      </label>
    </div>
    <button class="contrast">Update</button>
  </form>
</main>
@endsection