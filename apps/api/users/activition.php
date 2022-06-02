<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'users';
$primaryKey = 'id_users';
$selected   = '';

$setData = [
    'id_users'              => request('id_users'),
    'status'              	=> request('status')
];

$setRules = [
    'status'   => 'required'
];

$setAliases = [
    'status'   => 'Status'
];

post();

require __DIR__.'/../../config/validator.php';


$check_data = $show_by_id($table,$primaryKey,request('id_users'),$selected);
// echo json_encode($check_data);

if(request('status') === $check_data->status){
    response_failed("Tidak Ada Perubahan Data");
    exit();

}

$results = $update($table, $primaryKey,request('id_users'), $setData);
if(!empty($results)){
    reponse_ok("Berhasil Diupdate!", $results);
    exit();
}
