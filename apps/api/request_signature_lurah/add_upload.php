<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'signature_lurah';
$primaryKey = 'id_sig';
$selected='';
$setData = [
    'file'                     => $_FILES['file']
];


$setRules = [
    'file'                     => 'required|uploaded_file:0,200K,png',
];

$setAliases = [
    'file'                      => 'File TTD'
];


post();


require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,'actions','berlaku',$selected);

if(!empty($check_data)){
    response_failed("Anda Sudah menambahkan TTD dan masuh berlaku.!");
    exit();
}

$namaFile       = $_FILES['file']['name'];
$namaSementara  = $_FILES['file']['tmp_name'];

$explode        = explode('.',$namaFile);
$explode        = strtolower(end($explode));

$NewFile        = uniqid('',true). '.'.$explode;


$dir            = '../../file_manager/signature_lurah/'.$NewFile;

$File = move_uploaded_file($namaSementara, $dir);
if($File){
    $Insert = [
        'actions'     => 'berlaku',
        'file'         => $NewFile
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

