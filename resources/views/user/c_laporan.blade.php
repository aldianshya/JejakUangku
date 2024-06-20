<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="../css/c_laporan.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Laporan</title>
</head>
<body>
  <div>
    
    <div class="c_laporan-frame">
      <div class="c_laporan-frame01">
        <div class="c_laporan-frame02">
          <div class="c_laporan-frame03">
            <div class="c_laporan-frame04">
              <a href="dashboard"><img
                src="../img/kembali.png"
                alt="rectangle"
                width="46"
                height="52"
                class="c_laporan-rectangle"
              /></a>
            </div>
            <div class="c_laporan-frame05">
              <div class="c_laporan-text">
                <p class="c_laporan-text01">Laporan Keuangan</p>
              </div>
            </div>
          </div>
          <div class="c_laporan-frame06">
            <div class="c_laporan-text02">
              <p class="c_laporan-text03">aaa</p>
            </div>
          </div>
        </div>
        <div class="c_laporan-frame07">
          <div class="c_laporan-frame08">
            <div class="c_laporan-text04">
              <p class="c_laporan-text05">1 Bulan Terakhir</p>
            </div>
          </div>
          <div class="c_laporan-frame09">
            <div class="c_laporan-frame10">
              <div class="c_laporan-frame11">
                <div class="c_laporan-frame12">
                  <div class="c_laporan-text06">
                    <p class="c_laporan-text07">Pengeluaran</p>
                  </div>
                </div>
                <div class="c_laporan-frame13">
                  <div class="c_laporan-frame14">
                    <canvas id="pengeluaranChart" width="400" height="400"></canvas>
                  </div>
                </div>
                
              </div>
              <div class="c_laporan-frame28">
                <div class="c_laporan-frame29">
                  <div class="c_laporan-text16">
                    <p class="c_laporan-text17">Pendapatan</p>
                  </div>
                </div>
                <div class="c_laporan-frame30">
                  <div class="c_laporan-frame31">
                    <canvas id="pendapatanChart" width="400" height="400"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="c_laporan-frame45">
              <div class="c_laporan-frame46">
                <img
                  src="../img/uang.png"
                  alt="rectangle"
                  width="100"
                  height="101"
                  class="c_laporan-rectangle3"
                />
              </div>
              <div class="c_laporan-frame47">
                <div class="c_laporan-text26">
                  <p class="c_laporan-text27">
                    <span class="c_laporan-text28">
                      Kamu memiliki defisit arus kas
                      sebesar
                    </span>
                    @if ($pendapatan)
                    <span class="c_laporan-text29">{{ $pendapatan->sum('jumlah') - $pengeluaran->sum('jumlah') }}</span>
                    @endif
                    <span class="c_laporan-text30">pada periode ini</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // Fungsi untuk menghasilkan warna acak
    function getRandomColor() {
        const r = Math.floor(Math.random() * 255);
        const g = Math.floor(Math.random() * 255);
        const b = Math.floor(Math.random() * 255);
        return `rgba(${r}, ${g}, ${b}, 0.2)`;
    }
    
    document.addEventListener('DOMContentLoaded', function () {
        const pengeluaranCtx = document.getElementById('pengeluaranChart').getContext('2d');
        const pendapatanCtx = document.getElementById('pendapatanChart').getContext('2d');
        
        const pengeluaranData = @json($pengeluaranData);
        const pendapatanData = @json($pendapatanData);
    
        // Data Pengeluaran
        const pengeluaranLabels = pengeluaranData.map(item => item.jenis);
        const pengeluaranValues = pengeluaranData.map(item => item.jumlah);
        const pengeluaranCategories = [...new Set(pengeluaranData.map(item => item.kategori))]; 
    
        const pengeluaranBackgroundColors = pengeluaranValues.map(() => getRandomColor());
        const pengeluaranBorderColors = pengeluaranValues.map(() => getRandomColor().replace('0.2', '1'));
    
        const pengeluaranDatasets = pengeluaranCategories.map(category => {
            const categoryData = pengeluaranData.filter(item => item.kategori === category);
            return {
                label: category,
                data: categoryData.map(item => item.jumlah),
                backgroundColor: categoryData.map(() => getRandomColor()),
                borderColor: categoryData.map(() => getRandomColor().replace('0.2', '1')),
                borderWidth: 1
            };
        });
    
        // Data Pendapatan
        const pendapatanLabels = pendapatanData.map(item => item.jenis);
        const pendapatanValues = pendapatanData.map(item => item.jumlah);
        const pendapatanCategories = [...new Set(pendapatanData.map(item => item.kategori))]; 
    
        const pendapatanBackgroundColors = pendapatanValues.map(() => getRandomColor());
        const pendapatanBorderColors = pendapatanValues.map(() => getRandomColor().replace('0.2', '1'));
    
        const pendapatanDatasets = pendapatanCategories.map(category => {
            const categoryData = pendapatanData.filter(item => item.kategori === category);
            return {
                label: category,
                data: categoryData.map(item => item.jumlah),
                backgroundColor: categoryData.map(() => getRandomColor()),
                borderColor: categoryData.map(() => getRandomColor().replace('0.2', '1')),
                borderWidth: 1
            };
        });
    
        // Pengeluaran Chart
        new Chart(pengeluaranCtx, {
            type: 'pie',
            data: {
                labels: pengeluaranLabels,
                datasets: pengeluaranDatasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Perbandingan Pengeluaran'
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            },
        });
    
        // Pendapatan Chart
        new Chart(pendapatanCtx, {
            type: 'pie',
            data: {
                labels: pendapatanLabels,
                datasets: pendapatanDatasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Perbandingan Pendapatan'
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            },
        });
    });
    </script>
</body>
</html>