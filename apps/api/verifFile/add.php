<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'entrance_services';
$primaryKey = 'code_entrance_services';
$selected='';
$setData = [
    'code_entrance_services'  => request('code_entrance_services'),
    'user_id'                 => request('user_id')
];

// echo json_encode($setData);

$setRules = [
    'code_entrance_services'    => 'required'
];

$setAliases = [
    'code_entrance_services'    => 'Kode Pelayanan'
];

$fileTable = 'file_requirements';
$tableFile = 'file_manager';
post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,$primaryKey,request($primaryKey),$selected);
// var_dump($check_data->service_categori_id);
$where = [
    'service_categori_id' =>$check_data->service_categori_id,
    'status'              => 'Berlaku'
];

$whereMessage = [
    'entrance_service_id' =>request('code_entrance_services')
];

$file_req   = $filter_data_all($fileTable,$where,$selected);
$TotalCount = count($file_req);


$file_manage = [
    'entrance_service_code' =>request('code_entrance_services'),
];

$file_managers   = $filter_data_all($tableFile,$file_manage,$selected);
$TotalCounts = count($file_managers);
$check_data_message = $show_by_id('message_entrance_service','entrance_service_id',request($primaryKey),$selected);

if($check_data->file_status_id == 2){
// echo json_encode($file_managers);
if($file_managers != NULL){
    $TotalCounts = count($file_managers);
    // var_dump($TotalCounts);die();
    if($TotalCounts == $TotalCount){

        $dataUpdate =
        ['employee_data_id' => request('user_id'),
        'file_status_id' => 3
        ];
        $logFile =[
            'entrance_service_id' => request($primaryKey),
            'file_status_id'      => 3,
            'employee_id'         => request('user_id')
        ];

         $dataMes = 'Mohon dipantau pada website karena pengajuan berkas berhasil diverifikasi dan sudah diterima.';

            $messageID = [
                    'employee_id'         => request('user_id'),
                    'message'             => $dataMes
                ];
        $messageLog = [
            'message_entrance_id'   =>$check_data_message->id_message,
            'message'             => $dataMes,
        ];

        $results = $update('message_entrance_service','id_message',$check_data_message->id_message,$messageID);
            if($results != false){
            $insertthen = $insert('log_message',$messageLog);
            $update = $update($table, $primaryKey, request($primaryKey), $dataUpdate);
            $insert = $insert('log_file_submision',$logFile);
            reponse_ok("Berhasil Diverifikasi.!", $results);
                exit();
            }
    exit();
    }
    $TotalKurang = $TotalCount - $TotalCounts;
    $dataUpdates  = [
                'employee_data_id' => request('user_id'),
                'file_status_id'   => 4
            ];
            $logFile =[
                'entrance_service_id' => request($primaryKey),
                'file_status_id'      => 4,
                'employee_id'         => request('user_id')
            ];

            $dataMes = 'Mohon maaf berkas anda terdapat kesalahan. Silakan diulangi pengajuannya.!';

            $messageID = [
                    'employee_id'         => request('user_id'),
                    'message'             => $dataMes
                ];

      $messageLog = [
        'message_entrance_id'   =>$check_data_message->id_message,
        'message'             => $dataMes,
    ];
      
    $results = $update('message_entrance_service','id_message',$check_data_message->id_message,$messageID);
        if($results != false){
            $insertthen = $insert('log_message',$messageLog);
            $update = $update($table, $primaryKey, request($primaryKey), $dataUpdates);
            $insert = $insert('log_file_submision',$logFile);
            response_failed("Data Digagalkan verifikasi karena memiliki upload kekurangan berkas.!", $results);
            exit();
        }
        exit();
    // }
        // exit();
}
 $dataUpdate =
        ['employee_data_id' => request('user_id'),
        'file_status_id' => 3
        ];
        $logFile =[
            'entrance_service_id' => request($primaryKey),
            'file_status_id'      => 3,
            'employee_id'         => request('user_id')
        ];

         $dataMes = 'Mohon dipantau pada website karena pengajuan berkas berhasil diverifikasi dan sudah diterima.';

            $messageID = [
                    'employee_id'         => request('user_id'),
                    'message'             => $dataMes
                ];
        $messageLog = [
            'message_entrance_id'   =>$check_data_message->id_message,
            'message'             => $dataMes,
        ];

        $results = $update('message_entrance_service','id_message',$check_data_message->id_message,$messageID);
            if($results != false){
            $insertthen = $insert('log_message',$messageLog);
            $update = $update($table, $primaryKey, request($primaryKey), $dataUpdate);
            $insert = $insert('log_file_submision',$logFile);
            reponse_ok("Berhasil Diverifikasi.!", $results);
                exit();
            }
// response_failed("Terjadi kesalahan.!");
// exit();
}else{
response_failed("Data sudah diverifikasi");
exit();
}