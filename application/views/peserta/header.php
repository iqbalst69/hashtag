<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/pnl.png">

    <title>Sistem Penelitian</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/flatlab/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/flatlab/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?=base_url()?>assets/flatlab/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!--<link href="<?=base_url()?>assets/flatlab/css/navbar-fixed-top.css" rel="stylesheet">-->

      <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/flatlab/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/flatlab/css/style-responsive.css" rel="stylesheet" />
     <!-- COPI DARI SINI -->
    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/set2.css" /> -->
    <style type="text/css"> 
      #tombol:hover{
        transition: all 0.3s linear;
        background: transparent;
        border-color: #00b297;
        color: #00b297;
      }
      img#gambar:hover{
        opacity: 0.4;
        filter: alpha(opacity=40);
        -webkit-transition: all 0.3s linear;
        transition: all 0.3s linear;
      } 
      #panel{
        border: solid 1px #7B66FB;
      }
      #panel #p-head{
        background: #7B66FB;
        color: white;
      }
      .btn-danger{
        background-color: red;
      }
      
      #p-cari{
        padding-left: 40px;padding-right: 40px; padding-top: 20px; padding-bottom: 10px;
      }
      .full-width .nav > li > a:hover, .full-width .nav  li.active a, .full-width .nav li.dropdown a:hover , .full-width .nav li.dropdown.open a:focus, .full-width .nav .open > a, .full-width  .nav .open > a:hover, .full-width  .nav .open > a:focus{
          background-color: #7B66FB;
          text-decoration: none;
          color: #fff;
          transition: all 0.3s ease 0s;
          -webkit-transition: all 0.3s ease 0s;
      }
      .form-control{
        color: black
      }
      #button :hover{
        color: #7B66FB;
      }
      #logout{
        background-color: #7B66FB;
        color: white;
        font-size: 12px;
      }
    </style>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url()?>assets/flatlab/js/jquery.js"></script>
    <script src="<?=base_url()?>assets/flatlab/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url()?>assets/flatlab/js/jquery.dcjqaccordion.2.7.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/flatlab/js/hover-dropdown.js"></script>
    <script src="<?=base_url()?>assets/flatlab/js/jquery.scrollTo.min.js"></script>
    <!-- <script src="<?=base_url()?>assets/flatlab/js/jquery.nicescroll.js" type="text/javascript"></script> -->
    <script src="<?=base_url()?>assets/flatlab/js/respond.min.js" ></script>
    <script src="<?=base_url('assets/')?>formatRupiah.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/sweetalert/')?>sweetalert.min.js"></script>
    <script type="text/javascript">
      function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
    </script>

  </head>

  <body class="full-width">

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="fa fa-align-justify" style="font-size: 16px"></span>
              </button>

              <!--logo start-->
              <a href="<?=site_url()?>" class="logo" >
                <span><i class="fa fa"></i></span></a>
              <!--logo end-->
              <div class="horizontal-menu navbar-collapse collapse ">
                  <ul class="nav navbar-nav">
                      <li class=""><a href="<?=site_url()?>C_Peserta/page/home">Dashboard</a></li>
                      <!-- <li class=""><a href="">Catatan Harian</a></li> -->
                      <li class=""><a href="">Catatan Harian</a></li>
                      <li class=""><a href="">Laporan Kemajuan</a></li>
                      <li class=""><a href="">Laporan Akhir</a></li>
                      <li class="dropdown">
                          <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle"  href="#">Luaran <b class=" fa fa-angle-down"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="<?=site_url('Dosen/index/jurnal')?>">Publikasi Jurnal</a></li>
                              <li><a href="<?=site_url('Dosen/index/pemakalah')?>">Pemakalah Forum Ilmiah</a></li>
                              <li><a href="<?=site_url('Dosen/index/buku_ajar')?>">Buku Ajar/Teks</a></li>
                              <li><a href="<?=site_url('Dosen/index/hki')?>">Hak Kekayaan Intelektual</a></li>
                              <!-- <li><a href="<?=site_url('Dosen/index/lain')?>">Luaran Lain</a></li> -->
                          </ul>
                      </li>
                      <li class=""><a href="">Profile</a></li>
                  </ul>
              </div>
              <div class="top-nav ">
                  <ul class="nav pull-right top-menu">
                      <!-- user login dropdown start-->
                      <li class="dropdown">
                          <a class="dropdown-toggle" href="<?=site_url('Welcome/Logout')?>" id="logout"> Log Out
                          </a>
                      </li>
                      <!-- user login dropdown end -->
                  </ul>
              </div>

          </div>

      </header>