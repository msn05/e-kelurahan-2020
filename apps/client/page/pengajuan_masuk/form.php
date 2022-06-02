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
                            <select id="SelectStatus" class="form-control  select2">
                            </select>
                        </div>
                        </div>
                    </div>
                    </div>
                    <button type="submit" id="simpanPelayanan" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Proses</button>
                       
                </div>
            </div>
        </div>
    </div>
    
</div>
<script>
    $(document).ready(function(){
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

 			$("#simpanPelayanan").on('click',(function(e) {
            e.preventDefault();
            
                let data  = {
                                service_categori_id     : $('#SelectStatus').val()
                            };
                $.ajax({
                    type    : 'POST',
                    data    : JSON.stringify(data),
                    url     : '../../../api/entrance_services/requestSelect.php',
                    processData:false,
                    dataType : 'json',
                        success: function (respone,data)
                        {
                            let dataID = respone.data['service_categori_id'];
                            SwalOk.fire({text: respone.messages})
                            .then((respone)=>{
                                window.location.href="?Halaman=pengajuan_masuk&id="+dataID+"";
                                });
                            },
                            error:function(jqXHR, textStatus, errorThrown){
                            let msg = JSON.parse(jqXHR.responseText);
                            SwalError.fire({text: msg.messages })
                        }
                })
            }));





        });
    </script>