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
      <h4 class="m-0">List Masyarakat.</h4>
      <small>List seluruh akun masyarakat.</small>
    </div>
    <div>
      <a href="/admin/add_masyarakat" class="btn btn-primary">Tambah akun masyarakat</a>
    </div>
  </div>
  <div>
    <ol class="list-group list-group-numbered">
      @foreach ($data_masyarakat as $masyarakat)
      <li class="list-group-item py-3 d-flex align-items-center">
        <div class="ms-2 me-auto">
          <div class="fw-medium mb-1">{{$masyarakat->nama}} <span class="text-success">({{$masyarakat->username}})
          </div>
          <small>NIK : {{$masyarakat->nik}}</small>
          <span>~</span>
          <small>Telp : {{$masyarakat->telp}}</small>
        </div>
        <div>
          <a href="/admin/edit_masyarakat/{{ $masyarakat->nik }}" class="btn btn-sm btn-primary">Edit</a>
          <a href="/admin/delete_masyarakat/{{ $masyarakat->nik }}" class="btn btn-sm btn-danger">Delete</a>
        </div>
        </a>
        @endforeach
    </ol>
  </div>

</main>
@endsection