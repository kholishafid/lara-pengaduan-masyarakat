<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pengaduan Masyarakat</title>
  <link rel="stylesheet" href="{{ asset('/css/pico.min.css') }}">
  <style>
    .status mark {
      border-radius: 4px;
    }

    .theme-dark {
      position: fixed;
      bottom: 1rem;
      right: 1rem;
      background: var(--contrast);
      border-radius: 50%;
      padding: 0.5rem;
      cursor: pointer;
    }

    .theme-light {
      display: none;
      position: fixed;
      bottom: 1rem;
      right: 1rem;
      background: var(--contrast);
      border-radius: 50%;
      padding: 0.5rem;
      cursor: pointer;
    }
  </style>
</head>