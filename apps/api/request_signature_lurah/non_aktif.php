<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'signature_lurah';
$primaryKey = 'id_sig';
$selected='';

$setData = [
    'id_sig' => request('id_sig')
    // 'status' => request('status'),
];

$setRules = [
    'id_sig'     => 'required'
];

$setAliases = [
    'id_sig'     => 'Tanda Tangan Yang ingin dinonaktifkan harus dipilih.!'
];



post();

require __DIR__.'/../../config/validator.php';

$validStatus = $show_by_id($table,$primaryKey,request($primaryKey),$selected);
if($validStatus->actions === 'tidak berlaku'){
 	response_failed("TTD ini sudah dinonaktifkan!");
    exit();
}

$updateStatusData = [
    'actions'      => 'tidak berlaku'
];

$updates  = $update('signature_lurah',$primaryKey,request($primaryKey),$updateStatusData);
if(!empty($updates)){
    $results = $update($table,$primaryKey,request($primaryKey),$setData);
    if(!empty($results)){
    reponse_ok("Berhasil Dinon Aktifkan.!", $results);
      exit();
    }  
exit();
}
response_failed("Terjadi kesalahan.!");
exit();