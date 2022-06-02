<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'request_signature_lurah';
$primaryKey = 'id_request';
$selected='';

$setData = [
    'id_request' => request('id_request'),
    'status'     => request('status'),
];
// echo json_encode($setData);
$setRules = [
    'id_request'     => 'required'
];

$setAliases = [
    'id_request'     => 'Anda Harus memilih data.!'
];

post();

$getCodePrint = $show_by_id($table,$primaryKey,request($primaryKey),$selected);

// echo json_encode($getCodePrint->code_print);


require __DIR__.'/../../../config/validator.php';

if($getCodePrint->status == NULL){
    if(request('status') === 'diterima'){
        $updateStatusData = [
            'actions'      => 'diterima'
        ];
    } else{
        $updateStatusData = [
            'actions'      => 'ditolak'
        ];
    
    }

    $updates  = $update('certificate_taxandbuilding','code_tax',$getCodePrint->code_print,$updateStatusData);
    if(!empty($updates)){
        $results = $update($table,$primaryKey,request($primaryKey),$setData);
        if(!empty($results)){
        reponse_ok("Berhasil Diproses!", $results);
          exit();
        }  
    exit();
    }

} else if($getCodePrint->status !== NULL && request('status') === ''){
        // reponse_ok("Berhasil Diproses!", request('status'));
        $updateStatusData = [
            'actions'      => 'pending'
        ];
        $updates  = $update('certificate_taxandbuilding','code_tax',$getCodePrint->code_print,$updateStatusData);
        $dataUlang = [
            'status' => null
        ];
        $results = $update($table,$primaryKey,request($primaryKey),$dataUlang);
            if(!empty($results)){
            reponse_ok("Berhasil Diproses!", $results);
              exit();
            }  

}
response_failed("Data Sudah Diproses");