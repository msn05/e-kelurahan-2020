<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Halaman Tanda Tangan Digital Lurah</h4>
                <p class="card-title-desc">Silakan isi melakukan tanda tangan pada canvas berikut. Silakan pilih menggunakan media form atau media canvas</p>
                <div class="row">
                	<div class="col-lg-6">
                		<div class="card-header bg-transparent border-primary">
                                <h5 class="headname my-0 text-primary">Tanda Tangan Via Canvas</h5>
                            </div>
                            <div>
                                <div class="card-body">

                                </div>
                            </div>
	                <div>
	                    <canvas class="canvas"></canvas>
	                </div>
	                <button type="submit" id="simpan" class="btn btn-dark "><i class="bx bx-check-double font-size-16 align-middle mr-2"></i> SIMPAN PNG</button>
	                <a href="?Halaman=role" class="btn btn-danger waves-effect waves-light"><i class="bx bx-block font-size-16 align-middle mr-2"></i> Kembali</a>
	            </div>
	        	<div class="col-lg-6">
	        		  <div class="card-header bg-transparent border-primary">
                                <h5 class="headname my-0 text-primary"><i class=" mdi mdi-folder-upload-outline  mr-4"></i>Upload Berkas</h5>
                            </div>
                            <div>
                                	<form id="InputUpload" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                	  <div class="form-group row mb-5">
                                            <label for="example-text-input" class="col-md-4 col-form-label">File</label>
                                            <div class="col-md-8 mb-5">
                                            	<input type="file" name="file" id="file" class="form-control">
                                            </div>
                                </div>
                                        <button type="submit" id="simpanUpload" title="Upload File" class="btn btn-success mt-5 waves-effect waves-light"><i class="bx bx-check-double font-size-16 align-middle mr-2"></i> <b>Simpan</b></button>
                                </div>
                            </form>
                            </div>
	        	</div>
	        </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
   <div class="col-12">
        <div class="card">
            <div class="card-body">
                 <table id="datatable" class="tabelTTD table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                 </table>
            </div>
        </div>
    </div>
</div>
<!-- https://github.com/szimek/signature_pad -->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> -->
<script>

	let Role = "<?=@$_SESSION['session_role'];?>";
	// console.log(Role);
	if(Role == 2){

		var canvas       = document.querySelector("canvas");
		var signaturePad = new SignaturePad(canvas,{
			   minWidth: 1,
		});

		$(document).on('click','#simpan',function(){
			var signature = signaturePad.toDataURL(); // save image as PNG
			$.ajax({
				type : "POST",
				url  : '../../../api/request_signature_lurah/add.php',
				data : {
					file : signature,
				},
				success : function(respone)
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


		});

		$('#InputUpload').submit(function(e){
                e.preventDefault();

                    const form     = $(this);
                    const formData = new FormData(form[0]);
                    const url      = '../../../api/request_signature_lurah/add_upload.php';

                    $.ajax({
                        type        : "POST",
                        url         : url,
                        data        : formData,
                        async       : false,
                        cache       : false,
                        contentType : false,
                        enctype     : 'multipart/form-data',
                        processData : false,
                        success     : function(respone){
                            SwalOk.fire({text: respone.messages})
                                .then((respone)=>{
                                location.reload(true)
                            });

                        },
                        error:function(jqXHR, responseText, errorThrown){
                        let msg = JSON.parse(jqXHR.responseText);
                        SwalError.fire({text: msg.messages })                
                        }
                    });

        });


          $('.tabelTTD').DataTable({
            "processing": true,
            "serverSide": true,
            "autoWidth": false,
            "scrollCollapse" : true,
            "scrollX": true,
            "scrollY":true,
            "ajax": {
            "url": "../../../api/request_signature_lurah/show.php",
                   "type": "POST"
            },
            "aoColumns" : [
                               { "data": "id_sig", "title": "No", "name": "id_sig","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
                                }},
                                { "data": "file", "title": "TTD", "name": "file","render": function(data,type,rows){
                                   return '<a href=../../../file_manager/signature_lurah/'+rows['file']+' target="_blank">'+rows['file']+'</a>';
                                  	}
                                  },
                                { "data": "created_at", "title": "Tanggal", "name": "created_at" },
                                { "data": "actions", "title": "Status", "name": "actions" },
                                 {"data": "id_sig", "title":"Aksi", "name":"id_sig", "render": function(data,type,rows){
                                   return '<button id="nonAktif" value="'+rows["id_sig"]+'" data-load="" class="btn btn-sm btn-danger text-white" title="Non Aktifkan TTD ini.!"><i class=" bx bx-lock-alt "></i></button>';
                                    }
                                }
                             
                  ]
        });

          $(document).on('click','#nonAktif',(function(){
            let data = {
                id_sig  : $(this).val(),
            }; 

            Swal.fire({
                  title: 'Anda Yakit?',
                  text: 'Data Tidak Bisa Dikembalikan.!',
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Lanjutkan',
                  cancelButtonText: 'Batalkan'
                }).then((result) => {
                  if (result.isConfirmed) {

                    $.ajax({
                        type : 'POST',
                        data : JSON.stringify(data),
                        url  : '../../../api/request_signature_lurah/non_aktif.php',
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
  


	} else {
		  SwalError.fire({text: "Anda Tidak Memiliki Akses ke halaman ini.!" })
		  .then(()=>{
		  		  window.location.href="index.php";
		  })
	}



</script>