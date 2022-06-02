<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'service_categories';
$primaryKey = 'id_service_categori';
$selected='';
$setData    = [$primaryKey => request('id_service_categori')];
$setRules   = [$primaryKey => 'required'];
$setAliases = [$primaryKey => 'Kode Pelayanan'];

delete();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table, $primaryKey,request($primaryKey),$selected);

if($check_data->status === 'Show'){
    response_failed("Maaf Pelayanan ini tidak dapat dihapus.!");
    exit();
}

$results = $delete($table, $primaryKey, request('id_service_categori'));

if(!empty($results)){
    reponse_ok("Berhasil Dihapus!", $results);
    exit();
}

reponse_not_found();