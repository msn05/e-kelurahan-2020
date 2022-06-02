<div class="row">
	<div class="col-12">
		<div class="alert alert-danger " role="alert">
			<h4 class="mt-0 mb-4 text-danger"><i class="mdi mdi-alert-circle-outline mr-3"></i>Keterangan</h4>
			<h6 for="" class="mdi mdi-arrow-right text-dark">Keterangan Status dalam keadaan pending berarti anda belum melakukan <b>request ( permintaan ) persetujuan </b> tanda tangan lurah</h6>
			<h6 for="" class="mdi mdi-arrow-right text-dark">Untuk hal tersebut, silakan klik tombol persetujuan lurah dengan warna tombol biru</h6>
			<h6 for="" class="mdi mdi-arrow-right text-dark">Untuk mengeneret file silakan klik tombol genered pdf yang berwarna hijau</h6>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-3">
						<a href="?Halaman=pembuatan_berkas_pengajuan_keterangan" class="Kembali btn btn-danger waves-effect waves-light"><i class="bx bx-left-arrow-alt font-size-20 align-middle mr-2"></i> Kembali</a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<h4 class="card-title mb-3">Halaman Ini Menampung Pembuatan Data </h4>
				<table id="datatable" class="tabelrole table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
				</table>
			</div>

		</div>
	</div>
</div>
<script>
	$(document).ready( function () {
		const Role  = <?=$_SESSION['session_role'];?>;
		const id  = "<?=$_GET['id'];?>";

		let jenisSurat = {
			id_service_categori : id
		};

		$.ajax({
			type : "POST",
			data : JSON.stringify(jenisSurat),
			url  : '../../../api/service_categories/list_update.php',
			processData : false,
			dataType :'json',
			success : function(respone){
				let KeteranganSurat = respone.data['name'];
				$('.card-title').append(KeteranganSurat);
			}
		})
		$('.tabelrole').DataTable({
			"processing": true,
			"serverSide": true,
			"autoWidth": false,
			"scrollCollapse" : true,
			"scrollX": true,
			"scrollY":true,
			"ajax": {
				"data" : {
					service_categori_id : id
				},
				"url": "../../../api/license_marriage/request.php",
				"type": "POST"
			},
			"aoColumns" : [
			{ "data": "code_print", "title": "No", "name": "code_print","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
			}},
			{ "data": "NamaPembuat", "title": "Pemohon", "name": "NamaPembuat" },
			{ "data": "id_marriage_data", "title": "Mempelai", "name": "id_marriage_data" ,  "render": function(data,type,rows){
				if(rows.id_marriage_data !== '')
					return `${rows.Pria} <i class="mdi mdi-heart"></i> ${rows.Wanita}`
				else
					return ``;
			}
		},
		{ "data": "id_marriage_data", "title": "Orang Tua Mempelai", "name": "id_marriage_data" ,  "render": function(data,type,rows){
			if(rows.id_marriage_data !== '')
				return `${rows.father_name}  &  ${rows.mother_name}`
			else
				return ``;
		}
	},
	{ "data": "StatusSurat", "title": "Status", "name": "StatusSurat" },
	{ "data": "CreatedSurat", "title": "Tanggal Dibuat", "name": "CreatedSurat" },
	{ "data": "code_print", "title": "Aksi", "name": "code_print", "render":function(data,type,rows){
		 if(Role ==1)

				return`<a href="?Halaman=pembuatan_surat_pengantar_nikah&Aksi=form&id=${rows.code_print}&KodePelayanan=${rows.KodePelayanan}"   
			class="btn btn-outline-info waves-effect waves-light btn-xs "  
			title=" Lihat" 
			<span class=" mdi mdi-info"></span>Lihat</a> <button id="pengajuan" value='${rows.code_print}' data-load="" class="btn btn-outline-primary" title="Pengajuan TTD lurah"><i class="mdi mdi-priority-high "></i> Persetujuan Lurah</button> <button id="generated" value='${rows.code_print}' data-load="" class="btn btn-outline-success" title="Generete PDF"><i class=" mdi mdi-file-pdf-box-outline "></i> Buat PDF</button>`

			else
				return `a href="?Halaman=pembuatan_surat_pengantar_nikah&Aksi=form&id=${rows.code_print}&KodePelayanan=${rows.KodePelayanan}"   
			class="btn btn-outline-info waves-effect waves-light btn-xs "  
			title=" Lihat" 
			<span class=" mdi mdi-info"></span>Lihat</a>`

		} },

	
	]
});


		$(document).on('click','#pengajuan',(function(){
			let data = {
				code_print  : $(this).val(),
			}; 

			Swal.fire({
				title: 'Anda Yakit?',
				text: 'Data sudah benar.!',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Lanjutkan',
				cancelButtonText: 'Batalkan'
			}).then((result) => {
				if (result.isConfirmed) {

					$.ajax({
						type : 'POST',
						data : JSON.stringify(data),
						url  : '../../../api/request_signature_lurah/statement_letter/add.php',
						processData:false,
						dataType: "json",
						success: function (respone)
						{
							SwalOk.fire({text: respone.messages })
							.then((respone)=>{
								location.reload(true); 
							});
						},
						error:function(jqXHR, textStatus, errorThrown){
							let msg = JSON.parse(jqXHR.responseText);
							SwalError.fire({text: msg.messages })
						}

					});
				} else {
					Swal.fire(
						'Batal',
						'Anda Telah Membatalkan :)',
						'error'
						);
				}
			});

		}));


		$(document).on('click','#generated',(function(){
			let dataGenereted = {
				id_license_marriage  : $(this).val(),
			}; 
			Swal.fire({
				title: 'Anda Yakit?',
				text: 'Ingin mencetak berkas.!',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Lanjutkan',
				cancelButtonText: 'Batalkan'
			}).then((result) => {
				if (result.isConfirmed) {

					$.ajax({
						type : 'POST',
						data : JSON.stringify(dataGenereted),
						url  : "../../../api/genered_pdf/marriage/add.php",
						processData:false,
						dataType: "json",
						success: function (respone)
						{
							SwalOk.fire({text: respone.messages })
							.then((respone)=>{
								location.reload(true); 
							});
						},
						error:function(jqXHR, textStatus, errorThrown){
							let msg = JSON.parse(jqXHR.responseText);
							SwalError.fire({text: msg.messages })
						}

					});
				} else {
					Swal.fire(
						'Batal',
						'Anda Telah Membatalkan :)',
						'error'
						);
				}
			});

		}));

	} );
</script>