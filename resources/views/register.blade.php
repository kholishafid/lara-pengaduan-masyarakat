@include('app.head')

<body>

  <main class="container" style="padding: 0">
    <article style="padding: 2rem;margin: 3rem 0 0 0">
      <form action="/register" method="POST" style="margin: 0">
        @csrf
        <hgroup>
          <h2>Register</h2>
          <h2>Register if you didn't have account yet, </h2>
        </hgroup>
        <div class="grid">
          <label for="nama">
            Nama
            <input type="text" id="nama" name="nama" placeholder="nama" @error('nama') aria-invalid="true" @enderror
              value="{{ old('nama') }}">
            @error('nama')
            <small style="color: tomato" class="highlighted">{{$message}}</small>
            @enderror
          </label>
          <div class="grid">
            <label for="nik">
              NIK
              <input type="number" id="nik" name="nik" placeholder="nik" @error('nik') aria-invalid="true" @enderror
                value="{{ old('nik') }}">
              @error('nik')
              <small style="color: tomato" class="highlighted">{{$message}}</small>
              @enderror
            </label>
            <label for="telp">
              Telp
              <input type="number" id="telp" name="telp" placeholder="telp" @error('telp') aria-invalid="true" @enderror
                value="{{ old('telp') }}">
              @error('telp')
              <small style="color: tomato" class="highlighted">{{$message}}</small>
              @enderror
            </label>
          </div>
        </div>
        <div class="grid">
          <label for="username">
            Username
            <input type="string" id="username" name="username" placeholder="username" @error('username')
              aria-invalid="true" @enderror value="{{ old('username') }}">
            @error('username')
            <small style="color: tomato" class="highlighted">{{$message}}</small>
            @enderror
          </label>
          <label for="password">
            Password
            <input type="password" id="password" name="password" placeholder="password" @error('password')
              aria-invalid="true" @enderror>
            @error('password')
            <small style="color: tomato" class="highlighted">{{$message}}</small>
            @enderror
          </label>
        </div>
        <button class="contrast">Submit</button>
        Already have Account ? <a href="/login">Login</a>
      </form>
    </article>
  </main>
  @include('components.theme-switcher')
</body>
@include('app.foot')