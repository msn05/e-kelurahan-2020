<div class="row">
 <div class="col-12">
  <div class="card">
    <div class="alert alert-info mb-0" role="alert">
     <h4 class="card-title">Halaman ini menampung data Warga (Public) yang dapat mengakses sistem E-kelurahan ini.</h4>
   </div>
 </div>
</div>
</div>

<div class="row">
 <div class="col-12">
  <div class="card">
   <div class="card-body">
    <table id="datatable" class="tabelWarga table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    </table>
  </div>
  <div class="col-sm-6 col-md-4 col-xl-3">
   <div class="my-4 ">
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-sm">
      <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title mt-0" id="mySmallModalLabel">Form Aktivasi</h5>
      </div>
      <div class="modal-body" id="Form">
        <div class="row">
         <div class="col-md-12">
          <div class="form-group position-relative">
           <label>Emails</label>
           <div class="input-group">
            <input type="hidden" name="id_users" id="id_users" class="form-control form-control-sm"  required="">
            <input type="text" name="username" id="username" class="form-control form-control-sm"  required="">
          </div>
        </div>
        <div class="form-group position-relative">
         <div id="passwordGanti">
          <label>Password</label>
          <div class="input-group">
           <input type="password" name="password" id="password" class="form-control form-control-sm"  required="">
         </div>
       </div>
       <div id="nonaktif">
        <label>Status Akun</label>
        <select id="Status" class="form-control form-control-sm" >
         <option value="">Pilih</option>
         <option value="Aktif">Aktif</option>
         <option value="Tidak Aktif">Tidak Aktif</option>
       </select>
     </div>
   </div>
   <button type="submit"  class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Simpan</button>
 </div>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script>
 $(document).ready( function () {
  const Role = <?=$_SESSION['session_role'];?>;
  $('.tabelWarga').DataTable({
   "processing": true,
   "serverSide": true,
   "autoWidth": false,
   "responsive":true,
   "scrollX":true,
   "scrollY":true,
   "scrollCollapse":true,
   "ajax": {
    "url": "../../../api/data_users/public/request.php",
    "type": "POST"
  },
  "aoColumns" : [
  { "data": "id_users", "title": "No", "name": "id_users","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
  }},
  { "data": "username", "title": "Username", "name": "username" },
  { "data": "full_name", "title": "Nama", "name": "full_name" },
  { "data": "status", "title": "Status", "name": "status" },
  { "data": "phone_number", "title": "Nomor Hp", "name": "phone_number" },
  {"data": "id_users", "title":"Aksi", "name":"id_users", "render": function(data,type,rows){
   if (Role === 2){
    return ``;
  }else{
    if (rows.Statusnya == 'Tidak Aktif' )
     return`
   <a href="#" id="openModalLink"  
   data-id="${rows.id_users}"
   data-username = "${rows.full_name}"
   data-status = "${rows.Statusnya}"
   class="btn btn-outline-danger waves-effect waves-light btn-xs "  
   title=" Aktifkan" 
   data-toggle="modal" >
   <span class=" mdi mdi-lock-question"></span>Aktifkan</a>`;
   else
    return`
  <a href=?Halaman=public&Aksi=info&if=DE&id=${rows.id_users}>
  <button type="button" class="btn btn-outline-info btn-xs waves-effect waves-light" title="Lihat data"><span class="mdi mdi-account-edit-outline"></span>Lihat Data</button></a>   
  <a href="#" id="openModalLink" 
  data-id="${rows.id_users}"
  data-username = "${rows.full_name}"
  data-status = "${rows.Statusnya}"
  class=" btn btn-outline-warning waves-effect waves-light btn-xs " 
  data-toggle="modal" title="Non Aktifkan">
  <span class=" mdi mdi-lock-question"></span>Non Aktifkan

  </a> <a href="#" id="passwordEmail" 
  data-id='${rows.id_users}'
  data-username='${rows.username}' 
  data-toggle="modal" 
  class=" btn btn-outline-danger waves-effect waves-light" 
  title="Ubah Password & Email">
  <span class=" mdi mdi-onepassword"></span> Ubah Password & Email</a>`;
}

}
}
]
});
  $(document).on('click','#openModalLink',(function(e) {
    e.preventDefault();
    let id_users = $(this).data('id');     
    let username = $(this).data('username');     
    let status = $(this).data('status');     

    $('#id_users').val(id_users);
    $('#username').val(username);
    $('#Status').val(status).change();
    $('#Form button').attr( 'id', 'UbahAktivasi' );

    $('.bs-example-modal-sm').modal('show');
    $('#passwordGanti').empty();
  }));
  $(document).on('click','#UbahAktivasi',(function(e){
   e.preventDefault();
   let dataAktivasi = {
    id_users : $('#id_users').val(),
    status   : $('#Status').val()
  }
  console.log(dataAktivasi);
  $.ajax({
    type    : 'POST',
    data    : JSON.stringify(dataAktivasi),
    url     : '../../../api/users/activition.php',
    processData:false,
    dataType : 'json',
    success: function (respone)
    {
     SwalOk.fire({text: respone.messages})
     .then((respone)=>{
      location.reload(true)
    });
   },
   error:function(jqXHR, textStatus, errorThrown){
     let msg = JSON.parse(jqXHR.responseText);
     SwalError.fire({text: msg.messages })
   }
 });
}));

  $(document).on('click','#passwordEmail',(function(e) {
   e.preventDefault();

   let id_users = $(this).data('id');  
   let username = $(this).data('username');  
   $('#id_users').val(id_users);
   $('#username').val(username);
   $('#Form button').prop( 'id', 'ubahEmailPassword' );

   $('.bs-example-modal-sm').modal('show');
   $('#nonaktif').empty();     
 }));

  $(document).on('click','#ubahEmailPassword',(function(e){
   e.preventDefault();
   let dataPassword  = {
    id_users : $('#id_users').val(),
    username : $('#username').val(),
    password : $('#password').val()
  };
  $.ajax({
    type    : 'POST',
    data    : JSON.stringify(dataPassword),
    url     : '../../../api/users/update_users_account.php',
    processData:false,
    dataType : 'json',
    success: function (respone)
    {
     SwalOk.fire({text: respone.messages})
     .then((respone)=>{
      location.reload(true)
    });
   },
   error:function(jqXHR, textStatus, errorThrown){
     let msg = JSON.parse(jqXHR.responseText);
     SwalError.fire({text: msg.messages })
   }
 });

}));



} );
</script>