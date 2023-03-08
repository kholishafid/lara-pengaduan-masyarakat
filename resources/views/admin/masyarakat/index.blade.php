@extends('layouts.petugas')

@section('main')
<main>
  <div class="grid">
    <h3 style="margin: 0">Kelola Masyarakat</h3>
    {{-- <a href="/petugas/add_petugas" style="max-width:200px;margin-left:auto">Tambah Baru</a> --}}
  </div>

  @foreach ($data_masyarakat as $item)
  <article class="grid" style="margin: 1rem 0;padding:1rem">
    <div>
      <div>
        <h6 style="display: inline">{{$item->nama}}</h6>
        <span role="link">({{$item->username}})</span>
      </div>
      <small>NIK : {{$item->nik}}</small>
      --
      <small>Telp : {{$item->telp}}</small>
    </div>
    <div style="margin-left: auto">
      <a href="{{ route('edit_masyarakat', ['id' => $item->nik])}}">Edit</a>
    </div>
  </article>
  @endforeach
</main>
@endsection