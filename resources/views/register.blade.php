<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>

<body>
  <main class="container-fluid bg-body-secondary" style="height: 100vh">
    <div class=" row justify-content-center align-items-center h-100">
      <form class="card" style="max-width: 540px;" method="post" action="/register">
        @csrf
        <div class="card-body my-2">
          <h2 class="mb-3">Register</h2>

          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>

            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama"
              placeholder="nama" value="{{ old('nama') }}" required />

            @error('nama')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3 d-flex gap-2">
            <div>
              <label for="nik" class="form-label">NIK</label>
              <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik"
                placeholder="nik" value="{{ old('nik') }}" required>
              @error('nik')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div>
              <label for="telp" class="form-label">No Telp</label>
              <div class="input-group">
                <span class="input-group-text">+62</span>
                <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp"
                  placeholder="telp" value="{{ old('telp') }}" required>
                @error('telp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              @error('telp')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
              id="username" placeholder="username" value="{{ old('username') }}" required>

            @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
              id="password" placeholder="password" value="{{ old('password') }}" required />

            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Register</button>
            <div class="pt-3 text-center">
              <span>punya akun ?</span> <a href="{{url('login')}}">Login</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</body>

</html>