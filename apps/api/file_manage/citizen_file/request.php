<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'file_manager';
$primaryKey = 'id_file_manager';
$selected='';
post();

// $results = null;

if (request($primaryKey)) {
    $results = $show_by_id($table, $primaryKey, request($primaryKey),$selected);

}else if(request('entrance_service_code')){
    $where = [
        'file_manager.entrance_service_code'=>request('entrance_service_code')
    ];
  
    $results = $db->table('file_manager')->join('file_requirements','file_manager.file_requirements_id = file_requirements.id_file_requietmens')->where($where)->getAll();
    // $results 	= $filter_data_all('file_manager',$id, $selected);
// }else if(request('number_identity')){
//     $results = $show_by_id($table, 'number_identity', request('number_identity'),$selected);

// }else if(request('id_users')){
//       // $selected = 'name_employee';
//       $results = $show_by_id($table, 'users_id', request('id_users'),$selected);
// }else{
//     $results = $show($table,$selected);
}

if(!empty($results)){
    reponse_ok("OK", $results);
    exit();
}

reponse_not_found("Data Tidak Ditemukan!");
