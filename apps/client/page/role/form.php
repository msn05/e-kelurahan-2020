<div class="row">
 <div class="col-lg-6">
  <div class="card">
   <div class="card-body">
    <h4 class="card-title">Halaman Tambah Role</h4>
    <p class="card-title-desc">Silakan isi form berikut.</p>
    <div>
     <div class="mb-4">
      <input class="form-control form-control-sm" name="name" id="name" type="text" placeholder="Silakan masukkan nama role">
     </div>
    </div>
    <button type="submit" id="simpan" class="btn btn-success waves-effect waves-light"><i class=" bx bx-save  font-size-16 align-middle mr-2"></i> Simpan</button>
   </div>
  </div>
 </div>
</div>

<script>
 $("#simpan").on('click',(function(e) {
  e.preventDefault();
  let data  = {
   name : $('#name').val()
  };

  $.ajax({
   type  : 'POST',
   data  : JSON.stringify(data),
   url   : '../../../api/role/add.php',
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
</script>

