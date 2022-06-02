<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="alert alert-danger mb-0" role="alert">
				<h4 class="mt-0 mb-4 text-danger"><i class="mdi mdi-alert-circle-outline mr-3"></i>Keterangan</h4>
				<h6 for="" class="mdi mdi-arrow-right text-dark">Silakan Gunakan Fungsi Filter untuk mencari data.!</h6>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form  action="../../../api/genered_pdf/laporan/laporan.php" method="POST" target="_blank" >
					<div class="row">
						<div class="form-group col-lg-3">
							<label for="email">Dari Tanggal</label>
							<input type="hidden" name="jenisLaporan" id="jenisLaporan" class="form-control">
							<input type="date" name="startdate" id="startdate" class="form-control">
						</div>
						<div class="form-group col-lg-3">
							<label for="email">Sampai</label>
							<input type="date" name="enddate" id="enddate" class="form-control">
						</div>
						<div class="form-group mt-4">
							<button type="submit" id="simpanPelayanan" class="btn btn-success waves-effect waves-light mt-1">Show</button>
							<button type="submit" id="cetak" class="btn btn-dark waves-effect waves-light mt-1">Cetak</button>

						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<div class="row" id="Data">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Laporan .</h4>
			</div>
			<div class="card-body">
				<table id="datatable" class="tabelrole table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				</table>
			</div>

		</div>
	</div>
</div>
<script>

	const Keterangan = '<?=$_GET['Keterangan'];?>';
	const Tabel = $('#Data').hide();

	$(document).ready( function () {

		if(Keterangan === 'Menikah'){
			$('#jenisLaporan').val('SPK-0009');
			$('#simpanPelayanan').on('click',(function(e){
				e.preventDefault();
				let start = $('#startdate').val();
				let end = $('#enddate').val();
				if(start != '' && end != '' ){
					Tabel.show();
					TabelPelayananMasuk.ajax.reload();
				}else{
					SwalError.fire({text: "Silakan Isi Form dengan benar.!"})
				}
			}));

		} else if(Keterangan === 'Pajak'){
			$('#jenisLaporan').val('SPK-0012');
			$('#simpanPelayanan').on('click',(function(e){
				e.preventDefault();
				let start = $('#startdate').val();
				let end = $('#enddate').val();
				if(start != '' && end != '' ){
					Tabel.show();
					TabelPelayananMasuk.ajax.reload();
				}else{
					SwalError.fire({text: "Silakan Isi Form dengan benar.!"})
				}
			}));
		}else{
			$('#simpanPelayanan').on('click',(function(e){
				e.preventDefault();
				let start = $('#startdate').val();
				let end = $('#enddate').val();
				if(start != '' && end != '' ){
					Tabel.show();
					TabelPelayananMasuk.ajax.reload();
				}else{
					SwalError.fire({text: "Silakan Isi Form dengan benar.!"})
				}
			}));
		}


		const TabelPelayananMasuk = $('.tabelrole').DataTable({
			"paging" : false,
			"searching" : false,
			"serverSide": true,
			"autoWidth": false,
			"scrollCollapse" : true,
			"scrollX": true,
			"scrollY":true,
			"ajax": {
				"url": (Keterangan === 'Menikah') ? "../../../api/request_signature_lurah/show_marriage.php" : (Keterangan === 'Pajak' ? "../../../api/request_signature_lurah/show_pajak.php" : "../../../api/request_signature_lurah/show_keterangan.php"),
				"type": "POST",
				"data": function ( d ) {
					return $.extend( {}, d, {
					    "status" : '',
						"startdate": $('#startdate').val(),
						"enddate": $('#enddate').val()
					} );
				},
			},
			"aoColumns" : [
			{ "data": "id_request", "title": "No", "name": "id_request","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
			}},
			{  "data": "code_printRSL", "title": "Kode Surat", "name": "code_printRSL" },
			{ "data": "CreatedSurat", "title": "Tanggal Dibuat", "name": "CreatedSurat" },
			{ "data": "SuratStatus", "title": "Status Surat", "name": "SuratStatus" },
			{ "data": "NamaPemohon", "title": (Keterangan === 'Menikah') ? "Nama Pemohon" : "Nama Staf Pembuat", "name": "NamaPemohon" },
			{ "data": "code_printRSL", "title": (Keterangan === 'Menikah') ? "RT / RW" : "Posisi Staf", "name": "code_printRSL" ,
			"render" : function (data, type, rows) {
				if(Keterangan === 'Menikah')
					return `${rows.RT} / ${rows.RW}`
				else return`${rows.position}`
			}
		}

		]

	});



		

	});

</script>