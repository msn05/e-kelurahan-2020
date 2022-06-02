<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'entrance_services';
$primaryKey = 'code_entrance_services';
$selected='';
post();
// $results = null;

if(request('code_entrance_services')){
   // echo json_encode(request('code_entrance_services'));
   // $id = [
   //            'entrance_services.code_entrance_services' =>request('code_entrance_services')
   //       ];

   // $dataService = $joinFive  ($table,$primaryKey,$id,$selected);

   // $dataFile = [
   //    'service_categori_id'   => $dataService->service_categori_id
   // ];
   // $dataFileUpload = [
   //    'entrance_service_code'   => $dataService->code_entrance_services
   // ];

   // $FileData = $filter_data_all('file_requirements',$dataFile,'service_categori_id');
   // $FileDataUpload = $filter_data_all('file_manager',$dataFileUpload,'entrance_service_code');

}elseif(request('service_categori_id')){

   $results = $show_by_id($table, 'service_categori_id', request('service_categori_id'), $selected);


}else{
$session_user = $_SESSION['users_id'];

   $user_id = $show_by_id('citizen_data', 'users_id', $session_user, $selected);
   $Keterangan = $_POST['keterangan'];
   if($Keterangan === 'keterangan'){
   	$where_data = [
   		'file_status_id' => 3,
   	];
   	$where_field = ['SPK-0008','SPK-0009','SPK-0012'];
      $results = $joinData($table,$where_data, $where_field, 'service_categori_id');
   }elseif($Keterangan === 'pajak'){
      $where_data = [
         'file_status_id' => 3,
         'service_categori_id'=>'SPK-0012'
      ];
      $results = $filter_data_all($table,$where_data, $selected);
   }else{
     $where_data = [
      'citizen_data_id' => $user_id->id_citizen_data,
      'file_status_id' => 2,
      'service_categori_id'=>'SPK-0009'
   ];
   $results = $filter_data_all($table,$where_data, $selected);
}

}
if(!empty($results)){
  reponse_ok("Data Ditemukan.! ", $results);
  exit();
}
reponse_not_found("Data Tidak Ditemukan!");


