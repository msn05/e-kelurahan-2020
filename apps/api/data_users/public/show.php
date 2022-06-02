<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'citizen_data';
$primaryKey = 'id_citizen_data';
$selected   = '';
post();

$results = null;

if (request($primaryKey)) {
    $results = $show_by_id($table, $primaryKey, request($primaryKey),$selected);

}else if(request('full_name')){
    $results = $show_by_id($table, 'full_name', request('full_name'),$selected);

}else if(request('number_identification_card')){
    $results = $show_by_id($table, 'number_identification_card', request('number_identification_card'),$selected);

}else if(request('phone_number')){
    $results = $show_by_id($table, 'phone_number', request('phone_number'),$selected);
    
}else if(request('id_users')){
    // $selected = 'full_name';
    $results = $show_by_id($table, 'users_id', request('id_users'),$selected);

}else{
    $results = $show($table,$selected);
    
}
if(!empty($results)){
    reponse_ok("OK", $results);
    exit();
}
reponse_not_found("Data Tidak Ditemukan!");
