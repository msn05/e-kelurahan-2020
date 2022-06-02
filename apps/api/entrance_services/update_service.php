<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'entrance_services';
$primaryKey = 'code_entrance_services';

$setData = [
    'code_entrance_services'     => request('code_entrance_services'),
    'service_categori_id'        => request('service_categori_id')
];

$setRules = [
    'service_categori_id'        => 'required'
];

$setAliases = [
    'service_categori_id'        => 'Pilih Layanan'
];


post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,$primaryKey,request($primaryKey));

if($check_data->file_status_id != 2){
    response_failed("Mohon maaf pengajuan sedang di proses.!");
    exit();
}

$result = $update($table,$primaryKey,request($primaryKey),$setData);
if(!empty($result)){
        reponse_ok("Berhasil Diupdate!", $results);
        exit();
}


