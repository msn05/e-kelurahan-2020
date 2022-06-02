<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'service_categories';
$primaryKey = 'id_service_categori';
$selected='';
// $status = request('status')=="Show" ? request('status') : 'Hide';

$setData = [
    'id_service_categori'   => request('id_service_categori'),
    'status'                => request('status'),
    'name'                  => request('name'),
    'user_id'               => request('user_id'),
];



$setRules = [
    'id_service_categori'   => 'required',
    'status'                => 'required',
    'name'                  => 'required',
    'user_id'               => 'required'
];

$setAliases = [
    'id_service_categori'   => 'Kode Pelayanan',
    'status'                => 'Status Pelayanan',
    'name'                  => 'Nama Pelayanan',
    'user_id'               => 'User'
];

post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,$primaryKey,request('id_service_categori'),$selected);
if(request('name') == $check_data->name){
    $results = $update($table, $primaryKey, request('id_service_categori'), $setData);
    if(!empty($results)){
            reponse_ok("Berhasil Diupdate!", $results);
            exit();
        }
        exit();
}
$check_data_null = $show_by_id($table,'name',request('name'),$selected);
   if(empty($check_data_null->name)){
        $results = $update($table, $primaryKey, request('id_service_categori'), $setData);
            if(!empty($results)){
                reponse_ok("Berhasil Diupdate!", $results);
                exit();
            }
        exit();
    }else{
        response_failed("Data Sudah Ada.!");
        exit();
    }

