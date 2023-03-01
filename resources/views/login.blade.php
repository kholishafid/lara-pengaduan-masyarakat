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
      <form class="card" style="max-width: 450px;" method="post" action="/login">
        @csrf
        <div class="card-body my-2">
          <h2 class="mb-3">Login</h2>
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
              id="username" placeholder="username" value="{{ old('username') }}" required />
            @error('username')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
              id="password" placeholder="password" required />
            @error('password')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="pt-3 text-center">
              <span>or</span> <a href="{{url('register')}}">Register</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</body>

</html>