<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'entrance_services';
$primaryKey = 'code_entrance_services';
$selected='';
$setData = [
    'code_entrance_services'     => $uniqueCode($table, $primaryKey),
    'citizen_data_id'            => request('citizen_data_id'),
    'service_categori_id'        => request('service_categori_id'),
    'file_status_id'             => 2,
];

$setRules = [
    'service_categori_id'        => 'required'
];

$setAliases = [
    'service_categori_id'    => 'Pilih Nama Pelayanan'
];

$log = [
    'entrance_service_id'       => $uniqueCode($table, $primaryKey),
    'file_status_id'            => 2,
];

$logTable = 'log_file_submision';

post();

require __DIR__.'/../../config/validator.php';
$joinTable = 'citizen_data';

$check_data_service = $show_by_id('service_categories','id_service_categori',request('service_categori_id'),$selected);
if($check_data_service->status !== 'Hide'){

    $check_citizen = $show_by_id($joinTable,'id_citizen_data',request('citizen_data_id'),$selected);
    // var_dump($check_citizen->number_identification_card);
    if($check_citizen->number_identification_card && $check_citizen->full_name && $check_citizen->phone_number_whatshapp != null){
            if(isset($check_citizen->number_identification_card)){
            $where = [
                'citizen_data_id' => request('citizen_data_id'),
                'service_categori_id' => request('service_categori_id'),
            ];

            $status = ['1','4'];
            $check_data = $joinData($table,$where,$status,'file_status_id');
                if($check_data != null){
                    response_failed("Berkas Dalam Proses.!");
                    exit();
                }
                $result = $insert($table,$setData);
                if(!empty($result)){
                        $insert = $insert($logTable,$log);
                        reponse_ok("Berhasil Ditambahkan!", $result);
                        exit();
                    }    
            exit();
            }
    }else{
    response_failed("Data Anda Belum Lengkap.!");
    exit();
    }
}
response_failed("Maaf Layanan ini belum dibuka.!");
exit();
