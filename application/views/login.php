<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <!-- <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina"> -->
    <link rel="shortcut icon" href="<?=base_url()?>assets/img/pnl.png">
    <!-- <link rel="shortcut icon" href="img/favicon.png"> -->

    <title>P3M</title>

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
      .form-signin {
        max-width: 500px;
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
        <!-- <h3 style="text-align: center;color: white; text-transform: uppercase;padding-top: -20px;">E-Lapor</h3> -->
       </div>
      <form class="form-signin" action="" method="post" id="submit">
        <h2 class="form-signin-heading"><b>Selamat Datang</b><br>Sistem Pelaporan Pertanggung Jawaban Pengabdian & Penelitian</h2>
        <div class="login-wrap has-warning">
            <input type="text" class="form-control " id="username" name="username" placeholder="Masukkan Username..." >
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password..." >
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Lihat Password
            </label>
            <div class="row">
              <div class="col-md-12">
                <a href="<?=site_url()?>Welcome/registrasi" class="btn btn-info" style="color: white" data-toggle="modal">Daftar Akun</a>
                <button type="submit" class="btn btn-danger" type="" style="color: white">Login</button>
              </div>  
            </div>
            <span style="font-style: italic; text-align: justify;">Belum memiliki Akun? Daftarkan akun anda terlebih dahulu</span>
        </div>
      </form>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url('assets/flatlab/')?>js/jquery.js"></script>
    <script src="<?=base_url('assets/flatlab/')?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/sweetalert/')?>sweetalert.min.js"></script>


  </body>
</html>
<script type="text/javascript">

  $('#submit').on('submit', function(event) {
    event.preventDefault();
    var username= $('#username').val();
    var password= $('#password').val();

    if((username == '')||(password =='')){
      swal({ 
            title: "Login Gagal",
            text: "Username dan Password tidak boleh kosong",
            icon: "error",
            buttons: {
              cancel: false,
              login: false,
            },
            timer : 1000,
        });
    }else{
      $.ajax({
        url         : "<?=site_url()?>Welcome/login",
        type        : "POST",
        data        : new FormData(this),
        contentType : false,
        cache       : false,
        processData : false,
        success     : function(data){
            if (data == 'null') {
              swal({ 
                title: "Login Gagal",
                text: "Username dan Password tidak sesuai",
                icon: "error",
                buttons: {
                  cancel: false,
                  login: false,
                },
                timer : 1000,
              });  
            }else{
              window.location.href = "<?=site_url('Welcome/Pindah')?>";
            }
        }
      });
    }
  });
</script>