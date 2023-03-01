@inject('carbon', 'Carbon\Carbon')

@extends('layouts.app')

@section('main')
<main class="container my-4">
  <div class="mb-4 d-flex justify-content-between align-items-center">
    <a href="{{ url('/home') }}" class="badge bg-primary btn text-white">&leftarrow; Back</a>
    @if ($dataPengaduan->status == '0')
    <div class="dropdown dropstart open">
      <button class="btn btn-primary " type="button" id="trigerMenuOptions" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        &#9776;
      </button>
      <div class="dropdown-menu me-2" aria-labelledby="trigerMenuOptions">
        <a class="dropdown-item" href="/edit_aduan/{{ $dataPengaduan->id_pengaduan }}">Edit aduan</a>
        <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalId">
          Batalkan aduan
        </a>
      </div>
    </div>
    @endif

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    @if ($dataPengaduan->status == '0')
    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content" style="width: 500px">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah anda yakin Ingin membatalkan aduan?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            <a href="/batalkan_aduan/{{$dataPengaduan->id_pengaduan}}" class="btn btn-primary">Ya</a>
          </div>
        </div>
      </div>
    </div>
    @endif



  </div>
  <div class="my-4 d-flex">
    @if ($dataPengaduan->foto)
    <img src="{{ asset($dataPengaduan->foto) }}" alt="foto-laporan" class="me-3" style="max-width: 400px;height:100%"
      draggable="false">
    @endif
    <div class="d-flex flex-column flex-grow-1">
      <p><span class="d-inline-block" style="width: 130px">Pelapor</span> : {{ $pelapor->nama }}</p>
      <p><span class="d-inline-block" style="width: 130px">Tanggal Aduan </span> : {{
        $carbon::parse($dataPengaduan->tgl_pengaduan)->format('d M
        Y') }}</p>
      <p><span class="d-inline-block" style="width: 130px">Status</span> :
        @if ($dataPengaduan->status == 0)
        <span class="badge bg-warning">Pending</span>
        @elseif($dataPengaduan->status == 'proses')
        <span class="badge bg-primary">Diporses</span>
        @elseif($dataPengaduan->status == 'dibatalkan')
        <span class="badge bg-secondary">Dibatalkan</span>
        @else
        <span class="badge bg-success">Selesai</span>
        @endif
      </p>
      <p><span class="d-inline-block" style="width: 130px">Isi Laporan </span> : </p>
      <div class="border px-3 py-2 rounded bg-light" style="width: 100%">{{$dataPengaduan->isi_laporan}}</div>
    </div>
  </div>
  <div>
    <p><span class="d-inline-block" style="width: 130px">Tanggapan</span>: </p>
    @if ($tanggapan)
    <div class="mb-3">
      <textarea class="form-control" name="" id="" rows="3" readonly>{{ $tanggapan->tanggapan }}</textarea>
    </div>
    @else
    <p>Belum ada tanggapan dari petugas.</p>
    @endif
  </div>
</main>

<!-- Optional: Place to the bottom of scripts -->
<script>
  const myModal = new bootstrap.Modal(document.getElementById('modalId'))
</script>
@endsection