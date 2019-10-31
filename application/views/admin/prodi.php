<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <!--state overview start-->
  <!--state overview end-->
  <div class="row">
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li class=""> Dashboard</li>
        <li class=""> Master Data</li>
        <li class="active"> Data Prodi</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">  
      <div class="panel">
        <div class="panel-heading bg-info" id="heading"><b>Tambah Data</b></div> 
        <div class="panel-body">  
          <div class="row">
              <div class="col-md-12">
                <label>Program Studi</label>
              </div>
              <div class="col-md-12 form-group">
                <input type="text" id="nama_prodi" class="form-control">  
              </div>
              <div class="col-md-12">
                <button class="btn btn-success btn-sm" id="tambah">Simpan</button>
                <button class="btn btn-success btn-sm" id="edit" >Simpan</button>
                <button class="btn btn-danger btn-sm" id="btn-batal" type="reset">Batal</button>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="panel" style="border: 1px solid #d9edf7">
        <div class="panel-heading bg-info"><b>Data Progam Studi</b></div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Program Studi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="data">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
</section>
<!--main content end-->

<script type="text/javascript">
  $('#edit').hide();

  $('#tambah').on('click', function(event) {
    event.preventDefault();
    var nama_prodi = $('#nama_prodi').val();
    if(nama_prodi != ''){
      $.ajax({
        url         : "<?=site_url()?>Ajax/add/prodi",
        type        : "POST",
        data        : {nama_prodi: nama_prodi},
        success     : function(data){
          swal({ 
            title  : "Berhasil",
            text   : "Program Studi Baru Berhasil Ditambahkan",
            icon   : "success",
            buttons: false,
            timer: 1000,
          });
          setInterval(function(){
            window.location.reload();
          },1000);
        }
      })
    }else{
      swal({ 
        title  : "Gagal",
        text   : "Form Tidak Boleh Kosong",
        icon   : "error",
        buttons: false,
        timer: 1000,
      });
    }
  });

  $('#edit').on('click' , function(event) {
    var id = $(this).attr('value');
    var nama_prodi = $('#nama_prodi').val();
    event.preventDefault();
    $.ajax({
      url         : "<?=site_url()?>Ajax/edit/prodi/"+id,
      type        : "POST",
      data        : {nama_prodi: nama_prodi},
      success     : function(data){
        swal({ 
          title  : "Berhasil",
          text   : "Program Studi Telah Dirubah",
          icon   : "success",
          buttons: false,
          timer: 1000,
        });
        setInterval(function(){
          window.location.reload();
        },1000);
      }
    })
  });
  get_data();

  function get_data(){
    var no = 0, table = '';
    $.ajax({
      url     : '<?=site_url()?>Ajax/get/prodi',
      type    : 'GET',
      dataType: 'json',
      success : function(data){
         $.each(data, function(n, d) {
          no++;
          table += '<tr>'+
                    '<td>'+no+'</td>'+
                    '<td>'+d.nm_prodi+'</td>'+
                    '<td>'+
                      '<button class="btn btn-info btn-sm edit" value="'+d.id_prodi+'"><i class="fa fa-pencil"></i></button>'+
                      '<button value='+d.id_prodi+' class="btn btn-danger btn-sm del"><i class="fa fa-trash-o"></i></button>'+
                    '</td>'+
                  '</tr>';
        });
        $('#data').html(table);
      }
    });
  }
  $('#data').on('click', '.edit', function(event) {
    event.preventDefault();
    var id = $(this).attr('value');
    $('#tambah').hide();
    $('#edit').show().attr('value', id);
    $.ajax({
      url     : '<?=site_url()?>Ajax/get/prodi_id/'+id,
      type    : 'GET',
      dataType: 'json',
      success : function(data){
        $('#nama_prodi').val(data.nm_prodi);
      } 
    });
  });

  $('#btn-batal').on('click', function(event) {
    event.preventDefault();
    $('#nama_prodi').val('');
    $('#tambah').show();
    $('#edit').hide().removeAttr('value');
  });

  $('#data').on('click', '.del', function(event) {
    event.preventDefault();
    /* Act on the event */
    var id = $(this).attr('value');
    swal({ 
      title: "Peringatan",
      text: "Hapus Data ini ?",
      icon: "warning",
      buttons: {
        cancel: "Batal",
        Hapus: true,
      },
    }).then((value) =>{
      switch(value){
        case "Hapus":
          $.ajax({
            url     : '<?=site_url('Ajax/del/prodi/')?>'+id,
            type    : 'GET',
            dataType: 'json',
            success : function(data){
              swal({ 
                title  : "Berhasil",
                text   : "Program Studi Baru Berhasil Dihapus",
                icon   : "success",
                buttons: false,
                timer: 1000,
              });
              setInterval(function(){
                window.location.reload();
              },1000);
            }
          });
        break;
      }
    });
  });
</script>