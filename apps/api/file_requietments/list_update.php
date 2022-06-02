<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'file_requirements';
$primaryKey = 'id_file_requietmens';
$selected='';
$selected='';

post();

$results = null;

if (request($primaryKey)) {
    $results = $show_by_id($table, $primaryKey, request($primaryKey),$selected);
// } else if(request('marriage_guardian_name')){
    // $results = $show_by_id($table,'marriage_guardian_name', request('marriage_guardian_name'),$selected);
// }else{
    // $results = $show($table,$selected);
}elseif(request('service_categori_id')){
    $where = [
        'service_categori_id' => request('service_categori_id'),
        'status'              => 'Berlaku'
    ];
        $results = $filter_data_all($table, $where, $selected);
}

if(!empty($results)){
    reponse_ok("OK", $results);
    exit();
}

reponse_not_found("Data Tidak Ditemukan!");
