<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Halaman <?=$_GET['if'] == 'add' ? 'Tambah' : 'Edit';?> Berkas Pelayanan</h4>
                <p class="card-title-desc">Silakan isi form berikut.</p>
                <div>
                    <div class="form-group position-relative">
                    	<label>Nama Berkas</label>
                            <div class="input-group">
                                <input type="text" name="name" id="name" class="form-control "  required="">
                            </div>
                      <div class="form-group">
                            <label class="control-label">Jenis Pelayanan</label>
                            <select id="SelectPelayanan" class="form-control form-control-sm select2">
                            </select>
                        </div>
                    </div>
                      <div class="form-group">
                    <div id="statusNya">
                            <label class="control-label">Status Persyaratan</label>
                            <select id="SelectStatus" class="form-control form-control-sm select2">
                            </select>
                        </div>
                        </div>
                    </div>
                    <button type="submit" id="simpanPelayanan" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){


        let Select = $('#SelectPelayanan').select2();
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
        let DataPersyaratan = [{id:"Berlaku",text:"Berlaku"},{id:"Tidak Berlaku",text:"Tidak Berlaku"}];

        $('#SelectStatus').select2({
                data : DataPersyaratan
        });

        let url = "<?=$_GET['if'];?>";

        if(url == 'add'){
            // $('#statusNya').show();

            $("#name").attr("placeholder", "Silakan Masukkan Nama Berkas");
            $("#simpanPelayanan").on('click',(function(e) {
                e.preventDefault();
                    let data  = {
                        service_categori_id 	: $('#SelectPelayanan').val(),
                        name_file               : $('#name').val(),
                        status 	                : $('#SelectStatus').val()
                        };
                    $.ajax({
                        type  	: 'POST',
                        data  	: JSON.stringify(data),
                        url   	: '../../../api/file_requietments/add.php',
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
    
        }else if(url == 'edit'){
            let DD  = {
                id_file_requietmens : "<?=$_GET['id'];?>"
                };
                // $('#status').hide();
                // console.log(dataEditPersyaratan);
                $.ajax({
                    type : 'POST',
                    data : JSON.stringify(DD),
                    url  : '../../../api/file_requietments/list_update.php',
                    processData: false,
                    dataType:"json",
                        success :function(results) {
                            console.log(results);
                            $('#name').val(results.data['name_file']);
                            $("#SelectPelayanan").val(results.data['service_categori_id']).change();
                            $("#SelectStatus").val(results.data['status']).change();
                        }
                });

                $("#simpanPelayanan").on('click',(function(e) {
                e.preventDefault();
                    let data  = {
                        id_file_requietmens     : "<?=$_GET['id'];?>",
                        service_categori_id 	: $('#SelectPelayanan').val(),
                        name_file               : $('#name').val(),
                        status 	                : $('#SelectStatus').val()
                        };
                    $.ajax({
                        type  	: 'POST',
                        data  	: JSON.stringify(data),
                        url   	: '../../../api/file_requietments/update.php',
                        processData:false,
                        dataType : 'json',
                            success: function (respone)
                                {
                                    // console.log(respone);
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
        }
    
    });

</script>