<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'file_requirements';
$primaryKey = 'id_file_requietmens';

$setData = [
    'service_categori_id'   => request('service_categori_id'),
    'name_file'             => request('name_file'),
    'status'                => request('status')
];

$setRules = [
    'service_categori_id'   => 'required',
    'name_file'             => 'required'
];

$setAliases = [
    'name_file'             => 'Nama Berkas',
    'service_categori_id'   => 'Kategori Pelayanan'
];

post();

require __DIR__.'/../../config/validator.php';

$check_data = $filter_data($table,$setData);
if(!empty($check_data)){
    response_failed("Data sudah ada di kategeri ini.!");
    exit();
}

$results = $insert($table, $setData);

if(!empty($results)){
    reponse_ok("Berhasil Ditambahkan!", $results);
    exit();
}

