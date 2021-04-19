@extends('layouts.master')

@section('judul','Dashboard')

@section('content')

<style>
  .highcharts-figure,
  .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
  }

  #container {
    height: 400px;
  }

  .highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
  }

  .highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
  }

  .highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
  }

  .highcharts-data-table td,
  .highcharts-data-table th,
  .highcharts-data-table caption {
    padding: 0.5em;
  }

  .highcharts-data-table thead tr,
  .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
  }

  .highcharts-data-table tr:hover {
    background: #f1f7ff;
  }
</style>

@if(Auth()->user()->role == "super_admin" || Auth()->user()->role == "mini_admin")
<figure class="highcharts-figure">
  <div id="container"></div>
  <p class="highcharts-description">

  </p>
</figure>


<div class="col-lg-8">
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Keseluruhan Data Barang</strong>
    </div>
    <div class="card-body">

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tahun</th>
            <th scope="col">Jumlah Total Barang</th>
            @if(Auth()->user()->role == 'super_admin')
            <th scope="col">
              <button type="button" class="btn btn-outline-info mb-1" data-toggle="modal" data-target="#mediumModal">
                <i class="fa fa-calendar"></i>&nbsp;
                Tambah Data Tahun
              </button>
            </th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach($data as $dt)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$dt->tahun}}</td>
            <td>{{$dt->jumlah_total}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endif

@if(auth()->user()->role == 'admin_pegawai')
<div class="col">
  <div class="card">
    <div class="card-header">
      <strong class="card-title">Data Pegawai</strong>
    </div>
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr class="bg-success">
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">NIP</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($dataPegawai as $dtp)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$dtp->nama}}</td>
            <td>{{$dtp->nip}}</td>
            <td><a href="/detail-pegawai/{{$dtp->id}}" class="badge badge-info" data-toggle="modal" data-target="#dataPegawai{{$dtp->id}}">detail</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="dataPegawai{{$dtp->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Data {{$dtp->nama}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id">
          <center><img src="/images/images-pegawai/{{$dtp->gambar}}" class="rounded rounded-circle" widht="150px;" heigth="150px;" alt=""></center>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Nama</label>
              <input type="text" name="nama" class="form-control" readonly value="{{$dtp->nama}}" autocomplete="off" id="inputEmail4" placeholder="Nama">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">NIP</label>
              <input type="text" name="nip" class="form-control" readonly value="{{$dtp->nip}}" autocomplete="off" id="inputPassword4" placeholder="NIP">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">GOL PANGKAT</label>
              <input type="text" name="gol_pangkat" class="form-control" readonly value="{{$dtp->gol_pangkat}}" autocomplete="off" id="inputEmail4">
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">TMT PANGKAT</label>
              <input type="text" name="tmt_pangkat" class="form-control" readonly value="{{$dtp->tmt_pangkat}}" autocomplete="off" id="inputPassword4">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">NAMA JABATAN</label>
              <input type="text" name="nama_jabatan" class="form-control" readonly value="{{$dtp->nama_jabatan}}" autocomplete="off" id="inputEmail4">
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">TMT JABATAN</label>
              <input type="text" name="tmt_jabatan" class="form-control" readonly value="{{$dtp->tmt_jabatan}}" autocomplete="off" id="inputPassword4">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">TH MASA KERJA</label>
              <input type="text" name="th_mk" class="form-control" readonly value="{{$dtp->th_mk}}" autocomplete="off" id="inputEmail4">
            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">BI MASA KERJA</label>
              <input type="text" name="bi_mk" class="form-control" readonly value="{{$dtp->bi_mk}}" autocomplete="off" id="inputPassword4">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Nama Latihan Jabatan</label>
              <input type="text" class="form-control" autocomplete="off" readonly value="{{$dtp->nama_latihan_jabatan}}" name="nama_latihan_jabatan" id="inputCity">
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">BL Latihan Jabatan</label>
              <input type="text" class="form-control" readonly value="{{$dtp->bl_latihan_jabatan}}" autocomplete="off" name="bl_latihan_jabatan">
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Jml lthn Jabatan</label>
              <input type="text" name="jml_latihan_jabatan" readonly value="{{$dtp->jml_latihan_jabatan}}" autocomplete="off" class="form-control" id="inputZip">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Nama Pendidikan</label>
              <input type="text" class="form-control" readonly value="{{$dtp->nama_pendidikan}}" autocomplete="off" name="nama_pendidikan" id="inputCity">
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">Lulus Pendidikan</label>
              <input type="text" class="form-control" readonly value="{{$dtp->lulus_pendidikan}}" autocomplete="off" name="lulus_pendidikan">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputZip">Ijazah Pendidikan</label>
              <input type="text" name="ijazah_pendidikan" readonly value="{{$dtp->ijazah_pendidikan}}" autocomplete="off" class="form-control" id="inputZip">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="inputZip">Tanggal Lahir</label>
              <input type="text" name="tanggal_lahir" readonly value="{{$dtp->tanggal_lahir}}" autocomplete="off" class="form-control" id="inputZip">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4">CATATAN MUTASI KEPEG</label>
              <input type="text" name="ct_mutasi_kepeg" readonly value="{{$dtp->ct_mutasi_kepeg}}" autocomplete="off" class="form-control" id="inputEmail4">
            </div>

            <div class="form-group col-md-4">
              <label for="inputPassword4">CATATAN KETERANGAN</label>
              <input type="text" name="ct_keterangan" readonly value="{{$dtp->ct_keterangan}}" autocomplete="off" class="form-control" id="inputPassword4">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
  @endif

  <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mediumModalLabel">Tambah Data Tahun</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            <form action="/add-tahun" method="post">
              @csrf
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="select" class=" form-control-label">Tahun</label></div>
                <div class="col">
                  <input type="number" name="tahun" id="" autocomplete="off" class="form-control col-md-8" placeholder="masukan tahun">
                </div>
              </div>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="" class="btn btn-primary">Tambahkan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  @endsection

  @section('javascript')
  <script src="{{ asset('js/highcharts/accessibility.js')}}"></script>
  <script src="{{ asset('js/highcharts/export-data.js')}}"></script>
  <script src="{{ asset('js/highcharts/exporting.js')}}"></script>
  <script src="{{ asset('js/highcharts/highcharts.js')}}"></script>
  <script>
    Highcharts.chart('container', {

      chart: {
        type: 'column'
      },

      title: {
        text: 'Inventaris Barang - Fakultas Ilmu Pendidikan'
      },

      xAxis: {
        categories: <?php echo json_encode($tahun); ?>
      },

      yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
          text: 'Values'
        }
      },

      tooltip: {
        formatter: function() {
          return '<b>' + this.x + '</b><br/>' +
            this.series.name + ': ' + this.y + '<br/>';
        }
      },

      plotOptions: {
        column: {
          stacking: ''
        }
      },

      series: [{
        name: 'NON_PNBP',
        data: <?php echo json_encode($NON_PNBP); ?>
      }, {
        name: 'BPPTnbh',
        data: <?php echo json_encode($BPPTnbh); ?>
      }, {
        name: 'KERJASAMA',
        data: <?php echo json_encode($KERJASAMA); ?>
      }, {
        name: 'IGU',
        data: <?php echo json_encode($IGU); ?>
      }, {
        name: 'INTEGRASI',
        data: <?php echo json_encode($INTEGRASI); ?>
      }]
    });
  </script>
  @endsection