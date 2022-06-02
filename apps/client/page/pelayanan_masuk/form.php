<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Halaman Form Berkas Masuk</h4>
                <p class="card-title-desc">Silakan isi form berikut.</p>
                <div>
                    <div class="form-group position-relative">
                        <div id="Pelayanan">
                          <div class="form-group">
                            <div id="statusNya">
                                <label class="control-label">Pilih Pelayanan</label>
                                <input type="hidden" name="id" id="id" value="">
                                <select id="SelectStatus" class="form-control select2">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="UploadBerkas">
                       <label id='kodePelayanan'></label>
                       <label id='kodePersyaratan'></label>
                   </div>


               </div>
               <button type="submit" id="simpanPelayanan" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Proses</button>
               <!-- <div id="Kembali"> -->
               </div>
           </div>
       </div>
   </div>
   
</div>
</div>
<script>
    $(document).ready(function(){

        let Role = "<?=@$_SESSION['session_role'];?>";
        let UserPublicID = "<?=@$_SESSION['users_id'];?>"

        // console.log(Role);

        if(Role == 3){

            $('#BatalPelayanan').hide();
            let Select = $('#SelectStatus').select2();
            
            let dataSelect =    $.ajax({
                type : 'POST',
                url  : '../../../api/service_categories/list_update.php',
                success : function(result){
                    dataPelayanan      = result.data;
                    for (var key in dataPelayanan) {
                        data_id = dataPelayanan[key]['id_service_categori'];
                        dataText = dataPelayanan[key]['name'];
                        var option = new Option(dataText, data_id, true, true);
                        Select.append(option).trigger('change');
                    }
                }
            });

            let dataUserPublic = {
                id_users  : UserPublicID
            };
            
            $.ajax({
                type : "POST",
                data : JSON.stringify(dataUserPublic),
                url  : "../../../api/data_users/public/show.php",
                dataType:"json",
                proccessData : false,
                success : function(results){
                    tmp = JSON.parse(results.data['id_citizen_data']);
                    $('#id').val(tmp);
                }
            });

            $("#simpanPelayanan").on('click',(function(e) {
                e.preventDefault();
                
                let data  = {
                    service_categori_id     : $('#SelectStatus').val(),
                    citizen_data_id         : $('#id').val()
                };
                $.ajax({
                    type    : 'POST',
                    data    : JSON.stringify(data),
                    url     : '../../../api/entrance_services/add.php',
                    processData:false,
                    dataType : 'json',
                    success: function (respone,data)
                    {
                        let dataID = respone.data.data['code_entrance_services'];
                        let dataService = respone.data.data['service_categori_id'];
                            // console.log(dataID);
                            // console.log(respone);
                            SwalOk.fire({text: respone.messages})
                            .then((respone)=>{
                                // $('#Pelayanan').hide();
                                // $('.Kembali').hide();
                                // $('#BatalPelayanan').show();
                                // $('#kodePelayanan').html(dataID);
                                //  $('#kodePersyaratan').html(dataService);
                                // $('#UploadBerkas').show();
                                window.location.href="?Halaman=upload_file&id="+dataID+"&kode="+dataService+"";
                                // window.location('?Halaman=upload_file&Aksi=form&id='+respone.data['code_entrance_services']);
                                // location.reload(true)
                            });
                        },
                        error:function(jqXHR, textStatus, errorThrown){
                            let msg = JSON.parse(jqXHR.responseText);
                            SwalError.fire({text: msg.messages })
                        }
                    })
            }));
        }else{
            SwalError.fire({text: "Anda Tidak bisa masuk ke Halaman ini.!" })
            .then(()=>{
                window.location.href="?Halaman=pengajuan_masuk";
            });
        }
    });


</script>