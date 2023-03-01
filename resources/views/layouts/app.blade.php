<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

<body>
  <div class="d-flex flex-column" style="height: 100vh">
    <nav class="navbar navbar-expand-sm navbar-light bg-light shadow-sm">
      <div class="container">
        <a href="/home" class="navbar-brand" href="#">Pengaduan Maysarakat</a>
        <a href="/logout" class="btn btn-danger">Logout</a>
      </div>
    </nav>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <div class="bg-body-secondary flex-grow-1" style="flex: 1;">
      @yield('main')
    </div>
  </div>
</body>

</html>