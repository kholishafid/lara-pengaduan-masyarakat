@inject('carbon', 'Carbon\Carbon')

@extends('layouts.app')

@section('main')
<main class="container py-3 h-100">
  @auth
  <div class="py-4">
    <h2>Selamat Datang <span class="fw-bold">{{ $dataUser->nama }}</span></h2>
  </div>
  @endauth
  <div>
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <p class="m-0">Status Laporanmu : </p>
        <small>Tip: Anda masih bisa mengubah isi laporan anda selama status masih pending.</small>
      </div>
      <a href="/new_aduan" class="btn btn-primary">Buat Baru</a>
    </div>
    @if (!$listAduan->isEmpty())
    <div class="list-group" style="cursor: pointer">
      @foreach ($listAduan as $item)
      <a href="{{ 'detail_aduan/'.$item->id_pengaduan }}"
        class="list-group-item list-group-item-action flex-column align-items-start p-3 " aria-current="true">
        <div>
          <div>
            <div class="d-flex justify-content-between">
              <h6>{{ $carbon::parse($item->tgl_pengaduan)->format('d M Y') }} </h6>
              <small class="text-muted">
                @if ($item->status == 0)
                <span class="badge bg-warning">Pending</span>
                @elseif($item->status == 'proses')
                <span class="badge bg-primary">Diporses</span>
                @elseif($item->status == 'dibatalkan')
                <span class="badge bg-secondary">Dibatalkan</span>
                @else
                <span class="badge bg-success">Selesai</span>
                @endif
              </small>
            </div>
            <p class="mb-1 p-0 container" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap">
              {{
              $item->isi_laporan }}</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    @else
    <div>
      <ul class="list-group mb-3">
        <li class="list-group-item">Anda belum membuat laporan sama sekali.</li>
      </ul>
    </div>
    @endif
  </div>
</main>
@endsection