@include('app.head')

<style>
  .navbar {
    background-color: var(--card-background-color);
    box-shadow: var(--card-box-shadow);
  }

  .sidebar {
    box-shadow: var(--card-box-shadow);
    height: 100%;
    padding: 1rem;
    margin: 0;
  }
</style>

<body>
  <div style="display: flex;flex-direction: column;height:100vh">
    <nav class="container-fluid navbar">
      <ul>
        <li>
          <strong>Pengaduan Masyarakat</strong>
        </li>
      </ul>
    </nav>
    <div style="flex: 1;display:flex">
      @include('components.sidebar')
      <div style="padding: 2rem;flex:1;">
        @yield('main')
      </div>
    </div>
  </div>
  @include('components.theme-switcher')
</body>

@include('app.foot')