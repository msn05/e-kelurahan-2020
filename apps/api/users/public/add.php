<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'users';
$primaryKey = 'id_users';
$selected   = '';


$setData = [
    'username'   => request('username'),
    'password'   => request('password'),
    'nik'        => request('nik'),
    'compassword'=> request('compassword'),
    'status'     => 'Aktif',
    'role_id'    => 3,
];

$setRules = [
    'username'   => 'required|email',
    'password'   => 'required|min:8',
    'nik'        => 'required|numeric|digits_between:16,16',
    'compassword'=> 'required'
];

$setAliases = [
    'username'   => 'Username ',
    'password'   => 'Password',
    'nik'        => 'NIK',
    'compassword'=> 'Konfirmasi Password'
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
$check_nik = $show_by_id('citizen_data','number_identification_card',request('nik'),$selected);
if(!empty($check_nik)){
    response_failed("NIK sudah digunakan!");
    exit();
}

if(request('password') != request('compassword')){
    response_failed("Password Tidak Sama.!");
    exit();
}

$Data = [
    'username'   => request('username'),
    'password'   => password_hash(request('password'),PASSWORD_DEFAULT),
    'status'     => 'Aktif',
    'role_id'    => 3,
];
$results    = $insert($table, $Data);


$users_id   = $show_by_id($table,'username',request('username'),$selected);
// echo json_encode($users_id);
    $NikData = [
        'users_id'   =>$users_id->id_users,
        'number_identification_card' =>request('nik')
    ];

if(!empty($results)){
    $insertDataNik = $insert('citizen_data',$NikData);
    if(!empty($insertDataNik)){
        reponse_ok("Berhasil Ditambahkan!", $insertDataNik);
        exit();    
    }
    response_failed("Terjadi Kesalahan Input NIK.!");
    exit();
}

response_failed("Terjadi Kesalahan.!");
exit();