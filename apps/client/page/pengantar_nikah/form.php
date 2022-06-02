<div id="FormInputDataNya">
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
								<a class="nav-link mb-2 active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Data Mempelai Pria</a>
								<a class="nav-link mb-2" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Data Mempelai Wanita</a>
							
								<button type="submit" id="simpan" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Proses</button>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
								<div class="tab-pane fade  show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
									<div class="card border border-warning">
										<div class="card-body">
											<div class="card bg-primary text-white-20">
												<div class="card-body">
													<span class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Data mempelai pria </span>
												</div>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nama Lengkap dan Alias</label>
													<div class="col-md-8">
														<input class="form-control "  type="hidden" id="id_pemohon" value="">
														<input class="form-control " placeholder="Nama Mempelai Pria" type="text" id="nama_men">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Bin</label>
													<div class="col-md-8">
														<input class="form-control " placeholder="Bin " type="text" id="bin_men">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nomor NIK</label>
													<div class="col-md-8">
														<input class="form-control " name="nik_pria" placeholder="Nomor NIK Pria" type="number" id="nik_men">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nomor KK</label>
													<div class="col-md-8">
														<input class="form-control " placeholder="Boleh Dikosongkan" name="kk_men" type="text" id="kk_men">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tempat Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="place_men" placeholder="Tempat Lahir Pria" type="text" id="place_men">
													</div>
												</div>
													
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tanggal Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="date_men" type="date" id="date_men">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Kewarganegaraan</label>
													<div class="col-md-8">
														<input class="form-control " name="national_men" type="text" placeholder="Kebangsaan" id="national_men">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Agama</label>
													<div class="col-md-8">
														<select id="religion_men" name="religion_men"class=" form-control select2">
															<option value="" > Pilih </option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Pekerjaan</label>
													<div class="col-md-8">
														<input class="form-control " name="profession_men" type="text" id="profession_men">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
													<div class="col-md-8">
														<textarea class="form-control" placeholder="Alamat Pria" id="address_men"></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Status</label>
													<div class="col-md-8">
														<select id="status_men" name="status_men"class=" form-control select2">
															<option value="" > Pilih </option>
															<option value="Duda" > Duda </option>
															<option value="Jejaka" > Jejaka </option>
														</select>
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
													<span class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Data mempelai Wanita </span>
												</div>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nama Lengkap dan Alias</label>
													<div class="col-md-8">
														<input class="form-control " placeholder="Nama Mempelai Wanita" type="text" id="nama_female">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Bin</label>
													<div class="col-md-8">
														<input class="form-control " placeholder="Binti " type="text" id="bin_female">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nomor NIK</label>
													<div class="col-md-8">
														<input class="form-control " name="nik_female" placeholder="Nomor NIK Wanita" type="number" id="nik_female">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nomor KK</label>
													<div class="col-md-8">
														<input class="form-control " placeholder="Boleh Dikosongkan" name="kk_female" type="number" id="kk_female">
													</div>
												</div>
															
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tempat Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="place_female" placeholder="Tempat Lahir Wanita" type="text" id="place_female">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tanggal Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="date_female" type="date" id="date_female">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Kebangsaan</label>
													<div class="col-md-8">
														<input class="form-control " name="national_female" type="text" placeholder="Kebangsaan" id="national_female">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Agama</label>
													<div class="col-md-8">
														<select id="religion_female" name="religion_female"class=" form-control select2">
															<option value="" > Pilih </option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Pekerjaan</label>
													<div class="col-md-8">
														<input class="form-control " name="profession_female" type="text" id="profession_female">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
													<div class="col-md-8">
														<textarea class="form-control" placeholder="Alamat Wanita" id="address_female"></textarea>
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Status</label>
													<div class="col-md-8">
														<select id="status_female" name="status_female"class=" form-control select2">
															<option value="" > Pilih </option>
															<option value="Janda" > Janda </option>
															<option value="Perawan" > Perawan </option>
														</select>
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
	let idPemohon = "<?=$_GET['id'];?>";
	$('#id_pemohon').val(idPemohon);
	let Agama = [
	{id:'Islam',text:'Islam'},
	{id:'Kristen',text:'Kristen'},
	{id:'Hindu',text:'Hindu'},
	{id:'Budha',text:'Budha'}
	];
	
	$('#religion_men').select2({
		data : Agama,
		width: 'auto',
		dropdownAutoWidth: true,
	});
	$('#religion_female').select2({
		data : Agama,
		width: 'auto',
		dropdownAutoWidth: true,
	});

	$("#simpan").on('click',(function(e) {
		e.preventDefault();
		let datas  = {
			'license_marriage_id'   : $('#id_pemohon').val(),
			'brides_name_men'       : $('#nama_men').val(),
			'bin_men'               : $('#bin_men').val(),
			'place_of_birth_men'     : $('#place_men').val(),
			'date_of_birth_men'      : $('#date_men').val(),
			'profession_men'         : $('#profession_men').val(),
			'kk_number_men'         : $('#kk_men').val(),
			'nik_number_men'        : $('#nik_men').val(),
			'marital_status_men'   : $('#status_men').val(),
			'address_female'       : $('#address_female').val(),
			'brides_name_female'    : $('#nama_female').val(),
			'bin_female'            : $('#bin_female').val(),
			'place_of_birth_female' : $('#place_female').val(),
			'date_of_birth_female'  : $('#date_female').val(),
			'profession_female'     : $('#profession_female').val(),
			'marital_status_female' : $('#status_female').val(),
			'kk_number_female'      : $('#kk_female').val(),
			'nik_number_female'     : $('#nik_female').val(),
			'address_men'            : $('#address_men').val(),
			'national_men'            : $('#national_men').val(),
			'national_female'            : $('#national_female').val(),
			'religion_female'            : $('#religion_female').val(),
			'religion_men'            : $('#religion_men').val()

		};

		$.ajax({
			type  : 'POST',
			data  : JSON.stringify(datas),
			url   : '../../../api/license_marriage/marriage_data/add.php',
			processData:false,
			dataType : 'json',
			success: function (respone,data)
			{
				// console.log(respone.data['id']);
				$('#v-pills-tab button ').attr( 'id', 'parent_button' );
				let dataID = respone.data['id'];
				SwalOk.fire({text: respone.messages})
				.then((respone)=>{
					window.location.href="index.php";
				});
			},
			error:function(jqXHR, textStatus, errorThrown){
				let msg = JSON.parse(jqXHR.responseText);
				SwalError.fire({text: msg.messages })
			}
		});

	}));

</script>