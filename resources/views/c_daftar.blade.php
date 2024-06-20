<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar</title>
  <link href="../css/c_login.css" rel="stylesheet" />
</head>
<body>
  <div>
    <div class="c_login-frame">
      <div class="c_login-frame01">
        <form action="/daftar" method="post" class="c_login-frame02">
          @csrf
          <div class="c_login-frame03">
            <div class="c_login-frame04">
              <div class="c_login-frame05">
                <div class="c_login-text">
                  <p class="c_login-text01">Buat Akun</p>
                </div>
              </div>
              <div class="c_login-frame06">
                <div class="c_login-frame07">
                  <div class="c_login-text02">
                    <p class="c_login-text03">Sudah punya akun?</p>
                    <a href="/"><p class="c_login-text05">Login disini</p></a>
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
                    <div class="c_login-text06">
                      <p class="c_login-text07">Username</p>
                    </div>
                  </div>
                  <input type="text" name="username" placeholder="Masukkan username kamu" class="c_login-frame13" required>
                    {{-- <div class="c_login-text08">
                      <p class="c_login-text09">Masukkan email kamu</p>
                    </div> --}}
                  </input>
                </div>
                <div class="c_login-frame11">
                  <div class="c_login-frame12">
                    <div class="c_login-text06">
                      <p class="c_login-text07">Email</p>
                    </div>
                  </div>
                  <input type="email" name="email" placeholder="Masukkan email kamu" class="c_login-frame13" required>
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
              </div>
              <button name="daftar" type="submit" value="daftar" class="c_login-frame18">
                <div class="c_login-text16">
                  <p class="c_login-text17">DAFTAR</p>
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
  
</body>
</html>