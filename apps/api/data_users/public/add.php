<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'citizen_data';
$primaryKey = 'id_citizen_data';
$selected='';
$session_user = @$_SESSION['users_id'];
$setData = [
    'phone_number'                    => request('phone_number'),
    'number_identification_card'      => request('number_identification_card'),
    'phone_number_whatshapp'          => request('phone_number_whatshapp'),
    'full_name'                       => request('full_name'),
    'address'                         => request('address'),
    'profession'                      => request('profession'),
    'users_id'                        => $session_user
];

$setRules = [
    'phone_number'                    => 'required|numeric|digits_between:10,16',
    'number_identification_card'      => 'required|numeric|digits_between:16,16',
    'phone_number_whatshapp'          => 'required|numeric|digits_between:10,16',
    'full_name'                       => 'required|alpha_spaces|max:60',
    'address'                         => 'required',
    'profession'                      => 'required'
];

$setAliases = [
    'phone_number'                    => 'Nomor Handphone',
    'number_identification_card'      => 'Nomor identitas Kartu',
    'phone_number_whatshapp'          => 'Nomor Whatshapp',
    'full_name'                       => 'Nama lengkap anda',
    'address'                         => 'Alamat',
    'profession'                      => 'Profesi'
];


post();

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
$check_data = $show_by_id($table,'number_identification_card',request('number_identification_card'),$selected);
if(!empty($check_data)){
    response_failed("Nomor Identitas Sudah Ada.!");
    exit();
}
$check_data = $show_by_id($table,'phone_number_whatshapp',request('phone_number_whatshapp'),$selected);
if(!empty($check_data)){
    response_failed("Nomor WA Sudah Ada.!");
    exit();
}
$results = $insert($table, $setData);

if(!empty($results)){
    reponse_ok("Berhasil Ditambahkan!", $results);
    exit();
}

