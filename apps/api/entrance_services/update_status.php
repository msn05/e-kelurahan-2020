<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'entrance_services';
$primaryKey = 'code_entrance_services';

$setData = [
    'code_entrance_services'     => request('code_entrance_services'),
    'employee_data_id'           => request('employee_data_id'),
    'file_status_id'             => request('file_status_id')
];

$setRules = [
    'file_status_id'        => 'required'
];

$setAliases = [
    'file_status_id'        => 'Pilih Status'
];


$logTable = 'log_file_submision';

post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,$primaryKey,request($primaryKey));

$log = [
    'entrance_service_id' => $check_data->code_entrance_services,
    'file_status_id'      => request('file_status_id'),
    'employee_id'         => request('employee_data_id')
];


if(request('file_status_id') == 3){
    response_failed("Silakan Dilakukan verifikasi terlebih dahulu.!");
    exit();
}

$result = $update($table,$primaryKey,request($primaryKey),$setData);

if(!empty($result)){
    $insert = $insert($logTable,$log);
    if(!empty($insert)){
        reponse_ok("Berhasil Diupdate!", $results);
        exit();
    }
    exit();
}


