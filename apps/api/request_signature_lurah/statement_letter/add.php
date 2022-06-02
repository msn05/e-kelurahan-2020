<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'request_signature_lurah';
$primaryKey = 'code_print';
$selected='';
$setData = [
    'code_print' => request('code_print')
];

$setRules = [
    'code_print' => 'required'
];

$setAliases = [
    'code_print' => 'Nama Berkas'
];

post();

require __DIR__.'/../../../config/validator.php';
$check_data = $show_by_id($table,$primaryKey,request($primaryKey),$selected);
if(!empty($check_data)){
    response_failed("Anda Sudah menambahkan data.!");
    exit();
}
$results = $insert($table,$setData); 
if(!empty($results)){
    reponse_ok("Data Berhasil Diajukan. Silakan Tunggu.!", $results);
  exit();
}  

reponse_not_found();
exit();