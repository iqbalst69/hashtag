<!--main content start--> 
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class="active"><a href="#"></i> Dashboard</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-info">
          <b>Selamat Datang </b>
          <p>Pengajuan proposal untuk dana DIPA Tahun Anggaran <?=date('Y')?> dibuka pada tanggal ...</p>
          <p>Format proposal dapat di Download pada menu dibawah ini.</p>
          <p><a href="" class="btn btn-default btn-sm">Download Proposal</a></p>
        </div>
      </div>
    </div>
    <div class="row" style="margin-bottom: 10px">
      <div class="col-md-12">
        <a href="<?=site_url('C_Peserta/page/create')?>" class="btn btn-info btn-sm">
          Buat Pengajuan Proposal
        </a>
      </div>
    </div>   
  
    <div class="row state-overview">
      <div class="col-md-12">
            <!-- <a href="<?=site_url('Dosen/index/penelitian')?>" class="btn btn-primary btn-sm" style="margin-bottom: 10px; ">Tambah Data</a> -->
        <div class="panel" id="panel">
          <div id="p-head" class="panel-heading">
            <h4>Daftar Pengajuan Poposal</h4>
          </div>
          <div class="panel-body">
            <div id="jumlah_penelitian"></div>
            <div class="table-responsive" >
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="data-tabel"></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- page end-->
  </section>
</section>

<!--main content end-->
<div class="modal fade" id="modalbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" id="embed">
      </div>
      <div class="modal-footer">
        <div id="button-footer"></div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#seacrh').on('click', function(event) {
    event.preventDefault();
    $('#skema').val();
    $('#judul').val();
  });    
  
  $('#data-tabel').on('mouseover','#aksi', function(event) {
      event.preventDefault();
      $('[data-toggle="popover"]').popover();
  });

  setInterval(function(){
    tampil_data();
  },1000);

  function tampil_data(){
    var data =''; var no = 1;
    $.ajax({
      url     : '<?=site_url('Dosen/get_penelitian')?>',
      type    : 'GET',
      dataType: 'json',
      success : function(data){
        $.each(data, function(i, d) {
          var log = 0; 
          $.ajax({
            url: '<?=site_url('Dosen/get_catatan/')?>'+d.id_penelitian,
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(data2){
              log = data2.length; var progress = 0; var sum_total = 0;
              $.each(data2, function(index, val) {
                $.each(val.anggaran, function(i2, d2) {
                  sum_total += parseInt(d2.total_pengeluaran);
                });
              });
              progres = (sum_total/d.dana_hibah)*100;
            }
          });

          var aksi ='';
          var ket ='';
          if (d.diterima == '1') {
            if ((d.proposal != '')&&(d.proposal != null)) {            
              aksi = '<a class="btn btn-success btn-sm" data-toggle="popover" data-trigger="hover"  data-content="Download Poposal"><i class="fa fa-cloud-download" onclick="modalshow('+d.id_penelitian+')"></i></a>';
            }
            aksi += '<a href="<?=site_url('Dosen/index/penelitian/')?>'+d.id_penelitian+'" data-toggle="popover" data-trigger="hover"  data-content="Detail Usulan Proposal" class="btn btn-sm btn-info" style="margin-left:5px"><i class="fa fa-book"></i></a>';
            ket = '<li>Jumlah Catatan Harian : '+log+'</li><li>Progres :'+Math.round(progres)+'%</li>';
          }else{
            ket  = '<b style="color:red">Proposal Belum di Review. <br>Harap Menunggu</b>';
            aksi ='<button class="btn btn-sm btn-default hapus" value = "'+d.id_penelitian+'">Batalkan</button>';
          }

          data += '<tr>'+
                '<td>'+no+'</td>'+
                '<td>'+
                  '<div style="font-weight:bold">'+d.judul_penelitian+'</div>'+
                  '<div>Skema '+d.skema+'</div>'+
                  '<div>'+convertdate(d.created)+'</div>'+
                '</td>'+
                '<td>'+
                    '<ul>'+
                      '<li>Dana Hibah : '+formatRupiah(d.dana_hibah, 'Rp. ')+'</li>'+
                      ket+
                    '</ul>'+
                  '</td>'+
                '<td id="aksi">'+
                  aksi+
                '</td>'+
              '</tr>';
          no++;
        });
        $('#data-tabel').html(data);
      }
    });
    // return false;
  }

  $('#data-tabel').on('click', '.hapus', function(event) {
    event.preventDefault();
    var id = $(this).attr('value');
    // alert(value );
    swal({ 
      title:"Konfimasi",
      text: "Hapus Data ?",
      icon: "warning",
      buttons: {
        cancel: "Batal",
        Hapus: true,
      },
    }).then((value) =>{
      switch(value){
        case "Hapus":
          $.ajax({
            url: '<?=site_url('Ajax/delete/penelitian/')?>'+id,
            type: 'GET',
            dataType: 'json',
            success: function(data){
              swal({
                title:"Berhasil",
                text: "Proposal telah dibatalkan",
                icon: "success",
                buttons: false,
                timer: 1000,      
              });
            }
          });
        break;        
      }});
  });


  function convertdate(dtvalue){
    var datestring = new Date(dtvalue);
    var d=new Date(datestring);
    return result = d.getDate() + '/' + (d.getMonth() +1) + '/' + d.getFullYear();
  }
  
  function modalshow(id){
    $.ajax({
      url     : '<?=site_url('Dosen/get_proposal_penelitian/')?>'+id,
      type    : 'GET',
      dataType: 'json',
      success : function(data){
        var embed   =  '<embed src = "<?=base_url()?>assets/upload/'+data.proposal+'" type = "application/pdf" width = "100%" height = "500px" />';
        var button  = '<a href="<?=site_url()?>Dosen/download/proposal/'+data.proposal+'" class="btn btn-success">Download</a>';
        button     += '<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>';
        $('#embed').html(embed);
        $('#modalbox').modal('toggle');
        $('#button-footer').html(button);
      }
    });
  }
</script>