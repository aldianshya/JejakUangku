<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>dashboard</title>
  <link href="../css/c_dashboard.css" rel="stylesheet" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div>
    <div class="c_dashboard-frame">
      {{-- @auth
  {{-- <div class="c_dashboard-user-info">
      <h4>Selamat datang, {{ Auth::user()->username }}</h4>
      <p>Email: {{ Auth::user()->email }}</p>
  </div> --}}
  
  {{-- <div class="c_dashboard-frame">
      <div class="c_dashboard-text06">
          <p class="c_dashboard-text07">Pendapatan</p>
      </div>
      <div class="c_dashboard-text08">
          <p class="c_dashboard-text09">Rp {{ $pendapatan->sum('jumlah') }}</p>
      </div>
  
      <div class="c_dashboard-frame16">
          <div class="c_dashboard-text10">
              <p class="c_dashboard-text11">Pengeluaran</p>
          </div>
          <div class="c_dashboard-text12">
              <p class="c_dashboard-text13">Rp {{ $pengeluaran->sum('jumlah') }}</p>
          </div>
      </div>
  </div> --}}
  {{-- @else
  <div class="c_dashboard-guest-info">
      <p>Anda belum login. Silakan <a href="{{ route('login') }}">login</a> terlebih dahulu.</p>
  </div>
  @endauth
   --}} 
      <div class="c_dashboard-frame01">
        <div class="c_dashboard-frame02">
          <div class="c_dashboard-frame03">
            <div class="c_dashboard-text">
              <p class="c_dashboard-text01">Jejak Uangku</p>
            </div>
            <div class="c_dashboard-frame04">
              <div class="c_dashboard-frame05">
                <a href="/laporan"><img
                  src="../img/grafik.png"
                  alt="rectangle"
                  width="60"
                  height="52"
                  class="c_dashboard-rectangle"
                /></a>
              </div>
              <div class="c_dashboard-frame06">
                <div class="c_dashboard-frame07">
                  <div class="c_dashboard-instance">
                    <a href="/profil"><img
                      src="../img/pengguna.png"
                      alt="vector"
                      width="41.666748046875"
                      height="41.666748046875"
                      class="c_dashboard-vector"
                    /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="c_dashboard-frame08">
            <div class="c_dashboard-frame09">
              <div class="c_dashboard-frame10">
                <div class="c_dashboard-frame11">
                  <div class="c_dashboard-text02">
                    <p class="c_dashboard-text03">Sisa Uang</p>
                  </div>
                </div>
                <div class="c_dashboard-frame12">
                  <div class="c_dashboard-text04">
                    @auth
                    <p class="c_dashboard-text05">Rp {{ $pendapatan->sum('jumlah') - $pengeluaran->sum('jumlah') }}</p>
                    @else
                    <p class="c_dashboard-text05">Rp 0</p>
                  @endauth
                  </div>
                </div>
              </div>
              <div class="c_dashboard-frame13">
                <div class="c_dashboard-frame14">
                  <div class="c_dashboard-text06">
                    <p class="c_dashboard-text07">Pendapatan</p>
                  </div>
                </div>
                <div class="c_dashboard-frame15">
                  <div class="c_dashboard-text08">
                    @auth
                    <p class="c_dashboard-text09">Rp {{ $pendapatan->sum('jumlah') }}</p>
                    @else
                    <p class="c_dashboard-text13">Rp 0</p>
                  @endauth
                  </div>
                </div>
              </div>
              <div class="c_dashboard-frame16">
                <div class="c_dashboard-frame17">
                  <div class="c_dashboard-text10">
                    <p class="c_dashboard-text11">Pengeluaran</p>
                  </div>
                </div>
                <div class="c_dashboard-frame18">
                  <div class="c_dashboard-text12">
                    @auth
                    <p class="c_dashboard-text13">Rp {{ $pengeluaran->sum('jumlah') }}</p>
                    @else
                    <p class="c_dashboard-text13">Rp 0</p>
                  @endauth
                  </div>
                </div>
              </div>
            </div>
            <div class="c_dashboard-frame19">
              <form action="{{ route('dashboard') }}" method="POST">
                @csrf
                <div class="c_dashboard-frame20">
                    <select name="pilihan" class="c_dashboard-instance1">
                        <option value="pengeluaran" class="c_dashboard-text14">
                            Pengeluaran
                        </option>
                        <option value="pendapatan" class="c_dashboard-text14">
                            Pendapatan
                        </option>x
                    </select>
                    <input type="number" name="jumlah" placeholder="jumlah" class="c_dashboard-instance2">
                    </input>
                    <input name="jenis" type="text" placeholder="Nota" class="c_dashboard-instance3">
                    </input>
                    <input name="tanggal" type="date" class="c_dashboard-instance4">
                    </input>
                    <div class="c_dashboard-instance5">
                        <button type="submit" class="c_dashboard-instance6">
                            <div class="c_dashboard-text22">
                                <p class="c_dashboard-text23">Tambah</p>
                            </div>
                        </button>
                    </div>
                </div>
            </form>          
              <div class="c_dashboard-frame22">
                <div class="c_dashboard-component">
                  <div class="c_dashboard-frame23">
                    <div class="c_dashboard-frame24">
                      {{-- <div class="c_dashboard-text24">
                                                  
                        <p class="c_dashboard-text25">{{ $pendapatan1->tanggal }}</p>
                      </div> --}}
                      <div class="c_dashboard-frame25">
                        <div class="c_dashboard-text26">
                          @if($pengeluaran1)
                          <p class="c_dashboard-text27">{{ $pengeluaran1->tanggal }}</p>
                          @endif
                        </div>
                        {{-- <div class="c_dashboard-text28">
                          <p class="c_dashboard-text29">05/2024</p>
                        </div> --}}
                      </div>
                    </div>
                    <div class="c_dashboard-frame26">
                    @foreach ($pengeluaran as $pel)
                      <div class="c_dashboard-frame27">
                        <div class="c_dashboard-text30">
                          <p class="c_dashboard-text31">{{ $pel->jenis }}</p>
                        </div>
                        <div class="c_dashboard-text32">
                          <p class="c_dashboard-text33">Rp{{ $pel->jumlah }}</p>
                        </div>
                      </div>
                    @endforeach
                      {{-- <div class="c_dashboard-frame28">
                        <div class="c_dashboard-text34">
                          <p class="c_dashboard-text35">Pakaian</p>
                        </div>
                        <div class="c_dashboard-text36">
                          <p class="c_dashboard-text37">Rp100.000</p>
                        </div>
                      </div> --}}
                      @foreach($pendapatan as $pen)
                      <div class="c_dashboard-frame29">
                        <div class="c_dashboard-text38">
                          <p class="c_dashboard-text39">{{ $pen->jenis }}</p>
                        </div>
                        <div class="c_dashboard-text40">
                          <p class="c_dashboard-text41">Rp{{ $pen->jumlah }}</p>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>