<div class="row">
 <div class="col-lg-10">
  <div class="card">
   <div class="card-body">
    <h4 class="card-title">Halaman Form  User Account </h4>
    <p class="card-title-desc">Silakan isi form berikut.</p>
    <div class="row">
     <div class="col-md-6">
      <div class="form-group position-relative">
       <label>Nama Lengkap</label>
       <div class="input-group">
        <input type="hidden" name="id_citizen_data" id="id_citizen_data" class="form-control form-control-sm" value="" required/>
        <input type="text" name="full_name" id="full_name" class="form-control form-control-sm" value="" required/>
       </div>
      </div>
     </div>
     <div class="col-md-6">
      <div class="form-group position-relative">
       <label>Nomor HP</label>
       <div class="input-group">
        <input type="text" name="phone_number" id="phone_number" class="form-control form-control-sm" value=""  required/>
       </div>
      </div>
     </div>
     <div class="col-md-6">
      <div class="form-group position-relative">
       <label>Nomor NIK</label>
       <div class="input-group">
        <input type="text" name="number_identification_card" id="number_identification_card" class="form-control form-control-sm" value="" required/>
       </div>
      </div>
     </div>
     <div class="col-md-6">
      <div class="form-group position-relative">
       <label>Nomor Whatsapp</label>
       <div class="input-group">
        <input type="text" name="phone_number_whatshapp" id="phone_number_whatshapp" class="form-control form-control-sm" value="" required/>
       </div>
      </div>
     </div>
     <div class="col-md-6">
      <div class="form-group position-relative">
       <label>Profesi</label>
       <div class="input-group">
        <input type="text" name="profession" id="profession" class="form-control form-control-sm" value="" required/>
       </div>
      </div>
     </div>
     <div class="col-md-6">
      <div class="form-group position-relative">
       <label>Alamat</label>
       <div class="input-group">
        <textarea name="address" id="address" class="form-control"></textarea>

       </div>
      </div>
     </div>
    </div>
    <button type="submit" id="UbahDataStaf" class="btn btn-success waves-effect waves-light"><i class="bx bx-check-double font-size-16 align-middle mr-2"></i> Success</button>
    <a href="index.php" class="btn btn-danger waves-effect waves-light"><i class="bx bx-block font-size-16 align-middle mr-2"></i> Kembali
    </a>
   </div>
  </div>
 </div>
</div>

<script>
	$(document).ready(function() {
  let data = {
   id_users  : <?=$_SESSION['users_id'];?>
  };
  // console.log(data);
  $.ajax({
   'data' : JSON.stringify(data),
   'type' : 'POST',
   'url'  : '../../../api/data_users/public/show.php',
   'dataType' : false,
   'cache'    : false,
   success    : function(respone){
    const id_citizen_data              = respone.data['id_citizen_data'];
    const full_name                    = respone.data['full_name'];
    const number_identification_card   = respone.data['number_identification_card'];
    const address                      = respone.data['address'];
    const phone_number                 = respone.data['phone_number'];
    const phone_number_whatshapp       = respone.data['phone_number_whatshapp'];
    const profession                   = respone.data['profession'];

    $('#id_citizen_data').val(id_citizen_data);
    $('#full_name').val(full_name);
    $('#number_identification_card').val(number_identification_card);
    $('#address').val(address);
    $('#phone_number').val(phone_number);
    $('#phone_number_whatshapp').val(phone_number_whatshapp);
    $('#profession').val(profession);

   } 

  });


  $('#UbahDataStaf').on('click',(function(e){
   e.preventDefault();
   let dataAdd  = {
    id_citizen_data : $('#id_citizen_data').val(),
    full_name 		: $('#full_name').val(),
    phone_number 		: $('#phone_number').val(),
    number_identification_card 	: $('#number_identification_card').val(),
    address 			: $('#address').val(),
    phone_number_whatshapp 			: $('#phone_number_whatshapp').val(),
    profession 			: $('#profession').val()
   };
   // console.log(dataEditStafNya);
   $.ajax({
    type    : 'POST',
    data    : JSON.stringify(dataAdd),
    url  : '../../../api/data_users/public/update.php',
    processData:false,
    dataType : 'json',
    success: function (respone)
    {
     SwalOk.fire({text: respone.messages})
     .then((respone)=>{
      window.location=href="index.php";
     });
    },
    error:function(jqXHR, textStatus, errorThrown){
     let msg = JSON.parse(jqXHR.responseText);
     SwalError.fire({text: msg.messages })
    }
   });

  }));


 })


</script>