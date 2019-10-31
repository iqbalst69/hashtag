<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <!--state overview start-->
  <!--state overview end-->
  
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li class=""> Dashboard</li>
        <li class="active"> Verifikasi Data Dosen</li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-7">
              <div class="row form-group">
                <div class="col-md-4"><label>Cari Berdasarkan</label></div>
                <div class="col-md-8">
                  <select id="" class="form-control">
                    <option>--Jabatan--</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-4"><label></label></div>
                <div class="col-md-8">
                  <select id="" class="form-control">
                    <option>--Pangkat--</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-4"><label></label></div>
                <div class="col-md-8">
                  <select id="" class="form-control">
                    <option>--Program Studi--</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="row form-group">
                <div class="col-md-2"><label>Nama</label></div>
                <div class="col-md-10">
                  <input type="" class="form-control" id="" name="">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-right">
              <button class="btn btn-danger btn-sm"><i class="fa fa-search"></i> Filter</button>
              <button class="btn btn-success btn-sm"><i class="fa fa-cloud-download"></i> Download Data Excel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">    
    <div class="col-lg-12 col-md-12">
      <div class="panel" style="border: 1px solid #d9edf7">
        <div class="panel-heading bg-info"><b>Data Peserta</b></div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Peserta</th>
                  <th>Status</th>
                  <th>Asal Prodi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="peserta"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </section>
</section>
<!--main content end-->

<script type="text/javascript">
  $('#peserta').on('click', '.verifikasi', function() {
    var id_peserta = $(this).attr('value');
    $.ajax({
      url     : '<?=site_url()?>Ajax/verifikasi/'+id_peserta,
      type    : 'GET',
      dataType: 'json',
      success : function(data){
        swal({ 
          title: "Verifikasi Berhasil",
          text : "Verifikasi Akun Telah Diverifikasi",
          icon : "success",
          buttons: {
            cancel: false,
            login: false,
          }});
        setTimeout(function(){  
          window.location.reload();
        },1100);
      }
    });
  });
  peserta();
  function peserta(){
    var peserta = '', no =1;
    $.ajax({
      url: '<?=site_url()?>Ajax/get/peserta',
      type: 'GET',
      dataType: 'json',
      success: function(data){
        $.each(data, function(i, d) {
          if(d.aktivasi == '0'){
            var akun = '<p style="font-weight: bold" class="text-danger">BELUM DIVERIFIKASI</p>';
            var menu = '<button class="btn btn-success btn-sm verifikasi" value="'+d.id_peserta+'"><i class="fa fa-check"></i></button>';
          }else{
            var akun = '<p style="font-weight: bold" class="text-success">AKUN AKTIF</p>';
            var menu = '<button class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>';
          }
          peserta += '<tr>'+
                      '<td>'+no+'</td>'+
                      '<td>'+
                        '<p style="font-weight: bold">'+d.nama+'</p>'+
                        '<p>'+d.ket_id+' '+d.id_peserta+'</p>'+
                      '</td>'+
                      '<td>'+
                        '<div><b  style="text-transform: uppercase;">'+d.status+'</b></div>'+
                        '<div> Golongan: '+d.jabatan+'</div>'+
                        '<div> Jabatan: '+d.golongan+'</div>'+
                      '</td>'+
                      '<td><b>'+d.nm_prodi+'</b></td>'+
                      '<td>'+akun+'</td>'+
                      '<td>'+
                        '<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>'+menu+
                      '</td>'+
                    '</tr>';
                    no++;
        });
        $('#peserta').html(peserta);
      }
    });
  }
</script>