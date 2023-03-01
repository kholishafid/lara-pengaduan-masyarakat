@extends('admin.layouts.admin_app')

@section('main')
@if (session('alert'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong>{{session('alert')}}</strong>
</div>
@endif

<main>
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="m-0">List Petugas.</h4>
      <small>List seluruh petugas aktif.</small>
    </div>
    <div>
      <a href="/admin/add_petugas" class="btn btn-primary">Tambah Petugas</a>
    </div>
  </div>
  <div>
    <ol class="list-group list-group-numbered">
      @foreach ($data_petugas as $petugas)
      <li class="list-group-item py-3 d-flex align-items-center">
        <div class="ms-2 me-auto">
          <div class="fw-medium mb-1">{{$petugas->nama_petugas}} <span class="text-success">({{$petugas->username}})
          </div>
          <small>Telp : {{$petugas->telp}}</small>
        </div>
        <div>
          <a href="/admin/edit_petugas/{{ $petugas->id_petugas }}" class="btn btn-sm btn-primary">Edit</a>
          <a href="/admin/delete_petugas/{{ $petugas->id_petugas }}" class="btn btn-sm btn-danger">Delete</a>
        </div>
        </a>
        @endforeach
    </ol>
  </div>

</main>
@endsection