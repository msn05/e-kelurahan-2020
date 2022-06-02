
<div class="cta-section" data-bg-image="<?=uri();?>/portal/images/background/cta-bg.jpg">
	<div class="auto-container">
		<div class="row align-items-center">
			<div class="col-lg-12">
				<!-- CTA Content Start -->
				<div class="cta-content">
					<h3 class="title">Untuk Registrasi <span>Silakan isi form berikut ini</span></h3>
				</div>
				<!-- CTA Content End -->
			</div>
			
		</div>
	</div>
</div>
<div class="reputation-section-two style-two">
	<div class="auto-container">
		<div class="row clearfix">
			<!-- Form Column -->
			<div class="form-column col-lg-6 col-md-12 col-sm-12">
				<div class="inner-column">
					<div class="sec-title">
						<h2 class="text-danger"><strong>Keterangan</strong> </h2>
					</div>
					<div class="blocks-outer">
						<!-- Reputation Block -->
								<div class="reputation-block">
							<div class="inner-box">
								<h5>NIK</h5>
								<div class="text">Diisi dengan nomor KTP anda dan WAJIB 16 digit</div>
							</div>
						</div>
						<div class="reputation-block">
							<div class="inner-box">
								<h5>Username</h5>
								<div class="text">Diisi dengan email dan format harus berupa email.</div>
							</div>
						</div>
						
						<!-- Reputation Block -->
						<div class="reputation-block">
							<div class="inner-box">
								<h5>Password</h5>
								<div class="text">Diisi minimal 8 karakter</div>
							</div>
						</div>
						<div class="reputation-block">
							<div class="inner-box">
								<h5>Konfirmasi Password</h5>
								<div class="text">Diisi dengan password yang sudah diinput</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- Content Column -->
			<div class="form-column col-lg-6 col-md-12 col-sm-12">
				<div class="inner-column">
					<div class="form-boxed">
						<h5>Form Registrasi</h5>
						<div class="consult-form">
							<form method="post" action="donate.html">
								<!--Form Group-->
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="nik" id="nik" value="" placeholder="NIK Anda" required>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" id="username" value="" placeholder="Username Anda" required>
								</div>
								<!--Form Group-->
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" id="password" placeholder="Silakan isi password anda" required>
								</div>
								<div class="form-group">
									<label>Konfirmasi Password</label>
									<input type="text" name="compassword" id="compassword" placeholder="Silakan ulangi password anda" required>
								</div>
								<!--Form Group-->
								<div class="form-group">
									<button class="theme-btn btn-style-one" id="simpanData" type="submit" name="submit-form"><span class="txt">Registrasi</span></button>
								</div>
							</form>
							
						</div>
					</div>


					
				</div>
			</div>
			
		</div>
	</div>
</div>

<script>

	$("#simpanData").on('click',(function(e) {
		e.preventDefault();
		let data  = {
			username : $('#username').val(),
			password : $('#password').val(),
			nik : $('#nik').val(),
			compassword : $('#compassword').val()
		};

		$.ajax({
			type: "POST",
			data: JSON.stringify(data),
			url : "../api/users/public/add.php",
			processData:false,
			dataType: "json",
			success: function (respone)
			{
				SwalOk.fire({text: respone.messages})
				.then((respone)=>{
					location.reload(true);
				});
			},
			error:function(jqXHR, textStatus, errorThrown){
				let msg = JSON.parse(jqXHR.responseText);
				SwalError.fire({text: msg.messages })
			}

		});
	}));

</script>