<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table = 'message_entrance_service';
$primaryKey = 'id_message';
$selected='';
$fileTable = 'file_requirements';
$tableFile = 'file_manager';

post();

// require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id('entrance_services','code_entrance_services',request('service_categori_id'),$selected);
// // var_dump($check_data->service_categori_id);
$where = [
    'service_categori_id' => request('service_categori_id'),
    'status'              => 'Berlaku'
];
$file_req   = $filter_data_all($fileTable,$where, $selected);
$TotalCount = count($file_req);

// echo json_encode($TotalCount);


$file_manage = [
    'entrance_service_code' =>request('id_file_manager'),
];

$file_managers   = $filter_data_all($tableFile,$file_manage, $selected);
$cekSelesai      = $show_by_id('message_entrance_service','entrance_service_id',request('id_file_manager'), $selected);
// $TotalCounts = count($file_managers);
if(!empty($cekSelesai)){
     response_failed("Anda Sudah menyelesaikannya.!");
    exit();
}
// var_dump($file_managers);die();
if($file_managers != NULL){
    $TotalCounts = count($file_managers);
    $TotalKurang = $TotalCount - $TotalCounts;
    // echo json_encode($TotalKurang);
    if($TotalCounts == $TotalCount){

        $dataMessage = 'Berkas sudah selesai diupload. mohon untuk dilakukan verifikasi.!';
        $messageID = [
            'id_message'          => $uniqueCode($table,$primaryKey),
            'entrance_service_id' => request('id_file_manager'),
            'message'             => $dataMessage
        ];

        $messageData =  [
            'message_entrance_id' => $uniqueCode($table,$primaryKey),
            'message'             =>  $dataMessage
        ];
            $results = $insert('message_entrance_service',$messageID);
            if(!empty($results)){
                $logInsert  = $insert('log_message',$messageData);
                reponse_ok("Berhasil.!", $results);
                exit();
            }
            response_failed("Terjadi kesalahan.!");
    exit();
    }
    response_failed("Silakan Lengkapi Berkas! Anda kurang ".$TotalKurang." Berkas");
    exit();
// }
}else{
    $dataMessage = 'Berkas Persyaratan tidak ada. mohon untuk dilakukan verifikasi.!';
    $messageID = [
        'id_message'          => $uniqueCode($table,$primaryKey),
        'entrance_service_id' => request('id_file_manager'),
        'message'             => $dataMessage
    ];

    $messageData =  [
        'message_entrance_id' => $uniqueCode($table,$primaryKey),
        'message'             =>  $dataMessage
    ];
    $results = $insert('message_entrance_service',$messageID);
    $logInsert  = $insert('log_message',$messageData);
    reponse_ok("Berhasil. Silakan Tunggu dan akan dikonfirmasi pada halaman pesan.!");
    exit();
}