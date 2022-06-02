<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'marriage_data';
$primaryKey = 'id_marriage_data';
$selected='';


post();

$results = null;

if (request($primaryKey)) {
    $results = $show_by_id($table, $primaryKey, request($primaryKey),$selected);
// } else if(request('license_marriage_id')){
}elseif(request('license_marriage_id')){
    // echo json_encode(request('license_marriage_id'));
    $results = $show_by_id($table,'license_marriage_id', request('license_marriage_id'),$selected);
// }else{
    // $results= $show($table,$selected);
}

if(!empty($results)){
    reponse_ok("OK", $results);
    exit();
}

reponse_not_found("Data Tidak Ditemukan!");
