<body>
  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="<?=site_url()?>" class="logo">E-<span>Penelitian</span></a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="username">Akun</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended ">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" fa fa-user"></i> Profile</a></li>
                            <li><a href="<?=site_url()?>/Welcome/Logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="" href="">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?=base_url('C_Admin/page/penilaian')?>">
                            <i class="fa fa-file-text"></i>
                            <span>Daftar Usulan Proposal</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-list"></i>
                            <span>Master Data</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="<?=base_url('C_Admin/page/reviewer')?>">Data Reviewer</a></li>
                            <li><a  href="<?=base_url('C_Admin/page/prodi')?>">Data Prodi</a></li>
                            <li><a  href="<?=base_url('C_Admin/page/operator')?>">Data Operator Prodi</a></li>
                            <li><a  href="<?=base_url('C_Admin/page/jenis_belanja')?>">Data Jenis Belanja</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?=base_url('C_Admin/page/verifikasi')?>">
                            <i class="fa fa-user"></i>
                            <span>Verifikasi Data Peserta</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="">
                            <i class="fa fa-book"></i>
                            <span>Laporan Penelitian</span>
                        </a>
                        <ul class="sub">
                            <li><a href="<?=site_url('C_Admin/page/catatan_harian')?>">Catatan Harian</a></li>
                            <li><a href="<?=site_url('C_Admin/page/laporan_kemajuan')?>">Laporan Kemajuan</a></li>
                            <li><a href="<?=site_url('C_Admin/page/laporan_akhir')?>">Laporan Akhir</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-pencil"></i>
                            <span>Luaran</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="<?=site_url('C_Admin/page/jurnal')?>">Publikasi Jurnal</a></li>
                            <li><a  href="<?=site_url('C_Admin/page/pemakalah')?>">Pemakalah Forum ilmiah</a></li>
                            <li><a  href="<?=site_url('C_Admin/page/buku')?>">Buku Ajar / Teks</a></li>
                            <li><a  href="<?=site_url('C_Admin/page/hki')?>">Hak Kekayaan Intelektual</a></li>
                            <li><a  href="<?=site_url('C_Admin/page/lain')?>">Luaran Lainnya</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="">
                            <i class="fa fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=site_url()?>/Welcome/Logout">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>

      <!--sidebar end-->