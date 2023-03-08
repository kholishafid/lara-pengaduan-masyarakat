<body>

  @include('app.head')

  <main class="container" style="padding: 0;">
    <article style="padding: 2rem;margin: 3rem 0 0 0">
      <form action="/login" method="POST" style="margin: 0">
        @csrf
        <div class="headings">
          <h2>Login</h2>
          <h2>Login to pengaduan online!.</h2>
        </div>
        <label for="username">
          Username
          <input type="text" id="username" @error('username') aria-invalid="true" @enderror name="username"
            value="{{ old('username')}}">
          @error('username')
          <small style="color: tomato" class="highlighted">{{$message}}</small>
          @enderror
        </label>
        <label for="password">
          Password
          <input type="password" id="password" @error('password') aria-invalid="true" @enderror name="password">
          @error('password')
          <small style="color: tomato" class="highlighted">{{$message}}</small>
          @enderror
        </label>
        <button class="contrast">Login</button>
        Didn't have account ? <a href="/register">Register</a>
      </form>
    </article>
  </main>
  @include('components.theme-switcher')
  @include('app.foot')
</body>