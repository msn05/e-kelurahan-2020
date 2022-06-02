<div class="row">
 <div class="col-12">
  <div class="card">
    <div class="alert alert-danger mb-0" role="alert">
     <h4 class="mt-0 mb-4 text-danger"><i class="mdi mdi-alert-circle-outline mr-3"></i>Keterangan</h4>
     <h6 for="" class="mdi mdi-arrow-right text-dark">Jika kosong berarti belum diproses untuk disetujui</h6>
 </div>
</div>
</div>
</div>

<div class="row">
 <div class="col-12">
  <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-lg-3">
                <label for="email">Dari Tanggal</label>
                <input type="date" name="startdate" id="startdate" class="form-control">
            </div>
            <div class="form-group col-lg-3">
                <label for="email">Sampai</label>
                <input type="date" name="enddate" id="enddate" class="form-control">
            </div>
            <div class="form-group col-lg-3">
                <label for="email">Status</label>
                <select id="Status" name="Status" class="form-control" >
                    <option value="">Pilih Status</option>
                    <option value="diterima">Diterima</option>
                    <option value="ditolak">Ditolak</option>
                    <option value="NULL">Belum di Proses</option>
                </select>
            </div>
            <div class="form-group mt-4">
               <button type="submit" id="simpanPelayanan" class="btn btn-success waves-effect waves-light mt-1">Filter</button>
               <button type="submit" id="keseluruhanPelayanan" class="btn btn-info waves-effect waves-light mt-1">Seluruh Data</button>
           </div>
       </div>

   </div>
</div>
</div>
</div>

<div class="row">
 <div class="col-12">
  <div class="card">
    <div class="card-body">
        <h4 class="card-title">Halaman ini menampung data penggunaa tanda tangan lurah dalam pembuatan berkas surat keterangan.</h4>
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

  const role = <?=@$_SESSION['session_role'];?>;
  if(role === 2){

   $('#keseluruhanPelayanan').on('click',(function(e){
      $('#startdate').val(new Date())
      $('#enddate').val(new Date())
       $('#Status').val('');
       TabelFilter.ajax.reload();
   }));

   $('#simpanPelayanan').on('click',(function(e){
    e.preventDefault();
    let status = $('#Status').val();
    let start = $('#startdate').val();
    let end = $('#enddate').val();
    if(start != '' && end != '' && status != '')
            // console.log(start,end);
        TabelFilter.ajax.reload();
        else
         SwalError.fire({text: "Silakan Isi Form .!"})
 }));


   let TabelFilter =  $('.tabelrole').DataTable({
    "processing": true,
    "serverSide": true,
    "autoWidth": false,
    "scrollCollapse" : true,
    "scrollX": true,
    "scrollY":true,
    "ajax": {
     "url": "../../../api/request_signature_lurah/show_marriage.php",
     "type": "POST",
     "data": function ( d ) {
       return $.extend( {}, d, {
         "status": $('#Status').val(),
         "startdate": $('#startdate').val(),
         "enddate": $('#enddate').val()
     } );
   },
},

"aoColumns" : [
{ "data": "id_request", "title": "No", "name": "id_request","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
}},
{ "data": "code_printRSL", "title": "Kode Surat", "name": "code_printRSL" },
{ "data": "CreatedSurat", "title": "Tanggal Dibuat", "name": "CreatedSurat" },
{ "data": "SuratStatus", "title": "Status Surat", "name": "SuratStatus" },
{ "data": "NamaPemohon", "title": "Nama Pemohon", "name": "NamaPemohon" },
{ "data": "code_printRSL", "title": "RT / RW", "name": "code_printRSL" ,
"render" : function (data, type, rows) {
 return `${rows.RT} / ${rows.RW}`
}
},
{"data": "id_request", "title":"Aksi", "name":"id_request", "render": function(data,type,rows){
  return `<button id="setuju" value='${rows.id_request}' data-load="" class="btn btn-outline-success" title="Setujui"><i class="bx bx-check-double f"></i> Setuju</button>  <button id="tolak" value='${rows.id_request}' data-load="" class="btn btn-outline-danger" title="Tolak"><i class=" bx bx-window-close "></i> Tolak</button> <button id="ulangi" value='${rows.id_request}' data-load="" class="btn btn-outline-warning" title="Ulangi"><i class="  bx bx-pencil  "></i> Ulangi</button>`;
}
}
]
});

   $(document).on('click','#setuju',(function(){
    let data = {
     id_request  : $(this).val(),
     status 		: 'diterima'
 }; 

 Swal.fire({
     title: 'Anda Yakit?',
     text: 'Menyetujui penggunaan TTD pada pembuatan berkas ini.!',
     icon: 'warning',
     showCancelButton: true,
     confirmButtonText: 'Lanjutkan',
     cancelButtonText: 'Batalkan'
 }).then((result) => {
     if (result.isConfirmed) {

      $.ajax({
       type : 'POST',
       data : JSON.stringify(data),
       url  :  "../../../api/request_signature_lurah/marriage/update.php",
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

   $(document).on('click','#tolak',(function(){
    let data = {
     id_request  : $(this).val(),
     status 		: 'ditolak'
 }; 

 Swal.fire({
     title: 'Anda Yakit?',
     text: 'Tidak Menyetujui penggunaan TTD pada pembuatan berkas ini.!',
     icon: 'warning',
     showCancelButton: true,
     confirmButtonText: 'Lanjutkan',
     cancelButtonText: 'Batalkan'
 }).then((result) => {
     if (result.isConfirmed) {

      $.ajax({
       type : 'POST',
       data : JSON.stringify(data),
       url  : '../../../api/request_signature_lurah/marriage/update.php',
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

   $(document).on('click','#ulangi',(function(){
    let data = {
     id_request  : $(this).val(),
     status 		: ''
 }; 

 Swal.fire({
     title: 'Anda Yakit?',
     text: 'Untuk mengulang Menyetujui penggunaan TTD pada pembuatan berkas ini.!',
     icon: 'warning',
     showCancelButton: true,
     confirmButtonText: 'Lanjutkan',
     cancelButtonText: 'Batalkan'
 }).then((result) => {
     if (result.isConfirmed) {

      $.ajax({
       type : 'POST',
       data : JSON.stringify(data),
       url  : '../../../api/request_signature_lurah/marriage/update.php',
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

} else {
   SwalError.fire({text: "Anda Tidak memiliki Akses" }).then((respone)=>{window.location.href='index.php'});
}


} );
</script>