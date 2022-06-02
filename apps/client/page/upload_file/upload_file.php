<div class="row">
 <div class="col-12">
  <div class="card">
   <div class="alert alert-danger mb-0" role="alert">
    <h4 class="mt-0 mb-4 text-danger"><i class="mdi mdi-alert-circle-outline mr-3"></i>Keterangan</h4>
    <h6 for="" class="mdi mdi-arrow-right text-dark">Silakan Cek Apakah berkas sudah lengkap</h6>
    <h6 for="" class="mdi mdi-arrow-right text-dark">Jika sudah Lengkap Silakan klik tombol warna biru yang bertuliskan <b>VERIFIKASI BERKAS UPLOAD WARGA</b></h6>
   </div>
  </div>
 </div>
</div>

<div class="row">
 <div class="col-lg-12">
  <div class="card">
   <div class="row">
    <div class="col-sm-12 py-2">
     <div class="card-body">
      <div class="card border border-primary">
       <div class="card-header bg-transparent border-primary">
        <h5 class="headname my-0 text-primary"><i class=" mdi mdi-folder-upload-outline  mr-4"></i>Upload Berkas</h5>
       </div>
       <div>
        <div class="card-body">
         <form id="InputUpload" enctype="multipart/form-data" method="POST">
          <div class="form-group row">
           <label for="example-text-input" class="col-md-4 col-form-label">Pilih Jenis File</label>
           <div class="col-md-8">
            <input type="hidden" name="id" id="id" value="">
            <select id="SelectStatus" name="SelectStatus" class="form-control  select2"></select>
            <!-- <label for="" class="form-control namaWarga"></label> -->
           </div>
          </div>
          <div class="form-group row">
           <label for="example-text-input" class="col-md-4 col-form-label">File</label>
           <div class="col-md-8">
            <input type="file" name="file" id="file" class="form-control">
            <!-- <label for="" class="form-control namaWarga"></label> -->
           </div>
          </div>
          <button type="submit" id="simpanUpload" title="Upload File" class="btn btn-outline-success"><i class="bx bx-save font-size-16 align-middle mr-2"></i> <b>Upload</b></button>
          <button  id="Selesai" title="Selesaikan Upload File" class="btn btn-outline-primary"><i class="  bx bx-log-in-circle  font-size-16 align-middle mr-2"></i> <b>Selesai</b></button>
         </form>
        </div>  
       </div>
      </div>
     </div>
    </div>
    <div class="col-sm-6 py-2">
     <div class="card h-100 card-body">
      <div class="card  h-100  border border-warning">
       <div class="card-header bg-transparent border-primary">
        <h5 class="headname my-0 text-primary"><i class=" mdi mdi-file-sync  mr-4"></i>Persyaratan Pelayanan</h5>
       </div>
       <div class="table-responsive">
        <table class="table mb-0">
         <thead>
          <tr>
           <th width="5%">#</th>
           <th>Nama File</th>
          </tr>
         </thead>
         <tbody id="Persyaratan"></tbody>
        </table>
       </div>
      </div>
     </div>
    </div>
    <div class="col-sm-6 py-2">
     <div class="card h-100 card-body">
      <div class="card h-100 border border-info">
       <div class="card-header bg-transparent border-primary">
        <h5 class="headname my-0 text-primary"><i class=" mdi mdi-file-sync  mr-3"></i>File Terupload</h5>
       </div>
       <div class="table-responsive">
        <table id="example" class="table mb-0" width="100%">
         <thead>
          <tr>
           <th width="5%">#</th>
           <th>Kode File</th>
           <th>Aksi</th>
          </tr>
         </thead>
         <tbody id="FileUpload"></tbody>
        </table>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>     

<script>
 $(document).ready(function(){
  $('#example').DataTable({
   "ordering": false,
   "info":     false,
   "paging":false,
   "searching":false,
   "responsive":true,
   "scrollX":true,
   "scrollY":true,
   "scrollCollapse":true,
   "autoWidth": true,

  });


  let id = "<?=$_GET['id'];?>";
  $('#id').val(id);
  $('#Selesai').val(id);
  let dataPersyaratan = {
   service_categori_id : "<?=$_GET['kode'];?>"
  };


  let dataFileUpload = {
   entrance_service_code : "<?=$_GET['id'];?>"
  };
  console.log(dataFileUpload);
  $.ajax({
   type        : "POST",
   data        : JSON.stringify(dataFileUpload),
   url         : '../../../api/file_manage/citizen_file/request.php',
   dataType    : 'json',
   proccessData: false,
   success : function(respone){
    let FileUpload = respone.data;
    for(var key in FileUpload){
     let htmls = '';
     let is = 1;
     for (var key in FileUpload){
      htmls += '<tr>'+
      '<td>'+is+++'</td>'+
      '<td><label>'+FileUpload[key]['name_file']+'</label></a></td>';
      htmls +=   '<td><button id="hapus" value="'+FileUpload[key]["id_file_manager"]+'" data-load="" class="btn btn-sm btn-outline-danger" title="Ganti"> Hapus</button> '+
      '<a href="../../../file_manager/file/'+FileUpload[key]['file']+'" target=_blank"><button class="btn btn-sm btn-outline-info"> Lihat</button></a>'+
      '</td>';
      '</tr>';
     }
     $('#FileUpload').html(htmls);
    }
   }
  });

  $('#InputUpload').submit(function(e){
   e.preventDefault();

   const id       = "<?=$_GET['id'];?>";
   const form     = $(this);
   const formData = new FormData(form[0]);
   const url      = '../../../api/file_manage/citizen_file/add.php';

   $.ajax({
    type        : "POST",
    url         : url,
    data        : formData,
    async       : false,
    cache       : false,
    contentType : false,
    enctype     : 'multipart/form-data',
    processData : false,
    success     : function(respone){
     SwalOk.fire({text: respone.messages})
     .then((respone)=>{
      location.reload(true)
     });

    },
    error:function(jqXHR, responseText, errorThrown){
     let msg = JSON.parse(jqXHR.responseText);
     SwalError.fire({text: msg.messages })                
    }
   });

  });

  $(document).on('click','#hapus',(function(){
   let data = {
    id_file_manager  : $(this).val(),
   }; 
   Swal.fire({
    title: 'Anda Yakit?',
    text: 'Data Tidak Bisa Dikembalikan.!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Lanjutkan',
    cancelButtonText: 'Batalkan'
   }).then((result) => {
    if (result.isConfirmed) {

     $.ajax({
      type : 'DELETE',
      data : JSON.stringify(data),
      url  : '../../../api/file_manage/citizen_file/delete.php',
      processData:false,
      dataType: "json",
      success: function (respone)
      {
       SwalOk.fire({text: respone.messages })
       .then((respone)=>{
        location.reload(true); 
       });
      },
      error:function(jqXHR, textStatus, errorThrown){
       let msg = JSON.parse(jqXHR.responseText);
       SwalError.fire({text: msg.messages })
      }

     });
    } else {
     Swal.fire(
      'Batal',
      'Anda Telah Membatalkan :)',
      'error'
      );
    }
   });

  }));


  let Select = $('#SelectStatus').select2();

  $.ajax({
   type    : "POST",
   data    : JSON.stringify(dataPersyaratan),
   url     : "../../../api/file_requietments/list_update.php",
   dataType:"json",
   proccessData: false,
   success : function(respone){
    let Persyaratan = respone.data;
    for (var key in Persyaratan) {
     data_id = Persyaratan[key]['id_file_requietmens'];
     dataText = Persyaratan[key]['name_file'];
     var option = new Option(dataText, data_id, true, true);
     Select.append(option).trigger('change');
    }

    let html = '';
    let i = 1;
    for (var key in Persyaratan){
     html += '<tr>'+
     '<td>'+i+++'</td>'+
     '<td><label>'+Persyaratan[key]['name_file']+' </label></td>'+
     '</tr>';
    }
    $('#Persyaratan').html(html);

   }
  });

  $('#Selesai').on('click',(function(e){
   e.preventDefault();
   let data = {
    id_file_manager  : $('#Selesai').val(),
    service_categori_id: "<?=$_GET['kode'];?>"

   }; 

   Swal.fire({
    title: 'Anda Yakit?',
    text: 'Sudah Mengupload Berkas Persyaratan.!',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Lanjutkan',
    cancelButtonText: 'Batalkan'
   }).then((result) => {
    if (result.isConfirmed) {

     $.ajax({
      type : 'POST',
      data : JSON.stringify(data),
      url  : '../../../api/message_entrance/add.php',
      processData:false,
      dataType: "json",
      success: function (respone)
      {
       SwalOk.fire({text: respone.messages })
       .then((respone)=>{
        window.location.href="index.php";
       });
      },
      error:function(jqXHR, textStatus, errorThrown){
       let msg = JSON.parse(jqXHR.responseText);
       SwalError.fire({text: msg.messages })
      }

     });
    } else {
     Swal.fire(
      'Batal',
      'Anda Telah Membatalkan :)',
      'error'
      );
    }
   });

  }));

 })

    // });

   </script>