<div id="FormInputDataNya">
	<!--<div class="row">-->
	<!--	<div class="col-12">-->
	<!--		<div class="card">-->
	<!--			<div class="alert alert-danger mb-0" role="alert">-->
					<!--<h4 class="mt-0 mb-4"><i class="mdi mdi-warning mr-3"></i>Silakan Isi Form Berikut ini dengan benar</h4>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">

							<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<a class="nav-link mb-2 active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Data Pemohon</a>
								<a class="nav-link mb-2 " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Data Mempelai Pria</a>
								<a class="nav-link mb-2" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Data Mempelai Wanita</a>

								<a class="nav-link mb-2 " id="v-pills-ayah-tab" data-toggle="pill" href="#v-pills-ayah" role="tab" aria-controls="v-pills-ayah" aria-selected="false">Data Ayah</a>
								<a class="nav-link mb-2" id="v-pills-ibu-tab" data-toggle="pill" href="#v-pills-ibu" role="tab" aria-controls="v-pills-ibu" aria-selected="false">Data Ibu</a>
								<a href="" id="balik" class="Kembali btn btn-outline-danger"><i class="bx bx-left-arrow-alt font-size-16 align-middle mr-2"></i> Kembali</a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
								<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
									<div class="card border border-primary">
										<div class="card-body">
											<div class="card bg-primary text-white-20">
												<div class="card-body">
													<span class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Data Pemohon : </span>
												</div>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nama Lengkap dan Alias</label>
													<div class="col-md-8">
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
								<div class="tab-pane fade  show " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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
													<label for="example-text-input" class="col-md-4 col-form-label">Kewarganegaraan</label>
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
								<div class="tab-pane fade" id="v-pills-ayah" role="tabpanel" aria-labelledby="v-pills-ayah-tab">
									<div class="card border border-warning">
										<div class="card-body">
											<div class="card bg-primary text-white-20">
												<div class="card-body">
													<span class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Data Ayah</span>
												</div>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nama Lengkap dan Alias</label>
													<div class="col-md-8">
														<input class="form-control " placeholder="Nama Ayah" type="text" id="nama_ayah">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nomor NIK</label>
													<div class="col-md-8">
														<input class="form-control " name="nik_ayah" placeholder="Nomor NIK Ayah" type="number" id="nik_ayah">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tempat Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="place_ayah" placeholder="Tempat Lahir Ayah" type="text" id="place_ayah">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tanggal Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="date_ayah" type="date" id="date_ayah">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Kebangsaan</label>
													<div class="col-md-8">
														<input class="form-control " name="national_ayah" type="text" placeholder="Kebangsaan" id="national_ayah">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Agama</label>
													<div class="col-md-8">
														<select id="religion_ayah" name="religion_ayah"class=" form-control select2">
															<option value="" > Pilih </option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Pekerjaan</label>
													<div class="col-md-8">
														<input class="form-control " name="profession_ayah" type="text" id="profession_ayah">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
													<div class="col-md-8">
														<textarea class="form-control" placeholder="Alamat Ayah" id="address_ayah"></textarea>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="v-pills-ibu" role="tabpanel" aria-labelledby="v-pills-ibu-tab">
									<div class="card border border-success">
										<div class="card-body">
											<div class="card bg-primary text-white-20">
												<div class="card-body">
													<span class="mt-0  text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i> Data Ibu Mempelai </span>
												</div>
											</div>
											<div class="card-body">
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nama Lengkap dan Alias</label>
													<div class="col-md-8">
														<input class="form-control " placeholder="Nama Ibu" type="text" id="nama_ibu">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Nomor NIK</label>
													<div class="col-md-8">
														<input class="form-control " name="nik_ibu" placeholder="Nomor NIK Ibu" type="number" id="nik_ibu">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tempat Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="place_ibu" placeholder="Tempat Lahir Ibu" type="text" id="place_ibu">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Tanggal Lahir</label>
													<div class="col-md-8">
														<input class="form-control " name="date_ibu" type="date" id="date_ibu">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Kebangsaan</label>
													<div class="col-md-8">
														<input class="form-control " name="national_ibu" type="text" placeholder="Kebangsaan" id="national_ibu">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Agama</label>
													<div class="col-md-8">
														<select id="religion_ibu" name="religion_ibu"class=" form-control select2">
															<option value="" > Pilih </option>
														</select>
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Pekerjaan</label>
													<div class="col-md-8">
														<input class="form-control " name="profession_ibu" type="text" id="profession_ibu">
													</div>
												</div>
												<div class="form-group row">
													<label for="example-text-input" class="col-md-4 col-form-label">Alamat</label>
													<div class="col-md-8">
														<textarea class="form-control" placeholder="Alamat Ibu" id="address_ibu"></textarea>
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

	let idDataInfo = '<?=$_GET['id'];?>';
	let KodePelayanan = '<?=$_GET['KodePelayanan'];?>';
	$('#balik').attr("href","?Halaman=pembuatan_surat_pengantar_nikah&Aksi=info&id="+KodePelayanan+"");

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
	$('#religion_ayah').select2({
		data : Agama,
		width: 'auto',
		dropdownAutoWidth: true,
	});
	$('#religion_ibu').select2({
		data : Agama,
		width: 'auto',
		dropdownAutoWidth: true,
	});

	let dataKeterangan = {
		id_license_marriage : idDataInfo
	};

	$.ajax({
		type : 'POST',
		data : JSON.stringify(dataKeterangan),
		url  : '../../../api/license_marriage/marriage_data/show.php',
		processData: false,
		dataType:"json",
		success :function(results) {
			let Pemohon = results.data.Pemohon;
			let YangNikah = results.data.YangMenikah;
			let OrangTua = results.data.OrangTua;
			marriage_guardian_name: $('#name_users').val(Pemohon['marriage_guardian_name']).attr('readonly', true);
			place_of_birth        : $('#place_users').val(Pemohon['place_of_birth']).attr('readonly', true).prop("disabled", true);
			date_of_birth         : $('#date_users').val(Pemohon['date_of_birth']).attr('readonly', true);
			national              : $('#national_users').val(Pemohon['national']).attr('readonly', true);
			religion              : $('#religion_users').val(Pemohon['religion']).trigger('change').attr('readonly', true).prop("disabled", true);
			religion_men              : $('#religion_men').val(YangNikah['religion_men']).trigger('change').attr('readonly', true).prop("disabled", true);
			religion_female              : $('#religion_female').val(YangNikah['religion_female']).trigger('change').attr('readonly', true).prop("disabled", true);
			profession            : $('#profession_users').val(Pemohon['profession']).attr('readonly', true);
			kk_number             : $('#kk_users').val(Pemohon['kk_number']).attr('readonly', true);
			nik_number            : $('#nik_users').val(Pemohon['nik_number']).attr('readonly', true);
			rt               : $('#rt').val(Pemohon['rt_number']).attr('readonly', true);
			rw              						: $('#rw').val(Pemohon['rw_number']).attr('readonly', true);
			saksi1              						: $('#saksi1').val(Pemohon['saksi_one']).attr('readonly', true);
			saksi2              		: $('#saksi2').val(Pemohon['saksi_two']).attr('readonly', true);
			address              		: $('#address_users').val(Pemohon['address']).attr('readonly', true);

			brides_name_men       : $('#nama_men').val(YangNikah['brides_name_men']).attr('readonly', true);
			bin_men               : $('#bin_men').val(YangNikah['bin_men']).attr('readonly', true);
			place_of_birth_men     : $('#place_men').val(YangNikah['place_of_birth_men']).attr('readonly', true);
			date_of_birth_men      : $('#date_men').val(YangNikah['date_of_birth_men']).attr('readonly', true).prop('disable',true);
			profession_men         : $('#profession_men').val(YangNikah['profession_men']).attr('readonly', true);
			kk_number_men         : $('#kk_men').val(YangNikah['kk_number_men']).attr('readonly', true).prop('disable',true);
			nik_number_men        : $('#nik_men').val(YangNikah['nik_number_men']).attr('readonly', true);
			marital_status_men   : $('#status_men').val(YangNikah['marital_status_men']).attr('readonly', true);
			address_female       : $('#address_female').val(YangNikah['address_female']).attr('readonly', true);
			brides_name_female    : $('#nama_female').val(YangNikah['brides_name_female']).attr('readonly', true);
			bin_female            : $('#bin_female').val(YangNikah['bin_female']).attr('readonly', true);
			place_of_birth_female : $('#place_female').val(YangNikah['place_of_birth_female']).attr('readonly', true);
			date_of_birth_female  : $('#date_female').val(YangNikah['date_of_birth_female']).attr('readonly', true).prop('disable',true);
			profession_female     : $('#profession_female').val(YangNikah['profession_female']).attr('readonly', true);
			marital_status_female : $('#status_female').val(YangNikah['marital_status_female']).attr('readonly', true);
			kk_number_female      : $('#kk_female').val(YangNikah['kk_number_female']).attr('readonly', true);
			nik_number_female     : $('#nik_female').val(YangNikah['nik_number_female']).attr('readonly', true);
			address_men            : $('#address_men').val(YangNikah['address_men']).attr('readonly', true);

			national_men            : $('#national_men').val(YangNikah['national_men']).attr('readonly', true);
			national_female            : $('#national_female').val(YangNikah['national_female']).attr('readonly', true);

			father_name           : $('#nama_ayah').val(OrangTua['father_name']).attr('readonly', true).prop("disabled", true);
			number_nik_father     : $('#nik_ayah').val(OrangTua['number_nik_father']).attr('readonly', true).prop("disabled", true);
			place_of_birth_father : $('#place_ayah').val(OrangTua['place_of_birth_father']).attr('readonly', true).prop("disabled", true);
			date_of_birth_father  : $('#date_ayah').val(OrangTua['date_of_birth_father']).attr('readonly', true).prop("disabled", true);
			national_father       : $('#national_ayah').val(OrangTua['national_father']).attr('readonly', true).prop("disabled", true);
			religion_father       : $('#religion_ayah').val(OrangTua['religion_father']).trigger('change').attr('readonly', true).prop("disabled", true);
			profession_father     : $('#profession_ayah').val(OrangTua['profession_father']).attr('readonly', true).prop("disabled", true);
			address_father        : $('#address_ayah').val(OrangTua['address_father']).attr('readonly', true).prop("disabled", true);
			mother_name           : $('#nama_ibu').val(OrangTua['mother_name']).attr('readonly', true).prop("disabled", true);
			number_nik_mother     : $('#nik_ibu').val(OrangTua['number_nik_mother']).attr('readonly', true).prop("disabled", true);
			place_of_birth_mother : $('#place_ibu').val(OrangTua['place_of_birth_mother']).attr('readonly', true).prop("disabled", true);
			date_of_birth_mother  : $('#date_ibu').val(OrangTua['date_of_birth_mother']).attr('readonly', true).prop("disabled", true);
			national_mother       : $('#national_ibu').val(OrangTua['national_mother']).attr('readonly', true).prop("disabled", true);
			religion_mother       : $('#religion_ibu').val(OrangTua['religion_mother']).trigger('change').attr('readonly', true).prop("disabled", true);
			profession_mother     : $('#profession_ibu').val(OrangTua['profession_mother']).attr('readonly', true).prop("disabled", true);
			address_mother        : $('#address_ibu').val(OrangTua['address_mother']).attr('readonly', true).prop("disabled", true);



		}
	});


</script>