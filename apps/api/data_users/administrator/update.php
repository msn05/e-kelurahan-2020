<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'employee_data';
$primaryKey = 'id_employee';
$selected='';
$setData = [
    'id_employee'      => request('id_employee'),
    'name_employee'    => request('name_employee'),
    'phone_number'     => request('phone_number'),
    'number_identity'  => request('number_identity'),
    'position'         => request('position')
];

$setRules = [
    'phone_number'     => 'required|numeric',
    'number_identity'  => 'required|numeric|min:16',
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

require __DIR__.'/../../../config/validator.php';
$check_data = $show_by_id($table,'id_employee',request('id_employee'),$selected);
if(request('phone_number') == $check_data->phone_number && request('number_identity') == $check_data->number_identity){
    $results = $update($table, $primaryKey, request('id_employee'), $setData);
    if(!empty($results)){
            reponse_ok("Berhasil Diupdate!", $results);
            exit();
        }
        exit();
}
$check_data_number = $show_by_id($table,'phone_number',request('phone_number'),$selected);
if(!empty($check_data_number) && request('number_identity') == $check_data->number_identity){
    response_failed("Nomor Hp Sudah Ada.!");
    exit();
}
$check_data_ni = $show_by_id($table,'number_identity',request('number_identity'),$selected);
if(!empty($check_data_ni) && request('phone_number') == $check_data->phone_number){
    response_failed("Nomor Identitas Sudah Ada.!");
    exit();
}

$results = $update($table, $primaryKey, request('id_employee'), $setData);
    if(!empty($results)){
            reponse_ok("Berhasil Diupdate!", $results);
            // exit();
    }