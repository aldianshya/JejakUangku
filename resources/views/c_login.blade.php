<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div>
  <link href="../css/c_login.css" rel="stylesheet" />
  <div class="c_login-frame">
    <div class="c_login-frame01">
      <form action="/login" method="post" class="c_login-frame02">
        @csrf
        <div class="c_login-frame03">
          <div class="c_login-frame04">
            <div class="c_login-frame05">
              <div class="c_login-text">
                <p class="c_login-text01">Login ke akunmu</p>
              </div>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('loginEror'))
            <div class="alert alert-danger">
                {{ session('loginEror') }}
            </div>
        @endif
            <div class="c_login-frame06">
              <div class="c_login-frame07">
                <div class="c_login-text02">
                  <p class="c_login-text03">Belum punya akun?</p>
                  <a href="/daftar"><p class="c_login-text05">Daftar disini</p></a>
                </div>
              </div>
              {{-- <div class="c_login-frame08">
                <div class="c_login-text04">
                </div>
              </div> --}}
            </div>
          </div>
          <div class="c_login-frame09">
            <div class="c_login-frame10">
              <div class="c_login-frame11">
                <div class="c_login-frame12">
                  <label for="email" class="c_login-text06">
                    <p class="c_login-text07">Email</p>
                  </label>
                </div>
                <input type="email" name="email" placeholder="Masukkan email kamu" id="email" class="c_login-frame13 @error('email') is-invalid
                @enderror" autofocus>
                @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
                  {{-- <div class="c_login-text08">
                    <p class="c_login-text09">Masukkan email kamu</p>
                  </div> --}}
                </input>
              </div>
              <div class="c_login-frame14">
                <div class="c_login-frame15">
                  <div class="c_login-text10">
                    <p class="c_login-text11">Password</p>
                  </div>
                </div>
                <input type="password" name="password" placeholder="Masukkan password kamu" class="c_login-frame16" required>
                  {{-- <div class="c_login-text12">
                    <p class="c_login-text13">Masukkan password kamu</p>
                  </div> --}}
                </input>
              </div>
              {{-- <div class="c_login-frame17">
                <div class="c_login-text14">
                  <p class="c_login-text15">Lupa password?</p>
                </div>
              </div> --}}
            </div>
            <button type="submit" value="login" name="login" class="c_login-frame18">
              <div class="c_login-text16">
                <p class="c_login-text17">LOGIN</p>
              </div>
            </button>
          </div>
        </div>
        <div class="c_login-frame19">
          <div class="c_login-instance">
            <img
              src="../img/logo.png"
              alt="rectangle"
              width="284"
              height="340"
              class="c_login-rectangle"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
