<div class="row">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Halaman Form <?=$_GET['if'] == 'Tambah' ? 'Tambah' : 'Edit' ;?> User Account </h4>
                <p class="card-title-desc">Silakan isi form berikut.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group position-relative">
                            <label>Emails</label>
                            <div class="input-group">
                                <input type="text" name="username" id="username" class="form-control form-control-sm"  required="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                    </div>
                </div>
                <button type="submit" id="UbahPelayanan" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>


<script>
        $(document).ready(function(){
            let Url = "<?=$_GET['if'];?>";

            if(Url == 'PE'){
                $('#nonaktif').hide();
               let userId  = {
                            id_users : "<?=$_GET['id'];?>"
                        };
                $.ajax({
                    type : 'POST',
                    data : JSON.stringify(userId),
                    url  : '../../../api/users/show.php',
                    processData: false,
                    dataType:"json",
                        success :function(results) {
                            $('#username').val(results.data['username']);
                        }
                });
            // });

                $('#UbahPelayanan').on('click',(function(e){
                    e.preventDefault();
                        let dataEditPU  = {
                            id_users : "<?=$_GET['id'];?>",
                            username : $('#username').val(),
                            password : $('#password').val()
                        };

                        $.ajax({
                            type    : 'POST',
                            data    : JSON.stringify(dataEditPU),
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

            }else if (Url == 'DU'){
                $('#passwordGanti').hide();
                $("#username").prop("readonly", true);
                let userId  = {
                            id_users : "<?=$_GET['id'];?>"
                        };
                $.ajax({
                    type : 'POST',
                    data : JSON.stringify(userId),
                    url  : '../../../api/users/show.php',
                    processData: false,
                    dataType:"json",
                        success :function(results) {
                            $('#username').val(results.data['username']);
                              $("#Status").val(results.data['status']).change();
                        }
                });

                 $('#UbahPelayanan').on('click',(function(e){
                    e.preventDefault();
                        let dataEditPU  = {
                            id_users : "<?=$_GET['id'];?>",
                            status   : $('#Status').val()
                        };

                        $.ajax({
                            type    : 'POST',
                            data    : JSON.stringify(dataEditPU),
                            url     : '../../../api/users/nonaktif_account.php',
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
                    $('#nonaktif').hide();
                    $("#username").attr("placeholder", "Silakan Masukkan dengan Format email");
                    $("#password").attr("placeholder", "Silakan Masukkan password Min 8");

                    $('#UbahPelayanan').on('click',(function(e){
                    e.preventDefault();
                        let addDataStaf  = {
                            username   : $('#username').val(),
                            password   : $('#password').val()
                        };

                        $.ajax({
                            type    : 'POST',
                            data    : JSON.stringify(addDataStaf),
                            url     : '../../../api/users/administrator/add.php',
                            processData:false,
                            dataType : 'json',
                                success: function (respone)
                                {
                                    SwalOk.fire({text: respone.messages})
                                    .then((respone)=>{
                                        let id =  $('#username').val();
                                    window.location='?Halaman=staf&Aksi=form_update&if=add&id='+id+'';
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
       
