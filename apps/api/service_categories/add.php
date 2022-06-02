<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'service_categories';
$primaryKey = 'id_service_categori';
$selected='';

$setData = [
    'id_service_categori'     => $uniqueCode($table, $primaryKey),
    'status'                  => request('status'),
    'name'                    => request('name'),
    'user_id'                 => request('user_id')
];

$setRules = [
    'name'    => 'required|alpha_spaces',
    'user_id' => 'required|numeric',
    'status'    =>'required'
];

$setAliases = [
    'name'    => 'Nama Pelayanan',
    'user_id' => 'User',
    'status' => 'Status'
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

