

<div id="FormInputDataNya">
	<div class="row">
		<div class="col-lg-12">
	        <div class="card">
	            <div class="card-body">
                <h4 class="card-title">Halaman <?=$_GET['if'] == 'info' ? 'Info' : 'edit';?> Pembuatan Surat Keterangan</h4>
	            	
	                <p class="card-title-desc">Silakan <?=$_GET['if'] == 'info' ? 'Lihat' : 'isi';?>  form berikut.</p>
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
                                    <h5 class="mt-0 text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Dengan Ini menerangkan : </h5>
                                </div>
                            </div>
                            <div class="card-body">
                            	<div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Nama</label>
                                        <div class="col-md-10">
                                            <input class="form-control form-control-sm" type="text" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Tempat</label>
                                        <div class="col-md-10">
                                            <input class="form-control form-control-sm" type="text" name="place_of_birth" id="place_of_birth">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-md-10">
                                            <input class="form-control form-control-sm" type="date" name="date_of_birth" id="date_of_birth">
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-md-10">
  											<select id="gender" class="form-control form-control-sm select2">
                            					<option value="">Pilih Jenis Kelamin</option>
                            					<option value="Laki-laki">Laki-laki</option>
                            					<option value="Perempuan">Perempuan</option>
                            				</select>
                                        </div>
                                    </div>
                                       <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Kebangsaan</label>
                                        <div class="col-md-10">
                                            <input class="form-control form-control-sm" type="text" id="national">
                                        </div>
                                    </div>
                                          <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Agama</label>
                                        <div class="col-md-10">
                                        	<input class="form-control form-control-sm" type="text" id="religion">
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Pekerjaan</label>
                                        <div class="col-md-10">
                                        	<input class="form-control form-control-sm" type="text" name="profession" id="profession">
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Status</label>
                                        <div class="col-md-10">
  										<select id="statusss" class="form-control form-control-sm select2">
                            					<option value="">Pilih Status Perkawinan</option>
                            					<option value="Menikah">Menikah</option>
                            					<option value="Belum Menikah">Belum Menikah</option>
                            				</select>

                            			</div>
                            		</div>
                            		 <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Alamat</label>
                                        <div class="col-md-10">
                                        	<textarea class="form-control form-control-sm" id="address_now"></textarea>
                                        </div>
                                    </div>
                            		
                            </div>
                             <div class="card bg-dark text-white-20">
                                <div class="card-body">
                                    <h5 class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Berdasarkan Surat Keterangan : </h5>
                                </div>
                            </div>
                            <div class="card-body">
                            	<div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">RT</label>
                                        <div class="col-md-10">
                                            <input class="form-control form-control-sm" name="rt" type="text" id="rt">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">Tanggal</label> 
                                        <div class="col-md-10">
                                            <input class="form-control form-control-sm" type="hidden" name="names" id="names">
                                            <input class="form-control form-control-sm" type="date" id="death_date">
                                            <span class="text-danger"> * Hanya Berlaku untuk surat Kematian saja</span>
                                        </div>
                                    </div>
                            </div>
                        </div>
                         <button type="submit" id="simpanPelayanan" class="btn btn-success waves-effect waves-light"><i class="bx bx-check-double font-size-20 align-middle mr-2"></i> Success</button>
                    <!-- <div id="Kembali"> -->
                        <a href="?Halaman=pembutan_berkas_pengajuan_keterangan" class="Kembali btn btn-danger waves-effect waves-light"><i class="bx bx-block font-size-16 align-middle mr-2"></i> Kembali</a>
                    <!-- </div> -->
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

                $.ajax({
                    type : 'POST',
                    data : JSON.stringify(data),
                    url  : '../../../api/data_users/administrator/show.php',
                    processData: false,
                    dataType:"json",
                    success :function(results) {
                        // let employe_id   = results.data['id_employee'];
                        $('#names').val(results.data['id_employee']);

                    }


                });

	let FormInputDataNya = $('#FormInputDataNya').hide();
	   let Select = $('#SelectPelayanan').select2();
        let dataSelect =    $.ajax({
                                type : 'POST',
                                url  : '../../../api/entrance_services/requestSelect.php',
                                success : function(result){
                                	// console.log(result);
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
						name : $('#name').val(),
						 status: $('#statusss').val(),
						place_of_birth :$('#place_of_birth').val(),
						date_of_birth : $('#date_of_birth').val(),
						gender : $('#gender').val(),
						national : $('#national').val(),
						religion : $('#religion').val(),
						profession : $('#profession').val(),
						gender :$('#gender').val(),
						address_now :$('#address_now').val(),
						rt : $('#rt').val(),
						death_date : $('#death_date').val(),
						users_id : $('#names').val()

                    };

                    $.ajax({
                        type  : 'POST',
                        data  : JSON.stringify(datas),
                        url   : '../../../api/form_keterangan/add.php',
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