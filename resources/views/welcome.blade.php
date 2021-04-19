<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="{{ asset('images/gambar.png')}}" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">

  <title>FIP | DigitalData</title>
</head>

<body style="background: url({{asset('images/background.jpeg')}});">
  <!-- Image and text -->
  <nav class="navbar navbar-light bg-green" style="background-color:#228B22;">
    <a class="navbar-brand" href="#">
      <img src="{{asset('images/gambar.png')}}" width="50" height="50" class="mr-2 d-inline-block align-top" alt="" loading="lazy">
      Universitas Pendidikan Indonesia - Fakultas Ilmu Pendidikan
    </a>
  </nav>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Welcome To Application!</h1>
      <p class="lead">Aplikasi ini dimiliki dan dikelola oleh Fakultas Ilmu Pendidikan ,Universitas Pendidikan Indonesia</p>
      <hr class="my-4">
      <p>Terdapat 2 akses untuk menggunakan aplikasi ini.</p>
      <div class="content">
        <a href="/login/{{'Inventaris Barang'}}" class="btn btn-lg btn-outline-info">Inventaris Barang</a>
        <a href="/login/{{'Data Kepegawaian'}}" class="btn btn-lg btn-outline-info">Data Kepegawaian</a>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/main.js')}}"></script>
  <script src="{{ asset('vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
  <script src="{{ asset('js/dashboard.js')}}"></script>
  <script src="{{ asset('js/widgets.js')}}"></script>
  <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
  <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
  <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
</body>

</html>