
<div id="FormPilih">
 <div class="row">
  <div class="col-lg-6">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">Halaman Pembuatan Surat Keterangan</h4>
     <p class="card-title-desc">Silakan isi form berikut.</p>
     <div>
      <div class="mb-4">
       <div class="form-group">
        <label class="control-label">Pilih Kode Berkas Verifikasi</label>
        <select id="SelectPelayanan" class="form-control select2">
         <option value="">Pilih</option>
       </select>
     </div>
   </div>
 </div>
</div>
</div>
</div>
</div>
</div>


<div id="FormInputDataNya">
	<div class="row">
		<div class="col-lg-12">
     <div class="card">
      <div class="card-body">
       <p class="card-title-desc"><?=$_GET['Keterangan'] !='' ? '' : 'Silakan isi form berikut.';?></p>
       <div>
        <div class="col-lg-12">
         <div class="card bg-primary text-white-20">
          <div class="card-body">
           <h5 class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Yang bertanda tangan dibawah ini: </h5>
         </div>
       </div>
       <div class="card-body">
        <div class="form-group row">
         <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
         <div class="col-md-10">
          <input class="form-control form-control-sm" type="hidden" id="entrance_service_id" name="entrance_service_id">
          <input class="form-control form-control-sm" type="text" id="office_name">
        </div>
      </div>
      <div class="form-group row">
       <label for="example-text-input" class="col-md-2 col-form-label">Posisi</label>
       <div class="col-md-10">
        <input class="form-control form-control-sm" name="position" type="text" id="position">
      </div>
    </div>
  </div>
  <div class="card bg-info text-white-20">
    <div class="card-body">
     <h5 class="mt-0 text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Dengan Ini menerangkan bahwa : </h5>
   </div>
 </div>

 <div class="card-body">
  <div class="form-group row">
   <label for="example-text-input" class="col-md-2 col-form-label">Nama Subjek Pajak</label>
   <div class="col-md-10">
    <input class="form-control form-control-sm" type="text" name="subject_tax_name" id="subject_tax_name">
  </div>
</div>
<div class="form-group row">
 <label for="example-text-input" class="col-md-2 col-form-label">Alamat Subjek Pajak</label>
 <div class="col-md-10">
  <input class="form-control form-control-sm" type="text" name="address_tax_object" id="address_tax_object">
</div>
</div>
<div class="form-group row">
 <label for="example-text-input" class="col-md-2 col-form-label">Letak Objek Pajak</label>
 <div class="col-md-10">
  <input class="form-control form-control-sm" type="text" name="location" id="location">
</div>
</div>
<div class="form-group row">
 <label for="example-text-input" class="col-md-2 col-form-label">Nomor Objek Pajak</label>
 <div class="col-md-10">
  <input class="form-control form-control-sm" type="text" name="number_object" id="number_object">

</div>
</div>
<div class="form-group row">
 <label for="example-text-input" class="col-md-2 col-form-label">Nilai Pajak Terhutang</label>
 <div class="col-md-10">
  <input class="form-control form-control-sm" type="text" id="value_of_tax_payable" name="value_of_tax_payable">
</div>
</div>
<div class="form-group row">
 <label for="example-text-input" class="col-md-2 col-form-label">Keperluan</label>
 <div class="col-md-10">
  <input class="form-control form-control-sm" type="text" id="necessity" name="necessity">
</div>
</div>
<div class="form-group row">
 <label for="example-text-input" class="col-md-2 col-form-label">Keterangan</label>
 <div class="col-md-10">
  <textarea id="coment" name="coment" class="form-control form-control-sm"></textarea>
</div>
</div>
</div>
<button type="submit" id="simpanPelayanan" class="btn btn-outline-primary"><i class="bx bx-save font-size-20 align-middle mr-2"></i> Proses</button>
<div id="Kembali">
  <a href="" class="Kembali btn btn-outline-danger"><i class="bx bx-left-arrow-alt font-size-16 align-middle mr-2"></i> Kembali</a>
</div> 
</div>
</div>
</div>
</div>
</div>

</div>


<script>


 let Keterangan = "<?=$_GET['Keterangan'];?>";

 if(Keterangan == 'Info'){
  let idDataInfo = '<?=$_GET['id'];?>';
  let KodePelayanan = '<?=$_GET['KodePelayanan'];?>';
  $('#FormPilih').hide();
  $('#FormInputDataNya button ').remove();
  $('#FormInputDataNya a ').add();
  $('#FormInputDataNya a ').attr("href","?Halaman=pembuatan_berkas_pengajuan_keterangan&Aksi=info&id="+KodePelayanan+"");

  let DataInfo = {
    code_tax : idDataInfo
  };
  $.ajax({
    type : "POST",
    data : JSON.stringify(DataInfo),
    url  : '../../../api/certificate_taxandbuilding/request.php',
    processData : false,
    dataType : 'json',
    success : function(respone){
      office_name : $('#office_name').val(respone.data['office_name']).attr('readonly', true);
      position : $('#position').val(respone.data['position']).attr('readonly', true);
      subject_tax_name : $('#subject_tax_name').val(respone.data['subject_tax_name']).attr('readonly', true);
      address_tax_object :$('#address_tax_object').val(respone.data['address_tax_object']).attr('readonly', true);
      location : $('#location').val(respone.data['location']).attr('readonly', true);
      number_object : $('#number_object').val(respone.data['number_object']).attr('readonly', true);
      value_of_tax_payable : $('#value_of_tax_payable').val(respone.data['value_of_tax_payable']).attr('readonly', true);
      necessity : $('#necessity').val(respone.data['necessity']).attr('readonly', true);
      coment : $('#coment').val(respone.data['coment']).attr('readonly', true);
    }
  })


}else{
  $('#Kembali').empty();
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

 let FormInputDataNya = $('#FormInputDataNya').hide();
 let Select = $('#SelectPelayanan').select2();
 let dataSelect =    $.ajax({
   data : {keterangan : "pajak"},
   type : 'POST',
   url  : '../../../api/entrance_services/requestSelect.php',
   success : function(result){
    dataPelayanan      = result.data;
    for (var key in dataPelayanan) {
     data_id = dataPelayanan[key]['code_entrance_services'];
     dataText = dataPelayanan[key]['code_entrance_services'];
     var option = new Option(dataText, data_id);
     Select.append(option).on('change');

   }
 }
});

 $('#SelectPelayanan').change(function() {
   let SelectPelayanan =  $(this).val();
   $('#entrance_service_id').val(SelectPelayanan);
   $('#FormPilih').hide();
   $('#FormInputDataNya').show();
 });

 $("#simpanPelayanan").on('click',(function(e) {
   e.preventDefault();
   let datas  = {
    entrance_service_id : $('#entrance_service_id').val(),
    office_name	: $('#office_name').val(),
    position : $('#position').val(),
    subject_tax_name : $('#subject_tax_name').val(),
    address_tax_object :$('#address_tax_object').val(),
    location : $('#location').val(),
    number_object : $('#number_object').val(),
    value_of_tax_payable : $('#value_of_tax_payable').val(),
    necessity : $('#necessity').val(),
    coment : $('#coment').val(),

  };

  $.ajax({
    type  : 'POST',
    data  : JSON.stringify(datas),
    url   : '../../../api/certificate_taxandbuilding/add.php',
    processData:false,
    dataType : 'json',
    success: function (respone)
    {
     SwalOk.fire({text: respone.messages})
     .then((respone)=>{
      window.location.href='?Halaman=pembuatan_berkas_pengajuan_keterangan'
    });
   },
   error:function(jqXHR, textStatus, errorThrown){
     let msg = JSON.parse(jqXHR.responseText);
     SwalError.fire({text: msg.messages })
   }
 });

}));
}
</script>