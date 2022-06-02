<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'employee_data';
$primaryKey = 'id_employee';
$selected='';
$setData = [
    'name_employee'    => request('name_employee'),
    'phone_number'     => request('phone_number'),
    'number_identity'  => request('number_identity'),
    'position'         => request('position'),
    'users_id'         => request('users_id')
];

$setRules = [
    'phone_number'     => 'required|numeric',
    'number_identity'  => 'required|numeric|digits_between:16,16',
    'position'         => 'required|alpha_spaces|max:50',
    'name_employee'    => 'required|alpha_spaces'
];

$setAliases = [
    'phone_number'     => 'Nomor Handphone',
    'number_identity'  => 'Nomor identitas kerja',
    'position'         => 'Posisi Kerja',
    'name_employee'    => 'Nama lengkap anda'
];


post();

// echo json_encode($setData);

require __DIR__.'/../../../config/validator.php';
$check_data = $show_by_id($table,'users_id',request('users_id'),$selected);
if(!empty($check_data)){
    response_failed("Anda Sudah menambahkan data.!");
    exit();
}

$check_data = $show_by_id($table,'phone_number',request('phone_number'),$selected);

if(!empty($check_data)){
    response_failed("Nomor HP Sudah Ada.!");
    exit();
}
$check_data = $show_by_id($table,'number_identity',request('number_identity'),$selected);
if(!empty($check_data)){
    response_failed("Nomor Identitas Sudah Ada.!");
    exit();
}

$results = $insert($table, $setData);
// echo json_encode($results);

if(!empty($results)){
    reponse_ok("Berhasil Ditambahkan!", $results);
    exit();
}

