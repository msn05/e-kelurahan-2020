
<div class="cta-section" data-bg-image="<?=uri();?>/portal/images/background/cta-bg.jpg">
	<div class="auto-container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<!-- CTA Content Start -->
				<div class="cta-content">
					<h3 class="title">Berkas <span>Persyaratan Pengajuan </span></h3>
				</div>
				<!-- CTA Content End -->
			</div>
			
		</div>
	</div>
</div>
<div class="reputation-section-two style-two">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="row">
				<div class="col-md-5 ">
					<div class="nav border border-primary flex-column nav-pills me-5" id="v-pills-tab"  aria-orientation="vertical">
						
					</div>
				</div>
				<div class="col-md-7 border border-info bg-white">
					<div id="Sebelah">
					<img src="<?=uri();?>/dist/assets/images/Lambang_Kota_Palembang.gif" alt="" height="50" class="m-5 mx-auto d-block">
								<h4 class="text-center " ><strong>Kelurahan Lebung Gajah Palembang</strong></h4>
							</div>
					<div class="tab-content " id="v-pills-tabContent">
								
						<div class="auto-container">
							<div class="sec-title">
								<h5 >Berikut ini persyaratan yang harus dipenuhi dalam pelayaan</h5>
							</div>
							<table id="table_id" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th>Nama Persyaratan</th>
										<th>Format</th>
									</tr>
								</thead>
								<tbody id="Persyaratan"></tbody>
							</table>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>


	$('#v-pills-tabContent').hide();
	$.ajax({
		type : "POST",
		url : '../api/service_categories/list_update.php',
		dataType:false,
		cache : false,
		success : function(e){
			data = e.data;
			for(var key in data){
				$('div#v-pills-tab').append(
					'<button  value='+data[key]['id_service_categori']+' class=" nav-link" data-id="v-pills-'+data[key]['id_service_categori']+'-tab" data-bs-toggle="pill" data-bs-target="#v-pills-'+data[key]['id_service_categori']+'" type="button" role="tab" aria-controls="v-pills-'+data[key]['id_service_categori']+'" aria-selected="false">'+data[key]['name']+'</button>'
					);
			}

		}


	});
	$('button .nav-link').click(function() {
		$(this).siblings('button .nav-link').removeClass('active');
		$(this).addClass('active');
	});
							// const button = $("button").this(); 
							// console.log(button);
							$(document).on('click','[data-id]',(function(){
								

								button =  $(this).val();
						  		// console.log(button);

						  		const data = {
						  			service_categori_id : button
						  		};
						  		$.ajax({
						  			type : "POST",
						  			url  : '../api/file_requietments/list_update.php',
						  			data : JSON.stringify(data),
						  			dataType : "json",
						  			processData : false,
						  			success: function (respone)
						  			{   
						  				$('#v-pills-tabContent').show();
						  				$('#Sebelah').empty();
						  				let html = '';
						  				let i = 1;
						  				let Persyaratan = respone.data;
						  				
						  				
						  				for (var key in Persyaratan){
						  					html += 
						  					'<tr>'+
						  					'<td>'+i+++'</td>'+
						  					'<td>'+Persyaratan[key]['name_file']+'</td>'+
						  					'<td>PDF</td>'+
						  					'</tr>';
						  				}
						  				
						  				$('#Persyaratan').html(html);
						  			},
						  			error:function(jqXHR, textStatus, errorThrown){
						  				let html = '';
						  				html +='<tr><td class="text-center" colspan="3">Data Tidak Ditemukan</td></tr>';
						  				$('#Persyaratan').html(html);
						  			}

						  		});

						  	}));
							
						  </script> 