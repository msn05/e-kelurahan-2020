<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'statement_letter';
$primaryKey = 'code_print';

$setData = [
    'code_print'          => request('code_print'),
];

$setRules = [
    'code_print'          => 'required'
];

$setAliases = [
    'code_print'            => 'Kode Pencetakan'
];


post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,$primaryKey,request($primaryKey));
if($check_data->actions === 'true'){

    $fileDone = [
        'file_status_id' => 1
    ];

    $log = [
        'entrance_service_id' =>$check_data->entrance_service_id,
        'file_status_id'      =>1
    ];

    $message = [
        'entrance_service_id' => $check_data->entrance_service_id,
        'message'             => 'Berkas sudah selesai. Silakan Download pada menu downloads.!'
    ];

    $updateExtranStatus = $update('entrance_services','code_entrance_services',$check_data->entrance_service_id,$fileDone);

    if(!empty($updateExtranStatus)){
        $insertLog = $insert('log_file_submision',$log);
        if(!empty($insertLog)){
            $messageInsert = $insert('message_entrance_service',$message);
            reponse_ok("Berhasil Diupdate!", $messageInsert);
            exit();
        }
    exit();
    }
}
response_failed("Maaf belum disetujui lurah.!");
exit();

