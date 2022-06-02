<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Halaman Form <?=$_GET['if'] == 'add' ? 'Tambah' : 'Edit' ;?> User Account </h4>
                <p class="card-title-desc">Silakan isi form berikut.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group position-relative">
                            <label>Nama Staf</label>
                            <div class="input-group">
                                <input type="hidden" name="id_employee" id="id_employee" class="form-control" value="" required/>
                                <input type="text" name="name_employee" id="name_employee" class="form-control form-control-sm" value="" required/>
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
                            <label>Nomor Identitas Staf</label>
                            <div class="input-group">
                                <input type="text" name="number_identity" id="number_identity" class="form-control form-control-sm" value="" required/>
                            </div>
                        </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group position-relative">
                            <label>Posisi</label>
                            <div class="input-group">
                                <input type="text" name="position" id="position" class="form-control form-control-sm" value="" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="UbahDataStaf" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>


<script>
        $(document).ready(function(){

            let Url = "<?=$_GET['if'];?>";
            // console.log(Url);
             let dataEditStaf  = {
                            id_users : "<?=$_GET['id'];?>"
                        };
            if(Url === 'DE'){

              
                $.ajax({
                    type : 'POST',
                    data : JSON.stringify(dataEditStaf),
                    url  : '../../../api/data_users/administrator/show.php',
                    processData: false,
                    dataType:"json",
                        success :function(results) {
                            $('#id_employee').val(results.data['id_employee']);
                            $('#name_employee').val(results.data['name_employee']);
                            $('#phone_number').val(results.data['phone_number']);
                            $('#number_identity').val(results.data['number_identity']);
                            $("#position").val(results.data['position']).change();
                        }
                });
                
               
                $('#UbahDataStaf').on('click',(function(e){
                    e.preventDefault();
                        let dataEditStafNya  = {
                            id_employee 		: $('#id_employee').val(),
                            name_employee 		: $('#name_employee').val(),
                            phone_number 		: $('#phone_number').val(),
                            number_identity 	: $('#number_identity').val(),
                            position 			: $('#position').val(),
                        };
                   
                        // console.log(dataEditStafNya);
                        $.ajax({
                            type    : 'POST',
                            data    : JSON.stringify(dataEditStafNya),
                                url  : '../../../api/data_users/administrator/update.php',
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

            }else{

                let dataAdd = {
                    username : "<?=$_GET['id'];?>"
                };

                // console.log(id);
                 $.ajax({
                    type : 'POST',
                    data : JSON.stringify(dataAdd),
                    url  : '../../../api/users/show.php',
                    processData: false,
                    dataType:"json",
                        success :function(results) {
                            // console.log(results);
                            $('#id_employee').val(results.data['id_users']);
                        }
                });

                $("#name_employee").attr("placeholder", "Silakan Masukkan Nama Staf");
                $("#phone_number").attr("placeholder", "Silakan Masukkan Nomor HP Staf");
                $("#number_identity").attr("placeholder", "Silakan Masukkan Nomor Indentitas Staf");
                $("#position").attr("placeholder", "Silakan Masukkan Posisi Staf");

                $('#UbahDataStaf').on('click',(function(e) {
                     e.preventDefault();
                       let dataAddStafNya  = {
                            users_id         : $('#id_employee').val(),
                            name_employee    : $('#name_employee').val(),
                            phone_number     : $('#phone_number').val(),
                            number_identity  : $('#number_identity').val(),
                            position         : $('#position').val()
                        };

                       $.ajax({
                            type    : 'POST',
                            data    : JSON.stringify(dataAddStafNya),
                                url  : '../../../api/data_users/administrator/add.php',
                            processData:false,
                            dataType : 'json',
                                success: function (respone)
                                {
                                    SwalOk.fire({text: respone.messages})
                                    .then((respone)=>{
                                    window.location='?Halaman=staf';
                                    });
                                },
                                error:function(jqXHR, textStatus, errorThrown){
                                    let msg = JSON.parse(jqXHR.responseText);
                                    SwalError.fire({text: msg.messages })
                                }
                        });

                 }));
            }


        });


</script>
       
