<div class="row">
 <div class="col-12">
  <div class="card">
   <div class="card-body">
    <div class="alert alert-info mb-0" role="alert">
      <h4 class="card-title">Halaman ini menampung data Role (Akses).</h4>
    </div>
   </div>
   <div class="card-body">
    <table id="datatable" class="tabelrole table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    </table>
   </div>
  </div>
 </div>
</div>
<script>
 $(document).ready( function () {

  $('.tabelrole').DataTable({
   "processing": true,
   "serverSide": true,
   "autoWidth": false,
   "ajax": {
    "url": "../../../api/role/show.php",
    "type": "POST"
   },
   "aoColumns" : [
   { "data": "id_role", "title": "No", "name": "id_role","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
   }},
   { "data": "name", "title": "Nama Role", "name": "name" },
   { "data": "created", "title": "Tanggal Dibuat", "name": "created" },
   {"data": "id_role", "title":"Aksi", "name":"id_role", "render": function(data,type,rows){
    return '<button id="hapus" value="'+rows["id_role"]+'" data-load="" class="btn btn-sm btn-danger text-white" title="Hapus Data"><i class="mdi mdi-trash-can "></i> Hapus</button>';
   }
  }
  ]
 });

  $(document).on('click','#hapus',(function(){
   let data = {
    id_role  : $(this).val(),
   }; 

   Swal.fire({
    title: 'Anda Yakit?',
    text: 'Data Tidak Bisa Dikembalikan.!',
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Lanjutkan',
    cancelButtonText: 'Batalkan'
   }).then((result) => {
    if (result.isConfirmed) {

     $.ajax({
      type : 'DELETE',
      data : JSON.stringify(data),
      url  : '../../../api/role/delete.php',
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


 } );
</script>