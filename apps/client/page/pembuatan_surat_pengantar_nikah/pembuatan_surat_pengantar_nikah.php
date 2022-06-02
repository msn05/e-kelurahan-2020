
<div id="FormPilih">
 <div class="row">
  <div class="col-lg-6">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">Silakan isi form berikut</h4>
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


<div id="FormInputDataNya" >
 <div class="row">
  <div class="col-12">
   <div class="card">
    <div class="alert alert-danger mb-0" role="alert">
     <h4 class="mt-0 mb-4"><i class="mdi mdi-warning mr-3"></i>Silakan Isi Form Berikut ini dengan benar</h4>
    </div>
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
        <a class="nav-link mb-2 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Pilih Mempelai</a>
        <a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Data Ayah Mempelai</a>
        <a class="nav-link mb-2" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Data Ibu Mempelai</a>
        <button type="submit" id="simpan" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Proses</button>
       </div>
      </div>
      <div class="col-md-9">
       <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
         <div class="card border border-primary">
          <div class="card-body">
           <div class="card bg-primary text-white-20">
            <div class="card-body">
             <span class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Silakan Pilih mempelai</span>
            </div>
           </div>
           <div class="card-body">
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Mempelai</label>
             <div class="col-md-8">
              <input type="hidden" name="" id="marriage_data_id" value="">
              <select id="jenis_mempelai" name="jenis_mempelai"class=" form-control select2">
               <option value="" > Pilih </option>
               <option value="Laki-laki">Laki-laki</option>
               <option value="Perempuan">Perempuan</option>
              </select>
             </div>
            </div>

           </div>
          </div>

         </div>
        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
         <div class="card border border-warning">
          <div class="card-body">
           <div class="card bg-primary text-white-20">
            <div class="card-body">
             <span class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Data Ayah</span>
            </div>
           </div>
           <div class="card-body">
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Nama Lengkap dan Alias</label>
             <div class="col-md-8">
              <input class="form-control " placeholder="Nama Ayah" type="text" id="nama_ayah">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Nomor NIK</label>
             <div class="col-md-8">
              <input class="form-control " name="nik_ayah" placeholder="Nomor NIK Ayah" type="number" id="nik_ayah">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Tempat Lahir</label>
             <div class="col-md-8">
              <input class="form-control " name="place_ayah" placeholder="Tempat Lahir Ayah" type="text" id="place_ayah">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Tanggal Lahir</label>
             <div class="col-md-8">
              <input class="form-control " name="date_ayah" type="date" id="date_ayah">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Kebangsaan</label>
             <div class="col-md-8">
              <input class="form-control " name="national_ayah" type="text" placeholder="Kebangsaan" id="national_ayah">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Agama</label>
             <div class="col-md-8">
              <select id="religion_ayah" name="religion_ayah"class=" form-control select2">
               <option value="" > Pilih </option>
              </select>
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Pekerjaan</label>
             <div class="col-md-8">
              <input class="form-control " name="profession_ayah" type="text" id="profession_ayah">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
             <div class="col-md-8">
              <textarea class="form-control" placeholder="Alamat Ayah" id="address_ayah"></textarea>
             </div>
            </div>

           </div>
          </div>
         </div>
        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
         <div class="card border border-success">
          <div class="card-body">
           <div class="card bg-primary text-white-20">
            <div class="card-body">
             <span class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Data Ibu Mempelai </span>
            </div>
           </div>
           <div class="card-body">
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Nama Lengkap dan Alias</label>
             <div class="col-md-8">
              <input class="form-control " placeholder="Nama Ibu" type="text" id="nama_ibu">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Nomor NIK</label>
             <div class="col-md-8">
              <input class="form-control " name="nik_ibu" placeholder="Nomor NIK Ibu" type="number" id="nik_ibu">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Tempat Lahir</label>
             <div class="col-md-8">
              <input class="form-control " name="place_ibu" placeholder="Tempat Lahir Ibu" type="text" id="place_ibu">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Tanggal Lahir</label>
             <div class="col-md-8">
              <input class="form-control " name="date_ibu" type="date" id="date_ibu">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Kebangsaan</label>
             <div class="col-md-8">
              <input class="form-control " name="national_ibu" type="text" placeholder="Kebangsaan" id="national_ibu">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Agama</label>
             <div class="col-md-8">
              <select id="religion_ibu" name="religion_ibu"class=" form-control select2">
               <option value="" > Pilih </option>
              </select>
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Pekerjaan</label>
             <div class="col-md-8">
              <input class="form-control " name="profession_ibu" type="text" id="profession_ibu">
             </div>
            </div>
            <div class="form-group row">
             <label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
             <div class="col-md-8">
              <textarea class="form-control" placeholder="Alamat Ibu" id="address_ibu"></textarea>
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
 </div> 

</div>


<script>
 let data = {
  id_users : "<?=@$_SESSION['users_id']?>"
 };
 let Agama = [
 {id:'Islam',text:'Islam'},
 {id:'Kristen',text:'Kristen'},
 {id:'Hindu',text:'Hindu'},
 {id:'Budha',text:'Budha'}
 ];
 $('#religion_ayah').select2({
  data : Agama,
  width: 'auto',
  dropdownAutoWidth: true,
 });
 $('#religion_ibu').select2({
  data : Agama,
  width: 'auto',
  dropdownAutoWidth: true,
 });
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
//  $('#FormInputDataNya').hide();
 let Select = $('#SelectPelayanan').select2();
 let dataSelect =    $.ajax({
  type : 'POST',
  url  : '../../../api/license_marriage/show.php',
  success : function(result){
   dataPelayanan      = result.data;
   for (var key in dataPelayanan) {
    data_id = dataPelayanan[key]['id_license_marriage'];
    dataText = dataPelayanan[key]['marriage_guardian_name'];
    var option = new Option(dataText, data_id);
    Select.append(option).on('change');
    // $("#FormInputDataNya").css({display: "none"});

 $('#FormInputDataNya').hide();
   }
  }
 });

 $('#SelectPelayanan').change(function() {
  let SelectPelayanan =  $(this).val();
  $('#entrance_service_id').val(SelectPelayanan);
  $('#FormPilih').hide();
  $('#FormInputDataNya').show();
  let DataMempelai = {
   license_marriage_id : SelectPelayanan
  };

  $.ajax({
   type : "POST",
   data : JSON.stringify(DataMempelai),
   url : "../../../api/license_marriage/marriage_data/request.php",
   processData:false,
   dataType : 'json',
   success : function(respone){
    // console.log(respone);
    let IdDataMarriage = respone.data['id_marriage_data'];
    $('#marriage_data_id').val(IdDataMarriage);
   }
   // success : fu

  })
 });


 $('#simpan').on('click',(function(e){
  e.preventDefault();

  let DataInput = {
   id_marriage_data      : $('#marriage_data_id').val(),
   type_children         : $('#jenis_mempelai').val(),
   father_name           : $('#nama_ayah').val(),
   number_nik_father     : $('#nik_ayah').val(),
   place_of_birth_father : $('#place_ayah').val(),
   date_of_birth_father  : $('#date_ayah').val(),
   national_father       : $('#national_ayah').val(),
   religion_father       : $('#religion_ayah').val(),
   profession_father     : $('#profession_ayah').val(),
   address_father        : $('#address_ayah').val(),
   mother_name           : $('#nama_ibu').val(),
   number_nik_mother     : $('#nik_ibu').val(),
   place_of_birth_mother : $('#place_ibu').val(),
   date_of_birth_mother  : $('#date_ibu').val(),
   national_mother       : $('#national_ibu').val(),
   religion_mother       : $('#religion_ibu').val(),
   profession_mother     : $('#profession_ibu').val(),
   address_mother        : $('#address_ibu').val()
  };
  
  Swal.fire({
   title: 'Anda Yakit?',
   text: 'Sudah Mengisi data dengan benar.!',
   icon: 'question',
   showCancelButton: true,
   confirmButtonText: 'Lanjutkan',
   cancelButtonText: 'Batalkan'
  }).then((result) => {
   if (result.isConfirmed) {
    $.ajax({
     type : 'POST',
     data : JSON.stringify(DataInput),
     url  : '../../../api/license_marriage/parent_data/add.php',
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

</script>