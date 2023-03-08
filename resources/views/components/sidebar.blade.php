<aside style="width: 250px;" class="sidebar">
  <nav>
    <ul>
      <li>
        <a href="{{route('dashboard')}}" @if(url()->current() !== route('dashboard'))
          class="secondary"
          @endif
          style="width: 100%;text-align:start;">
          Dashboard
        </a>
      </li>
      @if (auth()->user()->level === 'admin')
      <li>
        <a href="{{route('kelola_petugas')}}" @if(url()->current() !== route('kelola_petugas'))
          class="secondary"
          @endif
          style="width: 100%;text-align:start;">
          Kelola Petugas
        </a>
      </li>
      <li>
        <a href="{{route('kelola_masyarakat')}}" @if(url()->current() !== route('kelola_masyarakat'))
          class="secondary"
          @endif
          style="width: 100%;text-align:start;">
          Kelola Masyarakat
        </a>
      </li>
      @endif
      <li>
        <a href="{{route('verifikasi')}}" @if(url()->current() !== route('verifikasi'))
          class="secondary"
          @endif
          style="width: 100%;text-align:start;">
          Verifikasi
        </a>
      </li>
      <li>
        <a href="{{route('butuh-tanggapan')}}" @if(url()->current() !== route('butuh-tanggapan'))
          class="secondary"
          @endif
          style="width: 100%;text-align:start;">
          Tanggapi
        </a>
      </li>
      <li>
        <a href="{{route('aduan-selesai')}}" @if(url()->current() !== route('aduan-selesai'))
          class="secondary"
          @endif
          style="width: 100%;text-align:start;">
          Selesai
        </a>
      </li>
      @if (auth()->user()->level === 'admin')
      {{-- <li>
        <a href="{{route('aduan-selesai')}}" @if(url()->current() !== route('aduan-selesai'))
          class="secondary"
          @endif
          style="width: 100%;text-align:start;">
          Selesai
        </a>
      </li> --}}
      @endif
      <li>
        <a href="/petugas/logout" class="contrast">
          Logout
        </a>
      </li>
    </ul>
  </nav>
</aside>