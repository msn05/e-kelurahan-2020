<?php
session_start();
if(@$_SESSION['TrueLog'] == true){
	header("location:page/layouts/index.php");
}else{

	require __DIR__.'/../helpers/uri.php';

	?>

	<!doctype html>
		<html class="no-js " lang="en">
		<head>
			<meta charset="utf-8" />
			<title> <?=$Apps;?> </title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
			<meta content="Themesbrand" name="author" />
			<!-- App favicon -->
			<link rel="shortcut icon" href="assets/images/favicon.ico">

			<!-- Bootstrap Css -->
			<link href="<?=uri('');?>/dist/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
			<!-- Icons Css -->
			<link href="<?=uri('');?>/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
			<!-- App Css-->
			<link href="<?=uri('');?>/dist/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
			<script src="<?=uri('');?>/dist/assets/libs/jquery/jquery.min.js"></script>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet"></link>
			<!-- <link href="<?=uri('');?>/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" /> -->
<!--
        <style>
        .theme-orange .authentication{
            background:white;
            no-repeat center center fixed;
        }
        .theme-orange .authentication .card .header{
            background:linear-gradient(45deg, #75746f, #CCFFE5);
            border-radius:10px;
        }
        .card{
            background:#91d2cb;
            border-radius:13px;
        }
        .title{
            color:#000000
        }
        .form-group .form-line .form-label{
            color:#000000;
        }
        .form-group .form-line {
            border-bottom: 1px solid #1a1414;
        }
    </style> -->
</head>

<body>
	<div class="home-btn d-none d-sm-block">
		<a href="/" class="text-dark"><i class="fas fa-home h2"></i></a>
	</div>
	<div class="account-pages my-5 pt-sm-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="card overflow-hidden">
						<div class="bg-login text-center">
							<div class="bg-login-overlay"></div>
							<div class="position-relative">
								<h5 class="text-white font-size-20">Welcome </h5>
								<h5 class="text-white-50 mb-0">in E-kelurahan Lebung Gajah Palembang.</h5>
								<a href="javascript:void(0);" class="logo logo-admin mt-4">
									<img src="<?=uri();?>/dist/assets/images/Lambang_Kota_Palembang.gif" alt="" height="50">
								</a>
							</div>
						</div>
						<div class="card-body pt-5">
							<div class="p-2">
								<form class="form-horizontal">
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" class="form-control" id="username" placeholder="Enter username">
									</div>

									<div class="form-group">
										<label for="userpassword">Password</label>
										<input type="password" class="form-control" id="password" placeholder="Enter password">
									</div>

									<div class="mt-3">
										<button id="simpan" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
									</div>

								</form>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Jquery Core Js -->
	<script src="<?=uri();?>/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?=uri();?>/dist/assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="<?=uri();?>/dist/assets/libs/simplebar/simplebar.min.js"></script>
	<script src="<?=uri();?>/dist/assets/libs/node-waves/waves.min.js"></script>

	<!-- <script src="<?=uri();?>/assets/js/app.js"></script> -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="<?=uri('apps/');?>js/swall.js"></script>
	<script>

		$("#simpan").on('click',(function(e) {
			e.preventDefault();
			let data  = {
				username : $('#username').val(),
				password : $('#password').val()
			};

			$.ajax({
				type: "POST",
				data: JSON.stringify(data),
				url : "../api/login/index.php",
				processData:false,
				dataType: "json",
				success: function (respone)
				{
					SwalOk.fire({text: respone.messages})
					.then((respone)=>{
						window.location='page/temp/index.php';
					});
				},
				error:function(jqXHR, textStatus, errorThrown){
					console.log("jqXHR", jqXHR);
					let msg = jqXHR.responseJSON;
					SwalError.fire({text: msg.messages })
				}

			});
		}));

	</script>
</body>
</html>
<?php }?>