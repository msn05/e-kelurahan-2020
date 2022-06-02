<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'employee_data';
$primaryKey = 'id_employee';
$selected='';
post();

$results = null;

if (request($primaryKey)) {
    $results = $show_by_id($table, $primaryKey, request($primaryKey),$selected);

}else if(request('name_employee')){
    $results = $show_by_id($table, 'name_employee', request('name_employee'),$selected);

}else if(request('number_identity')){
    $results = $show_by_id($table, 'number_identity', request('number_identity'),$selected);

}else if(request('id_users')){
      // $selected = 'name_employee';
      $results = $show_by_id($table, 'users_id', request('id_users'),$selected);
}else{
    $results = $show($table,$selected);
}
   
if(!empty($results)){
    reponse_ok("OK", $results);
    exit();
}
reponse_not_found("Data Tidak Ditemukan!");
