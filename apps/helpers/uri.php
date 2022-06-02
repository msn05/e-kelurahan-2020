<?php
function uri($url = null) {
	$base_url = sprintf(
		"%s://%s%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		$_SERVER['SERVER_NAME'],
		in_array($_SERVER['SERVER_PORT'], [80, 443]) ? '' : ":" . $_SERVER['SERVER_PORT']
	);


	// $base_url = "http://e_kelurahan.nf/vendors";
	if ($url != null) {
		return $base_url."/".$url;
	} else {
		$base_url = "{$base_url}/vendors";
		return $base_url ;
	}
}


$Aplikasi = 'E-Kelurahan Lebung Gajah Palembang';
$Apps = 'E-Kelurahan Lebung Gajah Palembang';
