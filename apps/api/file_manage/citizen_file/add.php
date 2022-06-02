<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'file_manager';
$primaryKey = 'id_file_manager';

$setData = [
    'entrance_service_code'    => request('id'),
    'file_requirements_id'     => request('SelectStatus'),
    'file'                     => $_FILES['file']
];


$setRules = [
    'file'                     => 'required|uploaded_file:0,500K,pdf',
];

$setAliases = [
    'file'                      => 'File'
];


post();


require __DIR__.'/../../../config/validator.php';

$where = [
    'entrance_service_code' => request('id'),
    'file_requirements_id'  => request('SelectStatus')
];

$check_data = $filter_data($table,$where);

if(!empty($check_data)){
    response_failed("Anda Sudah menambahkan pada Jenis File.!");
    exit();
}

$namaFile       = $_FILES['file']['name'];
$namaSementara  = $_FILES['file']['tmp_name'];

$explode        = explode('.',$namaFile);
$explode        = strtolower(end($explode));

$NewFile        = uniqid('',true). '.'.$explode;


$dir            = '../../../file_manager/file/'.$NewFile;

$File = move_uploaded_file($namaSementara, $dir);
if($File){
    $Insert = [
        'entrance_service_code'    => request('id'),
        'file_requirements_id'     => request('SelectStatus'),
        'file'                     => $NewFile
    ];

    $results = $insert($table, $Insert);

    if(!empty($results)){
        reponse_ok("Berhasil Ditambahkan!", $results);
        exit();
    }
    response_failed("Terjadi Kesalahan.!");
    exit();
}
response_failed("Anda Sudae.!");

