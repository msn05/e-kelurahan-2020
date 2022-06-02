<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Halaman <?=$_GET['if'] == 'add' ? 'Tambah' : 'Edit';?> Pelayanan</h4>
                <p class="card-title-desc">Silakan isi form berikut.</p>
                <div>
                    <div class="form-group position-relative">
                    	<label>Nama Pelayanan</label>
                        <div class="input-group">
                            <input type="text" name="name" id="name" class="form-control form-control-sm"  required="">
                        </div>
                    </div>
                    <div class="form-group position-relative">
                        <label>Status Akun</label>
                        <select id="Status" class="form-control form-control-sm" >
                            <option value="">Pilih</option>
                            <option value="Show">Masih Berlaku</option>
                            <option value="Hide">Tidak Berlaku</option>
                        </select>
                    </div>
                </div>
                <button type="submit" id="simpanPelayanan" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
   $(document).ready(function(){
      let role = "<?=@$_SESSION['session_role'];?>";
        	 // console.log(role);
        	 if(role == 1){

        	 	let form = "<?=$_GET['if'];?>";

        	 	if(form == 'add'){

        	 		$("#name").attr("placeholder", "Silakan Masukkan nama pelayanan");

        	 		$("#simpanPelayanan").on('click',(function(e) {
                       e.preventDefault();
                       let data  = {
                           name 	: $('#name').val(),
                           user_id : <?=@$_SESSION['users_id'];?>,
                           status 	: $('#Status').val()
                       };
	                    // console.log(data);
	                    $.ajax({
                           type  	: 'POST',
                           data  	: JSON.stringify(data),
                           url   	: '../../../api/service_categories/add.php',
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
                       })
	                }));

        	 	}else{

                  let dataEditService  = {
                    id_service_categori : "<?=$_GET['id'];?>"
                };
                $.ajax({
                    type : 'POST',
                    data : JSON.stringify(dataEditService),
                    url  : '../../../api/service_categories/list_update.php',
                    processData: false,
                    dataType:"json",
                    success :function(results) {
                        $('#name').val(results.data['name']);
                        $("#Status").val(results.data['status']).change();
                    }
                });


                $('#simpanPelayanan').on('click',(function(e){
                    e.preventDefault();
                    let dataEditServiceNya  = {
                        id_service_categori : "<?=$_GET['id'];?>",
                        name                : $('#name').val(),
                        user_id             : <?=@$_SESSION['users_id'];?>,
                        status              : $('#Status').val()
                    };

                    console.log(dataEditServiceNya);
                    $.ajax({
                        type    : 'POST',
                        data    : JSON.stringify(dataEditServiceNya),
                        url     : '../../../api/service_categories/update.php',
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
            }
        }else{
         SwalError.fire({text: 'Anda Tidak Memiliki Akses.!' })
         .then((respone)=>{
            window.location='index.php';
        });

     }
 });

</script>

