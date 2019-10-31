<!--main content start--> 
<section id="main-content">
  <section class="wrapper">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li class=""><a href="#"></i> Dashboard</a></li>
          <li class="active"><a href="#"></i> Usulan Proposal</a></li>
        </ul>
      </div>
    </div>
              
    <div class="row state-overview">
      <div class="col-md-5">
        <div class="panel">
          <div class="panel-heading bg-primary">
            <h4>Anggota Penelitian/Pengabdian</h4>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="" placeholder="Nama Anggota..." id="nama_anggota" name="" class="form-control">
              </div>
              <div class="col-md-4 form-group">
                <select class="form-control" id="status_anggota">
                  <option selected="" value="" disabled="">-- Status --</option>
                  <option value="Dosen">Rekan Dosen</option>
                  <option value="Mahasiswa">Mahasiswa</option>
                </select>
              </div>
              <div class="col-md-2 form-group">
                <button class="btn btn-info btn-block btn-sm" id="tmbh_anggota">Tambah</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-stripped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td><?=$nama?></td>
                        <td>Ketua Penelitian</td>
                        <td></td>
                      </tr>
                    </tbody>
                    <tbody id="anggota"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <form action="" method="POST" enctype="multipart/form-data" id="simpan">
          <div class="panel" id="">
            <div class="panel-body">              
              <div class="row form-group">
                <div class="col-md-2"><label>Pengusul</label></div>
                <div class="col-md-3"><p><?=$nama?></p></div>
              </div>
              <div class="row form-group">
                <div class="col-md-2"><label>Skema </label></div>
                <div class="col-md-5">
                  <select class="form-control" id="skema" name="skema">
                    <option disabled="" selected="" value="">-- Pilih Skema --</option>
                    <option value="Penelitian Dasar">Penelitian Dasar</option>
                    <option value="Penelitian Terapan">Penelitian Terapan</option>
                    <option value="Penelitian PLP">Penelitian PLP</option>
                    <option value="Penelitian Mahasiswa">Penelitian Mahasiswa</option>
                    <option value="Pengabdian Kepada Masyarakat">Pengabdian Kepada Masyarakat</option>
                    <option value="Pengabdian Desa Binaan">Pengabdian Desa Binaan</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-2"><label>Dana Yang Diusulkan</label></div>
                <div class="col-md-3">
                  <input type="number" class="form-control" id="dana" placeholder="Rp." name="dana"></input>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-2"><label>Judul </label></div>
                <div class="col-md-10">
                  <input type="" class="form-control" id="jdl_proposal" name="jdl_proposal" maxlength="60" placeholder="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-2"><label>Abstrak</label></div>
                <div class="col-md-10">
                  <textarea class="form-control" id="abstrak" name="abstrak" rows="3" maxlength="500"></textarea>
                  <p style="font-style: italic;color: red">Abstrak tidak lebih dari 500 Kata</p>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-2"><label>Unggah File</label></div>
                <div class="col-md-6">
                  <input type="file" name="file" class="form-control">
                  <div class="text-danger"><i>*File dalam bentuk PDF</i> <i>*File proposal maksimal 5MB</i></div>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" value="Submit Proposal" id="submit" class="btn btn-primary btn-sm btn-block">
        </form>
      </div>

      
    </div>
  
    <!-- page end-->
  </section>
</section>

<script type="text/javascript">
  setInterval(function(){
    angg(); 
  },1000);

  function angg(){
    var id = '<?=$id_peserta?>';
    var no = 2, angg = '';
    $.ajax({
      url: '<?=site_url()?>Ajax/get/anggota/'+id,
      type: 'GET',
      dataType: 'json',
      success: function(data){
        $.each(data, function(i, d) {
          angg += '<tr>'+
              '<td>'+no+'</td>'+
              '<td>'+d.nm_anggota+'</td>'+
              '<td>'+d.stat_anggota+'</td>'+
              '<td><button class="remove" id="" val="'+d.id_tmp+'"><i class="fa fa-times"></i></button></td>'+
            '</tr>';
            no++;
        });
        $('#anggota').html(angg);
      }
    });
  }
  
  $('#tmbh_anggota').on('click', function(event) {
    event.preventDefault();
    var nama   = $('#nama_anggota').val();
    var status = $('#status_anggota').val();
    var id     = '<?=$id_peserta?>';
    $.ajax({
      url     : '<?=site_url()?>Ajax/add/anggota/'+id,
      type    : 'POST',
      dataType: 'json',
      data    : {nama: nama, status: status},
      success : function(data){
        $('#nama_anggota').val('');
        $('#status_anggota').val('');
      }
    });
  });     

   $('#anggota').on('click', '.remove', function() {
    var id = $(this).attr('val'); 
      $.ajax({
        url     : '<?=site_url()?>Ajax/del/anggota/'+id,
        type    : 'GET',
        dataType: 'json',
        success : function(data){
        }
      });
    });


    $('#simpan').on('submit', function(event) {
      var id     = '<?=$id_peserta?>';
      event.preventDefault();
        $.ajax({
        url         : "<?=site_url()?>Ajax/add/proposal/"+id,
        type        : "POST",
        data        : new FormData(this),
        contentType : false,
        cache       : false,
        processData : false,
        success     : function(data){
          console.log(data);
        }  
      });
    });   
</script>

