<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <!-- <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"> -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/pnl.png">
    <!-- <link rel="shortcut icon" href="img/favicon.png"> -->

    <title>E Pelaporan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/flatlab/')?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url('assets/flatlab/')?>css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <!-- <link href="<?=base_url('assets/flatlab/')?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" /> -->
    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/flatlab/')?>css/style.css" rel="stylesheet">
    <link href="<?=base_url('assets/flatlab/')?>css/style-responsive.css" rel="stylesheet" />
    <style type="text/css">
      .login-body{
        background: url(<?=base_url('assets/img/background1.jpg')?>) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        /*height: 100%; */
      }
      .panel-body {
        max-width: 1000px;
        margin: 10px auto 0;
      }
      .head{
        margin: 50px auto 0; 
      }
      img.tengah{
        display: block;
        margin-left: auto;
        margin-right: auto;
        max-width: 100px;
      }
      .form-control{
        color: #484848;
      }
    </style>
</head>

  <body class="login-body">

    <div class="container">
      <div class="head">
        <img class="tengah" src="<?=base_url('assets/img/pnl.png')?>">
        <!-- <h3 style="text-align: center;color: white; text-transform: uppercase;padding-top: -20px;">Registrasi Akun</h3> -->
       </div>
      <div class="row" style="margin: 10px">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading" style="background-color: #41cac0; color: white;">
              <h3 style="text-align: center; font-weight: bold">Registrasi Akun Peserta Penelitian dan Pengabdian</h3>
            </div>
            <div class="panel-body">
                <div class="row form-group">
                  <div class="col-md-2"><label>Nama</label></div>
                  <div class="col-md-3"><input type="" name="" class="form-control" id="nama" placeholder="Nama Pendaftar..."></div>
                  <div class="col-md-2"><label>Daftar Sebagai</label></div>
                  <div class="col-md-2">
                    <select class="form-control" id="status">
                      <option value="" selected="" disabled="">--Status--</option>
                      <option value="Dosen">Dosen</option>
                      <option value="PLPI">PLPI</option>
                      <option value="Mahasiswa">Mahasiswa</option>
                    </select>
                  </div>
                </div> 
                <div class="row form-group">
                  <div class="col-md-2"><label id="id_label">NIDN</label></div>
                  <div class="col-md-3">
                    <input type="" name="" class="form-control" placeholder="NIDN Pendaftar..." id="id_peserta">
                    <input type="hidden" name="" class="form-control" id="ket_id" value="NIDN">
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-2"><label>Asal Prodi</label></div>
                  <div class="col-md-5">
                    <select class="form-control" id="id_prodi">
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-2"><label>Golongan</label></div>
                  <div class="col-md-3"><input type="" name="" class="form-control" disabled="" id="golongan" value=""></div>
                  <div class="col-md-2"><label>Jabatan</label></div>
                  <div class="col-md-2"><input type="" name="" class="form-control" disabled="" id="jabatan" value=""></div>
                </div>
                <div class="row form-group">
                  <div class="col-md-2"><label>Password Akun</label></div>
                  <div class="col-md-3"><input type="password" name="" class="form-control" id="pass"></div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-info" id="submit">Daftar</button>
                    <a href="<?=base_url()?>" class="btn btn-danger">Kembali</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url('assets/flatlab/')?>js/jquery.js"></script>
    <script src="<?=base_url('assets/flatlab/')?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/sweetalert/')?>sweetalert.min.js"></script>
  </body>
</html>
<script type="text/javascript">
  var option = '<option value="" selected="" disabled="">--Program Studi--</option>';
  $.ajax({
    url: '<?=site_url()?>Ajax/get/prodi',
    type: 'GET',
    dataType: 'json',
    success: function(data){
      $.each(data, function(i, d) {
        option += '<option value="'+d.id_prodi+'" >'+d.nm_prodi+'</option>'
      });
      $('#id_prodi').html(option);
    }
  });

  $('#status').on('change', function(event) {
    event.preventDefault();
    var stat = $(this).val();
    if(stat == 'Dosen'){
      $('#id_label').html('NIDN');
      $('#id_peserta').attr('placeholder', 'NIDN Pendaftar...');
      $('#golongan').removeAttr('disabled');
      $('#jabatan').removeAttr('disabled');
      $('#ket_id').val('NIDN');
    }else if(stat == 'Mahasiswa'){
      $('#id_label').html('NIM');
      $('#id_peserta').attr('placeholder', 'NIM Pendaftar...');
      $('#golongan').attr('disabled', 'disabled');
      $('#jabatan').attr('disabled','disabled');
      $('#ket_id').val('NIM');
    }else{
      $('#id_label').html('NIP');
      $('#id_peserta').attr('placeholder', 'NIP Pendaftar...');
      $('#golongan').removeAttr('disabled');
      $('#jabatan').removeAttr('disabled');
      $('#ket_id').val('NIP');
    }
  });

  $('#submit').on('click', function(event) {
    event.preventDefault();
    var nama = $('#nama').val();
    var status = $('#status').val();
    var id_peserta = $('#id_peserta').val();
    var id_prodi = $('#id_prodi').val();
    var golongan = $('#golongan').val();
    var jabatan = $('#jabatan').val();
    var pass = $('#pass').val();
    var ket_id = $('#ket_id').val();
    $.ajax({
      url: '<?=site_url()?>Ajax/add/peserta',
      type: 'POST',
      dataType: 'json',
      data: {
        nama: nama,
        status: status,
        id_peserta: id_peserta,
        id_prodi: id_prodi,
        golongan: golongan,
        jabatan: jabatan,
        pass: pass,
        ket_id: ket_id
      },
      success: function(data){
        swal({ 
          title  : "Sukses",
          text   : "Registrasi Berhasil",
          icon   : "success",
          buttons: false,
          timer: 1000,
        });
        setInterval(function(){
          window.location.href = '<?=base_url()?>';
        },1000);
      }
    });
  });
</script>