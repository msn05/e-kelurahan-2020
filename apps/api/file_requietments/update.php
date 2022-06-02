<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'file_requirements';
$primaryKey = 'id_file_requietmens';

// $status = request('status')=="Berlaku" ? request('status') : 'Tidak Berlaku';

$setData = [
    $primaryKey                 => request('id_file_requietmens'),
    'service_categori_id'       => request('service_categori_id'),
    'status'                    => request('status'),
    'name_file'                 => request('name_file')
];

$setRules = [
    'service_categori_id'   => 'required',
    'status'                => 'required',
    'name_file'             => 'required|alpha_spaces'
];
$setAliases = [
    'service_categori_id'   => 'Kode Pelayanan',
    'status'                => 'Status Pelayanan',
    'name_file'             => 'Nama Pelayanan'
];

post();

require __DIR__.'/../../config/validator.php';

$where = [
    'service_categori_id'   => request('service_categori_id'),
    'name_file'             => request('name_file'),
    'status'                => request('status')
];

// $result

$check_file = $filter_data($table,$where);
    if(!empty($check_file)){
        response_failed("Berkas pada layanan ini sudah.!");
        exit();
    }
    $result = $update($table,$primaryKey,request($primaryKey),$setData);
    if(!empty($result)){
        reponse_ok("Berhasil Diupdate!", $results);
        exit();
    }
