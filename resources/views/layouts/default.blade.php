@include('app.head')

<body>
  <nav class="container">
    <ul>
      <li>
        <strong>Pengaduan Masyarakat</strong>
      </li>
    </ul>
    <ul>
      <a href="/logout" role="button" class="warning">
        Logout
      </a>
    </ul>
  </nav>
  @yield('main')
  <footer class="container" style="padding: 1rem 0">
    Pengaduan Masyarakat &copy; 2023
  </footer>
  @include('components.theme-switcher')
</body>

@include('app.foot')