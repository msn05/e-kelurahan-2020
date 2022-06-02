 <div class="row">
  <div class="col-12">
   <div class="alert alert-info " role="alert">
    <h4 class="card-title">Halaman Informasi Data Pengajuan Pesan Masuk dengan kode </h4>
</div>
</div>
</div>
<div class="row">
  <div class="col-lg-12">
   <div class="card">
    <div class="card-body">
     <div class="row">
      <div class="col-md-3">
       <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link mb-2 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Detail Warga</a>
        <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Detail Pelayanan</a>
        <a class="nav-link mb-2" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Detail Upload</a>
        <a class="nav-link mb-2" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Status</a>
    </div>
</div>
<div class="col-md-9">
   <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
     <div class="card border border-primary">
      <div class="card-body">
       <div class="form-group row">
        <label for="example-text-input" class="col-md-4 col-form-label">Nama Warga</label>
        <div class="col-md-8">
         <label for="" class="form-control namaWarga"></label>
     </div>
 </div>
 <div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">Nomor Identitas</label>
    <div class="col-md-8">
     <label for="" class="form-control nik"></label>
 </div>
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">Nomor Handphone</label>
    <div class="col-md-8">
     <label for="" class="form-control hp"></label>
 </div>
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">Nomor Whatshapp</label>
    <div class="col-md-8">
     <label for="" class="form-control wa"></label>
 </div>
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
    <div class="col-md-8">
     <textarea name="" class="alamat form-control " cols="30" rows="5"></textarea>
 </div>
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">Pekerjaan</label>
    <div class="col-md-8">
     <label for="" class="form-control pekerjaan"></label>
 </div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
 <div class="card border border-warning">
  <div class="card-body">
   <div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">Nama Pelayanan</label>
    <div class="col-md-8">
     <label for="" class="form-control namaPelayanan"></label>
 </div>
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">Persyaratan</label>
    <div class="col-md-8">
     <div class="table-responsive">
      <table class="table mb-0">
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
           <!-- <div class="form-group row">
            <label for="example-text-input" class="col-md-4 col-form-label">File yang Diupload</label>
            <div class="col-md-8">
             <div class="table-responsive">
              <table class="table mb-0">
               <thead>
                <tr>
                 <th>#</th>
                 <th>Nama File</th>
                </tr>
               </thead>
               <tbody id="UploadFile"></tbody>
              </table>
             </div>
            </div>
        </div> -->
        <div class="form-group row">
            <label for="example-text-input" class="col-md-4 col-form-label">Tanggal Upload</label>
            <div class="col-md-8">
             <label for="" class="form-control tglupload"></label>
         </div>
     </div>


 </div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
 <div class="card border border-success">
  <div class="card-body">
   <div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">File yang Diupload</label>
    <div class="col-md-8">
     <div class="table-responsive">
      <table class="table mb-0">
       <thead>
        <tr>
         <th>#</th>
         <th>Nama File</th>
     </tr>
 </thead>
 <tbody id="UploadFile"></tbody>
</table>
</div>
</div>
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">Tanggal Upload</label>
    <div class="col-md-8">
     <label for="" class="form-control tglupload"></label>
 </div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
 <div class="card border border-dark">
  <div class="card-body">
   <div class="form-group row">
    <label for="example-text-input" class="col-md-4 col-form-label">Status</label>
    <div class="col-md-8">
     <label for="" class="alert alert-info status form-control"></label>
 </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 

<a href="?Halaman=pengajuan_masuk" class="btn btn-danger waves-effect waves-light"><i class="bx bx-left-arrow-alt font-size-19 align-middle mr-2"></i> Kembali</a>




<script>
     let idPelayanan = "<?=$_GET['id'];?>";

    let DataId = {
       code_entrance_services : idPelayanan
   };

   // if(idPelayanan == 'SPK-0009'){

   // }else{

      $.ajax({
       type : "POST",
       url  : '../../../api/entrance_services/show.php',
       data : JSON.stringify(DataId),
       dataType : "json",
       processData : false,
       success: function (respone)
       {   
        $('.card-title').append(respone.data.Data_Layanan['code_entrance_services']);
        $('.namaWarga').html(respone.data.Data_Layanan['full_name']);
        $('.nik').html(respone.data.Data_Layanan['number_identification_card']);
        $('.hp').html(respone.data.Data_Layanan['phone_number']);
        $('.wa').html(respone.data.Data_Layanan['phone_number_whatshapp']);
        $('.alamat').html(respone.data.Data_Layanan['address']);
        $('.pekerjaan').html(respone.data.Data_Layanan['profession']);
        $('.namaPelayanan').html(respone.data.Data_Layanan['name']);
        $('.tglupload').html(respone.data.Data_Layanan['created_at']);
        $('.status').html(respone.data.Data_Layanan['status_name']);
        let Persyaratan = respone.data.Data_File;
        let Upload      = respone.data.Upload;
        let html = '';
        let html2 = '';
        let i = 1;
        for (var key in Persyaratan){
         html += '<tr>'+
         '<td>'+i+++'</td>'+
         '<td>'+Persyaratan[key]['name_file']+'</td>'+
         '</tr>';
     }
     let u =1;
     $('#Persyaratan').html(html);
     for (var key in Upload){
         html2 += '<tr>'+
         '<td>'+u+++'</td>'+
         '<td>'+Upload[key]['file']+'</td>'+
         '</tr>';
     }
     $('#UploadFile').html(html2);
 }
})

</script>