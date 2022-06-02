<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'users';
$primaryKey = 'id_users';
$selected   = '';

$setData = [
    'id_users'              => request('id_users'),
    'username'              => request('username'),
];

$setRules = [
    'username'   => 'required|email'
];

$setAliases = [
    'username'   => 'Username ',
];

post();

require __DIR__.'/../../config/validator.php';

$where = [
    'id_users' => request('id_users')
];

$dataUpdate = [
    'username' => request('username'),
    'password' => password_hash(request('password'), PASSWORD_DEFAULT)
];

$check_data = $show_by_id($table,$primaryKey,request('id_users'),$selected);

if(!empty(request('password'))){
    $results = $update($table, $primaryKey,request('id_users'), $dataUpdate);
    reponse_ok("Berhasil Diupdate!", $results);
    exit();
}

if(request('username') == $check_data->username){
    $results = $update($table, $primaryKey,request('id_users'), $setData);
    if(!empty($results)){
        reponse_ok("Berhasil Diupdate!", $results);
        exit();
    }
    exit();
}
$check_data_null = $show_by_id($table,'username',request('username'),$selected);
if(empty($check_data_null->username)){
    $results = $update($table, $primaryKey, request('id_users'), $setData);
    if(!empty($results)){
        reponse_ok("Berhasil Diupdate!", $results);
        exit();
    }
    exit();
}else{
    response_failed("Data Sudah Ada.!");
    exit();
}