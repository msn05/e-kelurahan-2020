<?php
/*
	|--------------------------------------------------------------------------
	| Register The Auto Loader
	|--------------------------------------------------------------------------
	|
	| Composer provides a convenient, automatically generated class loader for
	| this application. We just need to utilize it! We'll simply require it
	| into the script here so we don't need to manually load our classes.
	|
	*/

/* sumber ( https://github.com/izniburak/pdox/fork )*/

require __DIR__ . '/../../vendor/autoload.php';

$validator  = new Rakit\Validation\Validator;

$validator->setMessages([
	'required'   	=> ':attribute harus diisi',
	'email' 		=> ':attribute email tidak valid',
	'same' 			=> ':attribute tidak valid',
	'alpha_spaces' 	=> ':attribute hanya huruf',
	'alpha_num' 	=> '	:attribute Kombinasi Angka Huruf',
	'min'			=> ':attribute Kurang Minimal ',
	'numeric'		=> ':attribute Hanya angka',
	'digits_between' => ':attribute Kurang Min dan Tidak Lebih Max',
	'max'			=> ':attribute Lebih dari Maksimal',
	'alpha'			=> ':attribute Hanya Huruf',
	'date'			=> ':attribute Format Tanggal Y-m-d',
	// 'uploaded_file' => ':attribute File Harus',
]);
// $validator('uploaded_file')->fileTypes('jpeg|png')->message('Photo must be jpeg/png image')


$config = [
	'username'	=> '',
	'password'	=> '',
	'database'	=> '',
	'host'		=> 'localhost',
	'charset'	=> 'utf8',
	'collation'	=> 'utf8_general_ci',
	'prefix'	=> ''
];


$db = new \Buki\Pdox($config);
// PDO::ERRMODE_EXCEPTION means an SQL error throws an exception
$dateZone = date_default_timezone_set("Asia/Jakarta");
$Aplikasi = 'E-kelurahan Lebung Gajah Palembang';
