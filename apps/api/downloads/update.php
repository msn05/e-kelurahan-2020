<?php
require __DIR__.'/../../config/api.php';

$table      = 'downloads';
$primaryKey = 'id_download';
$selected='';
$setData = [
    'id_download' => request('id_download'),
    'actions'     => 2
];

$setRules = [
    'id_download' => 'required',
];

$setAliases = [
    'id_download' => 'Pilih Berkas.!',
];


post();

require __DIR__.'/../../config/validator.php';

$id_users = @$_SESSION['users_id'];

$employe_id = $show_by_id('employee_data','users_id',$id_users,$selected);

$check_data = $show_by_id($table,'id_download',request($primaryKey),$selected);

if($check_data->actions == 1){

    $keterangan = $show_by_id('statement_letter','code_print',$check_data->code_print,$selected);
    $keteranganID = $keterangan->entrance_service_id;
    // echo json_encode($keteranganID);
    if(!empty($keterangan)){
        $pesenan = $show_by_id('entrance_services','code_entrance_services',$keterangan->entrance_service_id,$selected);
        $pesan = $show_by_id('message_entrance_service','entrance_service_id',$keteranganID,$selected);
        $pesanS = $pesan->id_message;
        // echo json_encode($pesanS);
        $updateKeterangan = [
            'file_status_id' => 1,
            'employee_data_id'=> $employe_id->id_employee
        ];

        $updateLog = [
            'entrance_service_id' => $pesenan->code_entrance_services,
            'file_status_id'      => 1,
            'employee_id'         =>  $employe_id->id_employee
        ];

        $PesanNya = [
            'message' => 'Berkas Selesai Silakan Downloads.!',
            'employee_id' => $employe_id->id_employee
        ];

        $LogPesanS = [
          'message_entrance_id' => $pesanS,
          'message'=> 'Berkas Selesai Silakan Downloads.!'
      ];

      $InsertPesanLagi = $insert('log_message',$LogPesanS);
      if(!empty($InsertPesanLagi)){
        $results = $update('entrance_services','code_entrance_services',$keteranganID,$updateKeterangan);
        $insert = $insert('log_file_submision',$updateLog);
        $updateLagi = $update($table,$primaryKey,request($primaryKey),$setData);
        $updatePesan = $update('message_entrance_service','id_message',$pesanS,$PesanNya);
        reponse_ok("Berhasil.",$results);
        exit();
    }


}
$Pajak = $show_by_id('certificate_taxandbuilding','code_tax',$check_data->code_print,$selected);
$IdPajak = $Pajak->entrance_service_id;

if(!empty($Pajak)){
    $pesenan = $show_by_id('entrance_services','code_entrance_services',$IdPajak,$selected);
    $pesan = $show_by_id('message_entrance_service','entrance_service_id',$IdPajak,$selected);
    $pesanS = $pesan->id_message;
        // echo json_encode($pesanS);
    $updateKeterangan = [
        'file_status_id' => 1,
        'employee_data_id'=> $employe_id->id_employee
    ];

    $updateLog = [
        'entrance_service_id' => $pesenan->code_entrance_services,
        'file_status_id'      => 1,
        'employee_id'         =>  $employe_id->id_employee
    ];

    $PesanNya = [
        'message' => 'Berkas Selesai Silakan Downloads.!',
        'employee_id' => $employe_id->id_employee
    ];

    $LogPesanS = [
      'message_entrance_id' => $pesanS,
      'message'=> 'Berkas Selesai Silakan Downloads.!'
  ];

  $InsertPesanLagi = $insert('log_message',$LogPesanS);
  if(!empty($InsertPesanLagi)){
    $results = $update('entrance_services','code_entrance_services',$IdPajak,$updateKeterangan);
    $insert = $insert('log_file_submision',$updateLog);
    $updateLagi = $update($table,$primaryKey,request($primaryKey),$setData);
    $updatePesan = $update('message_entrance_service','id_message',$pesanS,$PesanNya);
    reponse_ok("Berhasil.",$results);
    exit();
}


}

$Nikah = $show_by_id('license_marriage','id_license_marriage',$check_data->code_print,$selected);
$IdNikah = $Nikah->entrance_service_id;

if(!empty($Nikah)){
    $pesenan = $show_by_id('entrance_services','code_entrance_services',$IdNikah,$selected);
    $pesan = $show_by_id('message_entrance_service','entrance_service_id',$IdNikah,$selected);
    $pesanS = $pesan->id_message;
        // echo json_encode($pesanS);
    $updateKeterangan = [
        'file_status_id' => 1,
        'employee_data_id'=> $employe_id->id_employee
    ];

    $updateLog = [
        'entrance_service_id' => $pesenan->code_entrance_services,
        'file_status_id'      => 1,
        'employee_id'         =>  $employe_id->id_employee
    ];

    $PesanNya = [
        'message' => 'Berkas Selesai Silakan Downloads.!',
        'employee_id' => $employe_id->id_employee
    ];

    $LogPesanS = [
      'message_entrance_id' => $pesanS,
      'message'=> 'Berkas Selesai Silakan Downloads.!'
  ];

  $InsertPesanLagi = $insert('log_message',$LogPesanS);
  if(!empty($InsertPesanLagi)){
    $results     = $update('entrance_services','code_entrance_services',$IdNikah,$updateKeterangan);
    $insert      = $insert('log_file_submision',$updateLog);
    $updateLagi  = $update($table,$primaryKey,request($primaryKey),$setData);
    $updatePesan = $update('message_entrance_service','id_message',$pesanS,$PesanNya);
    reponse_ok("Berhasil.",$results);
    exit();
}


}



}else{

    response_failed("Data Sudah Diproses");
    exit();
}


