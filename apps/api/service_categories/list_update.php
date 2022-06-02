<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'service_categories';
$primaryKey = 'id_service_categori';
$selected='';


post();

$results = null;

if (request($primaryKey)) {
    $results = $show_by_id($table, $primaryKey, request($primaryKey),$selected);
// } else if(request('marriage_guardian_name')){
    // $results = $show_by_id($table,'marriage_guardian_name', request('marriage_guardian_name'),$selected);
}else{
    $where = [
        'status' => 'Show'
    ];
    $results = $filter_data_all($table,$where,'status');
}

if(!empty($results)){
    reponse_ok("OK", $results);
    exit();
}

reponse_not_found("Data Tidak Ditemukan!");
