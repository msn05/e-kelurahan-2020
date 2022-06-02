<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'file_manager';
$primaryKey = 'id_file_manager';
$selected='';
$setData = [
    'id_file_manager'    => request('id_file_manager')
];


$setRules = [
    'id_file_manager'    => 'required',
];

$setAliases = [
    'id_file_manager'    => 'Pilih Data'
];


delete();

require __DIR__.'/../../../config/validator.php';

$check_file = $show_by_id($table,$primaryKey,request($primaryKey),$selected);

$File       = $check_file->file;
$dir            = '../../../file_manager/file/'.$File;

$Delete = unlink($dir);
if($Delete != false){
    $results = $delete($table, $primaryKey,request($primaryKey));
    if(!empty($results)){
        reponse_ok("Berhasil Dihapus.!", $results);
            exit();
    }
    exit();
}

response_failed("Terjadi Kesalahan.!");
   

