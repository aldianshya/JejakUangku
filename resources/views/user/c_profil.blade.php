<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="../css/c_profil.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="c_profil-component">
    <div class="c_profil-frame">
        <div class="c_profil-frame01">
            <div class="c_profil-frame02">
                <div class="c_profil-frame03">
                    <a href="dashboard"><img src="../img/kembali.png" alt="rectangle" width="46" height="52" class="c_profil-rectangle" /></a>
                </div>
                <div class="c_profil-frame04">
                    <div class="c_profil-text">
                        <p class="c_profil-text01">Profil</p>
                    </div>
                </div>
            </div>
            <div class="c_profil-frame05">
              <a href="/"><img src="../img/keluar.png" alt="rectangle" width="52" height="57" class="c_profil-rectangle1" /></a>
            </div>
        </div>
        <div class="c_profil-frame06">
            <div class="c_profil-frame07">
                <div class="c_profil-frame08">
                    <div class="c_profil-frame09">
                        <img src="../img/pengguna.png" alt="rectangle" width="79" height="73" class="c_profil-rectangle2" />
                    </div>
                    <div class="c_profil-frame10">
                        <div class="c_profil-frame11">
                            <div class="c_profil-text02">
                                <p class="c_profil-text03">{{ Auth::user()->username }}</p>
                            </div>
                        </div>
                        <div class="c_profil-frame12">
                            <div class="c_profil-text04">
                                <p class="c_profil-text05">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c_profil-frame13">
                <div class="c_profil-frame14">
                    <div class="c_profil-frame15">
                        <div class="c_profil-text06">
                            <p class="c_profil-text07">Profil Arus Kas Kamu</p>
                        </div>
                    </div>
                    <div class="c_profil-frame16">
                        <div class="c_profil-frame17">
                            <div class="c_profil-frame18">
                                <canvas id="pendapatanChart" width="800" height="1600"></canvas>
                            </div>
                            <div class="c_profil-frame19">
                                <div class="c_profil-text08">
                                    <p class="c_profil-text09">Pendapatan</p>
                                </div>
                            </div>
                        </div>
                        <div class="c_profil-frame20">
                            <div class="c_profil-frame21">
                                <canvas id="pengeluaranChart" width="800" height="1600"></canvas>
                            </div>
                            <div class="c_profil-frame22">
                                <div class="c_profil-text10">
                                    <p class="c_profil-text11">Pengeluaran</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="/profil" method="post" class="c_profil-frame23">
                  @csrf
                    <div class="c_profil-frame24">
                        <div class="c_profil-text12">
                            <p class="c_profil-text13">Edit Akun</p>
                        </div>
                    </div>
                    <div class="c_profil-frame25">
                        <div class="c_profil-frame26">
                            <div class="c_profil-frame27">
                                <div class="c_profil-frame28">
                                    <div class="c_profil-text14">
                                        <p class="c_profil-text15">Username</p>
                                    </div>
                                </div>
                                <input type="text" name="username" value="{{ Auth::user()->username }}" class="c_profil-frame29">
                                    {{-- <div class="c_profil-text16">
                                        <p class="c_profil-text17"></p>
                                    </div> --}}
                                </input>
                            </div>
                            <div class="c_profil-frame30">
                                <div class="c_profil-frame31">
                                    <div class="c_profil-text18">
                                        <p class="c_profil-text19">Email</p>
                                    </div>
                                </div>
                                <input type="email" name="email" value="{{ Auth::user()->email }}" class="c_profil-frame32" disabled>
                                    {{-- <div class="c_profil-text20">
                                        <p class="c_profil-text21"></p>
                                    </div> --}}
                                </input>
                            </div>
                            <div class="c_profil-frame33">
                                <div class="c_profil-frame34">
                                    <div class="c_profil-text22">
                                        <p class="c_profil-text23">Password</p>
                                    </div>
                                </div>
                                <input name="password" type="password" value="{{ Auth::user()->password }}" class="c_profil-frame35">
                                    {{-- <div class="c_profil-text24">
                                        <p class="c_profil-text25"></p>
                                    </div> --}}
                                </input>
                            </div>
                        </div>
                        <button type="submit" value="SIMPAN" class="c_profil-frame36">SIMPAN
                            {{-- < class="c_profil-text26">
                                <p class="c_profil-text27"></p>
                            </> --}}
                        </buttton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const pengeluaranCtx = document.getElementById('pengeluaranChart').getContext('2d');
    const pendapatanCtx = document.getElementById('pendapatanChart').getContext('2d');
    const pengeluaranData = @json($pengeluaranData);
    const totalPengeluaran = @json($totalPengeluaran);
    const pendapatanData = @json($pendapatanData);
    const totalPendapatan = @json($totalPendapatan);

    new Chart(pengeluaranCtx, {
        type: 'bar',
        data: {
            labels: Object.keys(pengeluaranData),
            datasets: [{
                label: totalPengeluaran,
                data: Object.values(pengeluaranData),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false, // Hide the legend
                },
                title: {
                    display: false, // Hide the title
                },
               
            },
            scales: {
                x: {
                    display: false // Hide the x-axis
                },
                y: {
                    display: false // Hide the y-axis
                }
            }
        },
    });

    new Chart(pendapatanCtx, {
        type: 'bar',
        data: {
            labels: Object.keys(pendapatanData),
            datasets: [{
                label: totalPendapatan,
                data: Object.values(pendapatanData),
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false, // Hide the legend
                },
                title: {
                    display: false, // Hide the title
                },
                
            },
            scales: {
                x: {
                    display: false // Hide the x-axis
                },
                y: {
                    display: false // Hide the y-axis
                }
            }
        },
    });
});
</script>
</body>
</html>
