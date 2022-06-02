<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'users';
$primaryKey = 'id_users';
$selected='';

$setData = [
    'username'   => request('username'),
    'password'   => password_hash(request('password'),PASSWORD_DEFAULT),
    'status'     => 'Aktif',
    'role_id'    => 1,
];

$setRules = [
    'username'   => 'required|email',
    'password'   => 'required|min:8'
];

$setAliases = [
    'username'   => 'Username ',
    'password'   => 'Password'
];

post();

require __DIR__.'/../../../config/validator.php';

$where = [
    'username' => request('username')
];

$check_data = $filter_data($table,$where);
if(!empty($check_data)){
    response_failed("Email sudah digunakan!");
    exit();
}

$results = $insert($table, $setData);

if(!empty($results)){
    reponse_ok("Berhasil Ditambahkan!", $results);
    exit();
}

