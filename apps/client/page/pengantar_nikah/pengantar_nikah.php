
<div id="FormPilih">
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Halaman Pembuatan Surat Keterangan</h4>
					<p class="card-title-desc">Silakan isi form berikut.</p>
					<div>
						<div class="mb-4">
							<div class="form-group">
								<label class="control-label">Pilih Kode Pengajuan Nikah</label>
								<select id="SelectPelayanan" class="form-control form-control-sm select2">
									<option value="">Pilih</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


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
								<a class="nav-link mb-2 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Data Pemohon</a>
						<!-- 		<a class="nav-link mb-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Data Mempelai Pria</a>
								<a class="nav-link mb-2" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Data Mempelai Wanita</a> -->
								<button type="submit" id="simpan" class="btn btn-success waves-effect waves-light"><i class="bx bx-save font-size-16 align-middle mr-2"></i> Proses</button>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
									<div class="card border border-primary">
										<div class="card-body">
											<div class="card bg-primary text-white-20">
												<div class="card-body">
													<span class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Yang bertanda tangan dibawah ini menerangkan dengan sesungguuhnya bahwa : </span>
												</div>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nama Lengkap dan Alias</label>
													<div class="col-md-8">
														<input class="form-control form-control-sm" type="hidden" id="entrance_service_id" name="entrance_service_id">
														<input class="form-control " type="text" id="name_users" placeholder="Nama Pemohon">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tempat Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="place_users" placeholder="Tempat lahir pemhonon" type="text" id="place_users">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tanggal Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="date_users" type="date" id="date_users">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Kebangsaan</label>
													<div class="col-md-8">
														<input class="form-control " name="national_users" placeholder="Kebangsaan" type="text" id="national_users">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Agama</label>
													<div class="col-md-8">
														<select id="religion_users" name="religion_users"class=" form-control select2">
															<option value="" > Pilih </option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Pekerjaan</label>
													<div class="col-md-8">
														<input class="form-control " name="profession_users" placeholder="Profesi Pemohon" type="text" id="profession_users">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nomor NIK</label>
													<div class="col-md-8">
														<input class="form-control " name="nik_users" type="number" placeholder="Nomor NIK pemhonon" id="nik_users">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nomor KK</label>
													<div class="col-md-8">
														<input class="form-control " name="kk_users" type="number" id="kk_users" placeholder="Nomor KK Pemohon">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
													<div class="col-md-8">
														<textarea class="form-control" id="address_users" placeholder="Alamat Pemohon"></textarea>
													</div>
												</div>
												<div class="form-group  row">
													<div class="col">
														<input type="number" id="rt" class="form-control" placeholder="RT">
													</div>
													<div class="col">
														<input type="number" id="rw" class="form-control" placeholder="RW">
													</div>
												</div>
												<div class="form-group  row">
													<div class="col">
														<input type="text" id="saksi1" class="form-control" placeholder="Saksi 1">
													</div>
													<div class="col">
														<input type="text" id="saksi2" class="form-control" placeholder="Saksi 2">
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
						<!-- 		<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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
														<input class="form-control " name="nik_pria" placeholder="Nomor NIK Pria" type="number" id="nik_pria">
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
													<label for="example-text-input" class="col-md-4 col-form-label">Kebangsaan</label>
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
								</div> -->

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 

</div>

<script>


	let FormInputDataNya = $('#FormInputDataNya').hide();
	let Select = $('#SelectPelayanan').select2();

	let Agama = [
	{id:'Islam',text:'Islam'},
	{id:'Kristen',text:'Kristen'},
	{id:'Hindu',text:'Hindu'},
	{id:'Budha',text:'Budha'}
	];
	$('#religion_users').select2({
		data : Agama,
		width: 'auto',
		dropdownAutoWidth: true,
	});
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

	let dataSelect =    $.ajax({
		data : {
			keterangan : "nikah"
		},
		type : 'POST',
		url  : '../../../api/entrance_services/requestSelect.php',
		success : function(result){
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

	$("#simpan").on('click',(function(e) {
		e.preventDefault();
		let datas  = {
			entrance_service_id   : $('#entrance_service_id').val(),
			marriage_guardian_name: $('#name_users').val(),
			place_of_birth        : $('#place_users').val(),
			date_of_birth         : $('#date_users').val(),
			national              : $('#national_users').val(),
			religion              : $('#religion_users').val(),
			profession            : $('#profession_users').val(),
			kk_number             : $('#kk_users').val(),
			nik_number            : $('#nik_users').val(),
			address               : $('#address_users').val(),
			rt              						: $('#rt').val(),
			rw              						: $('#rw').val(),
			saksi1              		: $('#saksi1').val(),
			saksi2              		: $('#saksi2').val()
		};

		$.ajax({
			type  : 'POST',
			data  : JSON.stringify(datas),
			url   : '../../../api/license_marriage/add.php',
			processData:false,
			dataType : 'json',
			success: function (respone,data)
			{

				let dataID = respone.data.data['id_license_marriage'];
				SwalOk.fire({text: respone.messages})
				.then((respone)=>{
					window.location.href="?Halaman=pengantar_nikah&Aksi=form&id="+dataID+"";
				});
			},
			error:function(jqXHR, textStatus, errorThrown){
				let msg = JSON.parse(jqXHR.responseText);
				SwalError.fire({text: msg.messages })
			}
		});

	}));

</script>