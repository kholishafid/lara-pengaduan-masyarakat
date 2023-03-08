@extends('layouts.petugas')

@section('main')
<main class="container">
  <h1>Selamat datang <mark> {{auth()->user()->nama_petugas}}</mark></h1>
</main>
@endsection