@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('esip')}}">ESIP</a></li>
    <li class="breadcrumb-item active" aria-current="page">SKDN</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="container-fluid d-flex justify-content-between">
          <div class="col-lg-3 ps-0">
            <img src="{{asset('assets/images/logobaru.png')}}" alt="" title="">
            <h6 class="fw-bold text-uppercase text-start mt-4 mb-2">LAPORAN PENIMBANGAN BULANAN DI POSYANDU<br>WILAYAH UPTD PUSKESMAS JATINANGOR</h6>
            <h6 class="fw-bold text-uppercase text-start mt-4 mb-2">Bulan Agustus</h6>

            <div class="data-umum mt-4">
                <div class="hedaer-title mb-2">
                    <h5>I. UMUM</h5>
                </div>
                <div class="item d-flex justify-content-between">
                    <div class="col-lg-2">
                        <p>Posyandu</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-start">: Posyandu 1</p>
                    </div>
                </div>
                <div class="item d-flex justify-content-between">
                    <div class="col-lg-2">
                        <p>Desa</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-start">: Cileles</p>
                    </div>
                </div>
                <div class="item d-flex justify-content-between">
                    <div class="col-lg-4">
                        <p>Petugas Pembina</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-start">: Anonym</p>
                    </div>
                </div>
                <div class="item d-flex justify-content-between">
                    <div class="col-lg-4">
                        <p>Jumlah Penduduk</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-start">: 6.419</p>
                    </div>
                </div>
                <div class="item d-flex justify-content-between">
                    <div class="col-lg-4">
                        <p>Jumlah Kader</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-start">: 8</p>
                    </div>
                </div>
                <div class="item d-flex justify-content-between">
                    <div class="col-lg-8">
                        <p>Jumlah Kader Aktif Bulan Ini</p>
                    </div>
                    <div class="col-lg-4">
                        <p class="text-start">: 8</p>
                    </div>
                </div>
            </div>
          </div>
          <div class="col-lg-6 pe-0">
            <p class="text-end mb-1">Penimbangan Dilakukan Pada Tanggal</p>
            <h4 class="text-end fw-normal">18 Agustus 2024</h4>
          </div>
        </div>
        
        <!-- The Form Section -->
        <div class="container-fluid mt-5 w-100">
          <h5>II. KEGIATAN</h5>
          <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">KEGIATAN</th>
                <th colspan="2">0-5 Bln</th>
                <th colspan="2">6-11 Bln</th>
                <th colspan="2">12-23 Bln</th>
                <th colspan="2">24-59 Bln</th>
            </tr>
            <tr>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
            </tr>
        </thead>
        <tbody>
            <!-- Row 1 -->
            <tr>
                <td>1</td>
                <td>Jumlah semua balita yang ada di kelompok penimbangan bulan ini</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <!-- Row 2 -->
            <tr>
                <td>2</td>
                <td>Jumlah balita yang terdaftar dan mempunyai KMS bulan ini</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <!-- Row 3 -->
            <tr>
                <td>3</td>
                <td>Jumlah balita yang naik berat badannya bulan ini</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Jumlah balita yang tidak naik berat badannya 1 kali</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Jumlah balita yang tidak naik berat badannya 2 kali berturut-turut</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Jumlah balita yang ditimbang bulan ini, tapi tidak ditimbang bulan lalu</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Jumlah balita yang baru pertama kali hadir di penimbangan bulan ini</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Jumlah balita yang ditimbang bulan ini (03 + 04 + 05 + 06 + 07)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Jumlah balita yang tidak hadir di penimbangan bulan ini </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Jumlah balita yang ada di Bawah Garis Merah bulan ini : Lama</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Jumlah balita yang ada di Bawah Garis Merah bulan ini : Baru</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Jumlah sasaran baduta Gakin </td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
            </tr>
            <tr>
                <td>12</td>
                <td>Jumlah sasaran baduta Gakin yang BGM</td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
            </tr>
            <tr>
                <td>13</td>
                <td>Jumlah sasaran baduta Gakin yang mendapat MP-ASI</td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
            </tr>
            <tr>
                <td>14</td>
                <td>Jumlah Bayi (6 - 11 bln) yang menerima Vitamin A Bulan Februari/ Agustus</td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td></td>
                <td></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
            </tr>
            <tr>
                <td>15</td>
                <td>Jumlah Bayi (12 - 59 bln) yang menerima Vitamin A Bulan Februari/ Agustus</td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>16</td>
                <td>Jumlah bayi 0 - 6 bulan</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
            </tr>
            <tr>
                <td>17</td>
                <td>Jumlah bayi 0 - 6 bulan yang mendapat ASI Eksklusif</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
                <td class="black-cell"></td>
            </tr>
            <tr>
                <td>18</td>
                <td>Jumlah ibu hamil yang mendapat tablet tambah darah ( Fe 1 )</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <!-- Example for rows with blank spaces -->
            <tr>
                <td>19</td>
                <td>Jumlah ibu hamil yang mendapat tablet tambah darah ( Fe 3)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>20</td>
                <td>Jumlah Bumil KEK LILA = 23.5 cm Baru</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Jumlah Bumil KEK LILA = 23.5 cm Lama</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </table>
          </div>
          <div class="row">
            <div class="col-md-12">
                <div class="data-umum mt-4">
                    <div class="hedaer-title mb-2">
                        <h5>III. PERSEDIAAN BAHAN-BAHAN</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Bahan Bahan</th>
                                    <th>Sisa Bulan Lalu</th>
                                    <th>Diterima Bulan Ini</th>
                                    <th>Dikeluarkan Bulan Ini</th>
                                    <th>Sisa Akhir Bulan Ini</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>KMS (Lembar)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Oralit (Bungkus)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Vitamin A (Kapsul)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tablet Tambah Darah (Biji)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
          
          
          <h5 class="mt-5">IV. Keterangan lain yang perlu dicatat</h5>
          <div class="form-group">
            <label>Tanggal Pencatatan</label>
            <input type="date" name="record_date" value="{{ old('record_date') }}" class="form-control">
          </div>
          <div class="form-group mt-3">
            <label>Ket. Kader Posyandu</label>
            <input type="text" name="kader_posyandu" value="{{ old('kader_posyandu') }}" class="form-control">
          </div>
        </div>
        <div class="container-fluid w-100">
          <a href="javascript:;" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="download" class="me-3 icon-md"></i>Download</a>
          <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer" class="me-2 icon-md"></i>Print</a>
        </div>
      </div>
        
    </div>
  </div>
</div>
@endsection
<style>
    th:first-child {
            text-align: center;
            vertical-align: middle;
        }
    th:nth-child(2) {
        text-align: center;
        vertical-align: middle; /* This ensures "KEGIATAN" is vertically centered */
    }
    td:first-child {
        text-align:center;
    }
    td {
        font-size : 12px;
    }
    .black-cell {
            background-color: #000!important;
        }
</style>