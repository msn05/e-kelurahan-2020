<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'license_marriage';
$primaryKey = 'id_license_marriage';
$selected='';
// $selected   = [
//                 'id_license_marriage',
//                 'entrance_service_id',
//                 'marriage_guardian_name',
//                 'created_at',
//                 'nik_number',
//                 'actions'
//               ];
post();

$results = null;

if (request($primaryKey)) {
    $results = $show_by_id($table, $primaryKey, request($primaryKey),$selected);
} else if(request('marriage_guardian_name')){
    $results = $show_by_id($table,'marriage_guardian_name', request('marriage_guardian_name'),$selected);
}else{
     $where_data = [
        // 'users_id' => NULL,
         'actions'=> 'pending'
      ];
      $results = $filter_data_all($table,$where_data, $selected);
      // $results = $show($table,$selected);
    // $results = $show($table,$selected);
}

if(!empty($results)){
    reponse_ok("OK", $results);
    exit();
}

reponse_not_found("Data Tidak Ditemukan!");
