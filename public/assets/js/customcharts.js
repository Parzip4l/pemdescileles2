$(function() {
    'use strict';
    var colors = {
        primary: '#008FFB',
        warning: '#FFB64D',
    };

var fontFamily = 'Arial, sans-serif';

var options = {
    chart: {
        height: 300,
        type: "pie",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
            show: true,
        },
    },
    theme: {
        mode: 'light',
    },
    tooltip: {
        theme: 'light',
    },
    colors: [colors.warning, colors.primary, colors.danger, colors.info],
    legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: fontFamily,
        itemMargin: {
            horizontal: 8,
            vertical: 0,
        },
    },
    stroke: {
        colors: ['rgba(0,0,0,0)'],
    },
    dataLabels: {
        enabled: true, // Enable data labels
        formatter: function (val, opts) {
            const percentage = ((val / opts.w.globals.seriesTotals.reduce((a, b) => a + b, 0)) * 100).toFixed(2);
            return `${percentage}%`;
        },
    },
    series: [51, 49],
    labels: ['Laki-Laki', 'Perempuan'],
};

var chart = new ApexCharts(document.querySelector("#PerkembanganPenduduk"), options);
chart.render();
});

// Umur
$(function() {
    'use strict';
    var colors = {
        primary: '#07071C',
    };

    var options = {
        series: [{
            data: [174, 193, 777, 302, 305, 705, 3465, 498],
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: false,
            }
        },
        dataLabels: {
            enabled: true
        },
        colors: [colors.primary],
        xaxis: {
            categories: ['0-4 Tahun', '5-6 Tahun', '7-12 Tahun ', '13-15 Tahun', '16-18 Tahun', '19-25 Tahun', '26-64 Tahun',
                '65 Tahun keatas'
            ],
        },
        tooltip: {
            theme: 'dark', // Menggunakan theme dark pada tooltip
            x: {
                show: true, // Menampilkan label x (kategori)
            },
            y: {
                formatter: function(val) {
                    return val; // Menampilkan nilai y (data) pada tooltip
                }
            },
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                return '<div class="tooltip-custom">' + series[seriesIndex][dataPointIndex] + ' Jiwa</div>';
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#UmurPenduduk"), options);
    chart.render();
});

// Pendidikan
$(function() {
    'use strict';
    var colors = {
        primary: '#07071C',
    };

    var options = {
          series: [{
          data: [1233, 602, 1635, 1211, 1444, 14, 75, 185,20],
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true
        },
        colors: [colors.primary],
        xaxis: {
          categories: ['Belum Sekolah', 'Belum Tamat SD ', 'Tamat SD/sederajat', 'Tamat SMP/ sederajat', 'Tamat SMA/ sederajat', 'Tamat D-1/D-2 sederajat', 'Tamat D-3/ sederajat',
            'Tamat S-1/ sederajat','Tamat S-2/ sederajat','Tamat S-3/ sederajat'
          ],
        },
        tooltip: {
            theme: 'dark', // Menggunakan theme dark pada tooltip
            x: {
                show: true, // Menampilkan label x (kategori)
            },
            y: {
                formatter: function(val) {
                    return val; // Menampilkan nilai y (data) pada tooltip
                }
            },
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                return '<div class="tooltip-custom">' + series[seriesIndex][dataPointIndex] + ' Jiwa</div>';
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#PendidikanPenduduk"), options);
        chart.render();
    });

// Agama

$(function() {
    'use strict';
    var colors = {
        primary: '#008FFB',
        warning: '#FFB64D',
    };

var fontFamily = 'Arial, sans-serif';

var options = {
    chart: {
        height: 300,
        type: "pie",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
            show: true,
        },
    },
    theme: {
        mode: 'light',
    },
    tooltip: {
        theme: 'light',
    },
    legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: fontFamily,
        itemMargin: {
            horizontal: 5,
            vertical: 4,
        },
    },
    stroke: {
        colors: ['rgba(0,0,0,0)'],
    },
    dataLabels: {
        enabled: true
    },
    series: [6405, 12, 2, 0, 0, 0, 0],
    labels: ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha','Konguchu','Aliran Kepercayaan'],
};

var chart = new ApexCharts(document.querySelector("#AgamaPenduduk"), options);
chart.render();
});

// Sarana Ibadah
$(function() {
    'use strict';
    var colors = {
        primary: '#008FFB',
        warning: '#FFB64D',
    };

var fontFamily = 'Arial, sans-serif';

var options = {
    chart: {
        height: 300,
        type: "pie",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
            show: true,
        },
    },
    theme: {
        mode: 'light',
    },
    tooltip: {
        theme: 'light',
    },
    legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: fontFamily,
        itemMargin: {
            horizontal: 8,
            vertical: 4,
        },
    },
    stroke: {
        colors: ['rgba(0,0,0,0)'],
    },
    dataLabels: {
        enabled: true
    },
    series: [9, 11, 0, 0, 0, 0],
    labels: ['Masjid', 'Surau/Mushola', 'Gerja Katholik', 'Gereja Kristen', 'Pure', 'Wihara'],
};

var chart = new ApexCharts(document.querySelector("#PrasaranaIbadah"), options);
chart.render();
});

// Tempat Olahraga

$(function() {
    'use strict';
    var colors = {
        primary: '#008FFB',
        warning: '#FFB64D',
    };

var fontFamily = 'Arial, sans-serif';

var options = {
    chart: {
        height: 300,
        type: "pie",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
            show: true,
        },
    },
    theme: {
        mode: 'light',
    },
    tooltip: {
        theme: 'light',
    },
    legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: fontFamily,
        itemMargin: {
            horizontal: 8,
            vertical: 4,
        },
    },
    stroke: {
        colors: ['rgba(0,0,0,0)'],
    },
    dataLabels: {
        enabled: true
    },
    series: [1, 2, 2, 0, 8],
    labels: ['Lapangan Sepak Bola', 'Lapangan Bulu Tangkis ', 'Meja Pingpong', 'Lapangan Tenis', 'Lapangan Voly'],
};

var chart = new ApexCharts(document.querySelector("#PrasaranaOlahraga"), options);
chart.render();
});

// Ekonomi
$(function() {
    'use strict';
    var colors = {
        primary: '#07071C',
    };

    var options = {
          series: [{
          data: [93, 398, 2, 98, 58, 806, 18, 1522,6,3,5,8,0,12,34,368,1,0,1,0,0,0,829,24,1387],
        }],
          chart: {
          type: 'bar',
          height: 450
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: false,
          }
        },
        dataLabels: {
          enabled: true
        },
        colors: [colors.primary],
        xaxis: {
          categories: ['Petani', 'Buruh Tani', 'Buruh migrant', 'PNS', 'Pengrajin industri rumah tangga', 'Wiraswasta', 'Peternak',
            'Mengurus Rumah Tangga','Montir','Dokter', 'Bidan', 'Perawat swasta', 'Pembantu rumah tangga ','TNI/POLRI', 'Pensiunan PNS/TNI/POLRI',
            'Pengusaha kecil dan menengah','Pengacara', 'Notaris', 'Dukun kampung terlatih', 'Jasa pengobatan alternatif', 'Dosen swasta', 'Pengusaha besar', 'Karyawan Swasta', 'Karyawan Pemerintah','Tidak/Belum Bekerja'
          ],
          labels: {
                style: {
                    margin: '25px',
                }
            }
        },
        tooltip: {
            theme: 'dark', // Menggunakan theme dark pada tooltip
            x: {
                show: true, // Menampilkan label x (kategori)
            },
            y: {
                formatter: function(val) {
                    return val; // Menampilkan nilai y (data) pada tooltip
                }
            },
            custom: function({ series, seriesIndex, dataPointIndex, w }) {
                return '<div class="tooltip-custom">' + series[seriesIndex][dataPointIndex] + ' Orang</div>';
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#EkonomiPenduduk"), options);
        chart.render();
    });