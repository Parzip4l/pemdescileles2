@extends('layout.masteruser2')

@section('content')
<section class="page-title">
    <div class="auto-container">
        <div class="content">
            <h2>Demografi Desa</h2>
        </div>
    </div>
</section>

<!-- Pendidikan -->
<section class="demografi-pendidikan-wrap section-p2">
    <div class="auto-container">
        <div class="sec-title-two dark centered mb-6">
            <h3>Jumlah Penduduk</h3>
            <p>Berdasarkan data jumlah dari Dinas Kependudukan Dan Catatan sipil menunjukan bahawa jumlah warga desa Cileles adalah : </p>
        </div>
        <div class="item-demografi-wrap">
            <div class="row clearfix">
                <div class="col-md-8">
                    <div class="data-penduduk">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:16px!important;">Jumlah Kepala Keluarga</h6>
                                        <h4 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important;">2.150</h4>
                                        <p class="centered mb-0">Kepala Keluarga</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:16px!important;">LAKI-LAKI</h6>
                                        <h4 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important;">3.267</h4>
                                        <p class="centered mb-0">Jiwa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:16px!important;">Perempuan</h6>
                                        <h4 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important;">3.152</h4>
                                        <p class="centered mb-0">Jiwa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:16px!important;">Jumlah Total Penduduk</h6>
                                        <h4 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important;">6.419</h4>
                                        <p class="centered mb-0">Jiwa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:16px!important;">Kepadatan Penduduk</h6>
                                        <h4 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important;">338</h4>
                                        <p class="centered mb-0">Orang Per KM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title centered" style="font-family: 'Poppins', sans-serif!important; font-weight:500!important; font-size:14px!important;">Persentase Perkembangan Penduduk</h6>
                            <div id="PerkembanganPenduduk"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Penduduk Berdasarkan Umur -->
<section class="umur-penduduk section-p2">
    <div class="auto-container">
        <div class="sec-title-two dark centered mb-6">
            <h3>Struktur Penduduk Menurut Umur</h3>
            <p>Data Berdasarkan Disdukcapil Tahun 2023 </p>
        </div>
        <div id="UmurPenduduk"></div>
    </div>
</section>

<!-- Penduduk Berdasarkan Pendidikan -->
<section class="pendidikan-penduduk section-p2">
    <div class="auto-container">
        <div class="sec-title-two dark centered mb-6">
            <h3>Tingkat Pendidikan Penduduk</h3>
            <p>Data Pendidikan Penduduk Desa Cileles Berdasarkan Disdukcapil Bulan Agustus Tahun 2023 </p>
        </div>
        <div id="PendidikanPenduduk"></div>
    </div>
</section>

<!-- Sosial Budaya -->
<section class="sosial-budaya-penduduk section-p2">
    <div class="auto-container">
        <div class="sec-title-two dark centered mb-6">
            <h3>Keadaan Sosial dan Budaya</h3>
            <p>Kondisi karakteristik adat istiadat serta kearifan lokal masyarakat desa Cileles terbilang bersifat agamis dan kental dengan suasana kegotong-royongannya, sehingga
            segaa sesuatu yang berhubungan dengan desa diselesaikan melalui musyawarah
            mufakat. 
            </p>
        </div>
        <div class="item-sosial-budaya">
            <div class="row clearfix">
                <div class="col-md-4">
                    <div class="card">
                        <h6 class="card-title custom centered">Agama</h6>
                        <div id="AgamaPenduduk"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h6 class="card-title custom centered">Prasarana Peribadatan</h6>
                        <div id="PrasaranaIbadah"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <h6 class="card-title custom centered">Prasarana Olahraga</h6>
                        <div id="PrasaranaOlahraga"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Keadaan Ekonomi -->
<section class="ekonomi-penduduk section-p2">
    <div class="auto-container">
        <div class="sec-title-two dark centered mb-6">
            <h3 class="mb-2">Keadaan Ekonomi Penduduk Desa Cileles</h3>
            <p>Desa Cileles merupakan bagian dari kecamatan Jatinangor, yang mana Jatinangor
merupakan kecamatan yang ada kawasan industrinya, terlebih saat ini Jatinangor ada
wacana KPJ (Kawasan Perkotaan Jatinangor). Sebagian masyarakat desa Cileles
merasakan manfaat dari adanya kawasan industri tersebut dengan menjadi karyawan
pabrik, dan tentunya mengenai wacana Kawasan Perkotaan Jatinangor masyarakat
desa Cileles harus andil dalam perencanaan wacana pembangunan tersebut. Hal ini
sangat menunjang taraf hidup warga dibandingkan dengan beberapa tahun kebelakang
sebelum banyak pabrik dan projek strategis berdiri yang tentunya berimplikasi
terhadap perekonomian masyarakat. Meskipun pada kenyataannya persaingan untuk
mendapatkan kesempatan kerja tersebut cukup terbatas.
Kondisi ekonomi didalam desa Cileles cukup bervariasi, dan berikut adalah rincian
kondisi ekonomi masyarakat desa Cileles sebagai berikut:</p>
        </div>
        <div id="EkonomiPenduduk"></div>
    </div>
</section>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/customcharts.js') }}"></script>
@endpush