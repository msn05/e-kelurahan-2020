<div class="row">
  <div class="col-lg-12">
    <div class="card">
        <div class="alert alert-danger mb-0" role="alert">
            <h4 class="mt-0 mb-4 text-danger"><i class="mdi mdi-alert-circle-outline mr-3"></i>Keterangan</h4>
            <h6 for="" class="mdi mdi-arrow-right text-dark">Cek terlebih dahulu persyaratan berkas .Kemudian upload filenya pada form upload berkas</h6>
            <h6 for="" class="mdi mdi-arrow-right text-dark">Apabila terjadi kesalahan silakan hapus file pada form File Terupload. Kemudian Silakan upload kembali file yang salah</h6>
            <h6 for="" class="mdi mdi-arrow-right text-dark">Jika Persyaratan sudah selesai silakan klik tombol selesai dan silakan menunggu konfirmasi pengajuan berkas pada menu pesan</h6>
        </div>
    </div>
</div>
</div>


<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
         <div class="row">
           <div class="col-lg-12">
              <div class="card border border-warning">
                 <div class="card-header bg-transparent border-primary">
                    <h5 class="headname my-0 text-primary"><i class=" mdi mdi-file-sync  mr-4"></i>Persyaratan Pelayanan</h5>
                </div>
                <div class="table-responsive" >
                    <table id="example2"  class="table mb-0"  width="100%">
                       <thead>
                          <tr>
                             <th>#</th>
                             <th>Nama File</th>
                         </tr>
                     </thead>
                     <tbody id="Persyaratan"></tbody>
                 </table>
             </div>
         </div>
     </div>
     <div class="col-lg-12">
      <div class="card border border-info">
         <div class="card-header bg-transparent border-primary">
            <h5 class="headname my-0 text-primary"><i class=" mdi mdi-file-sync  mr-3"></i>File Terupload</h5>
        </div>
        <div class="table-responsive">
            <table id="example" class="table mb-0" width="100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Nama File</th>
                     <th>Lihat</th>
                 </tr>
             </thead>
             <tbody id="FileUpload"></tbody>
         </table>
     </div>
 </div>
</div>
</div>
<div id="Verifikasi" >
  <input type="hidden"  name="names" id="names" >
  <a href="?Halaman=pesan" class="btn btn-dark waves-effect waves-light  btn-rounded"><i class=" bx bx-left-arrow-alt font-size-20 align-middle mr-2"></i>Kembali</a>
  <button  type="submit" id="Verifikasi_File" title="Verifikasi File" class="btn btn-primary waves-effect waves-light btn-rounded"> <i class="  bx bx-log-in-circle  font-size-16 align-middle mr-2"></i> Verifikasi</button>
</div>
</div>
</div>
</div>
</div>


<script>
  let dataPersyaratan = {
     service_categori_id : "<?=$_GET['kode'];?>"
 };
// console.log(dataPersyaratan);
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
$('#example2').DataTable({
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
let dataFileUpload = {
 entrance_service_code : "<?=$_GET['id'];?>"
};

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
         '<td><label>'+FileUpload[key]['name_file']+'</label></td>'+
         '<td><a href="../../../file_manager/file/'+FileUpload[key]['file']+'" target=_blank"><button class="btn btn-info btn-sm">Lihat</button></a></td>';
         '</tr>';
     }
     $('#FileUpload').html(htmls);
 }
}
});

$.ajax({
 type    : "POST",
 data    : JSON.stringify(dataPersyaratan),
 url     : "../../../api/file_requietments/list_update.php",
 dataType:"json",
 proccessData: false,
 success : function(respone){
    let Persyaratan = respone.data;
    let html = '';
    let i = 1;
    for (var key in Persyaratan){
       html += '<tr>'+
       '<td>'+i+++'</td>'+
       '<td><label>'+Persyaratan[key]['name_file']+'</label></td>'+
       '</tr>';
   }
   $('#Persyaratan').html(html);
}
});


let data = {
 id_users : "<?=@$_SESSION['users_id']?>"
};

$.ajax({
 type : 'POST',
 data : JSON.stringify(data),
 url  : '../../../api/data_users/administrator/show.php',
 processData: false,
 dataType:"json",
 success :function(results) {
    $('#names').val(results.data['id_employee']);

}


});


$('#Verifikasi_File').on('click',(function(e) {
   let dataVerifikasi = {
    user_id                : $('#names').val(),
    code_entrance_services : "<?=$_GET['id'];?>"
};
console.log(dataVerifikasi);
e.preventDefault();
$.ajax({
    type        : "POST",
    data        : JSON.stringify(dataVerifikasi),
    url         : '../../../api/verifFile/add.php',
    dataType    : 'json',
    proccessData: false,
    success : function(respone)
    {
       SwalOk.fire({text: respone.messages })
       .then((respone)=>{
        window.location.href="?Halaman=pesan";
    });
   },
   error:function(jqXHR, textStatus, errorThrown){
    let msg = JSON.parse(jqXHR.responseText);
    SwalError.fire({text: msg.messages })
}  
});

}));

</script>