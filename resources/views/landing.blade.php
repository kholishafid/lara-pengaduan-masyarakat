<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <style>
    .landing-image {
      width: 100vw;
      height: 100vh;
      position: absolute;
      top: 0;
      z-index: -1;
      object-fit: cover;
    }

    .container-s {
      width: 40%;
      position: absolute;
      right: 0;
      background: rgba(255, 254, 255, 0.75);
      padding: 2rem;
      backdrop-filter: blur(10px);
    }

    @media only screen and (max-width: 700px) {
      .container-s {
        width: 80%;
      }
    }
  </style>
</head>

<body>
  <img src="{{asset('/images/splashpengaduan.jpg')}}" alt="splash" class="landing-image">
  <main class="container-s container-sm d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="text-start">
      <h1 class="mb-4">Online - Pengaduan Masyarakat</h1>
      {{-- <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus officia quod, aut sequi
        sit
        temporibus,
        nam unde quaerat excepturi nisi esse beatae provident ea! Soluta numquam perferendis alias blanditiis aut?</p>
      --}}
      <div class="d-flex gap-2 justify-content-start">
        <a href="{{url('login')}}" class="btn bg-light shadow" style="width: 100px;">Login</a>
        <a href="{{url('register')}}" class="btn bg-dark text-white shadow" style="width: 100px;">Register</a>
      </div>
    </div>
  </main>
</body>

</html>