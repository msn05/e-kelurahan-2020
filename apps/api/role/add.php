<?php

/*detail belum
  makek json data fieldnyo 
  next time kalo lah sudah selesai galo
*/

require __DIR__.'/../../config/api.php';
$table      = 'role';
$primaryKey = 'id_role';
$selected='';

$setData = [
  'name'                    => request('name'),
];

$setRules = [
  'name'    => 'required|alpha'
];

$setAliases = [
  'name'    => 'Nama Akses'
];


post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,'name',request('name'),$selected);
if(!empty($check_data)){
  response_failed("Data sudah ada.!");
  exit();
}

$results = $insert($table, $setData);
// var_dump($results);die();

if(!empty($results)){
  reponse_ok("Berhasil Ditambahkan!", $results);
  exit();
}

