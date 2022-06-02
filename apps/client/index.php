<?php
	require __DIR__.'/../helpers/uri.php';
?>

<?php

	require __DIR__.'/page/home/layouts/header.php';

	$page = @$_GET['page'];

	if(!empty($page)){
		include __DIR__.'/page/home/'.$page.'.php';
	}else{
		include __DIR__.'/page/home/dashboard.php';
	}



	require __DIR__.'/page/home/layouts/footer.php';


?>

