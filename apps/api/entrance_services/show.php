<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = ['entrance_services',
                'citizen_data',
                'employee_data',
                'service_categories',
                'file_status'];

$primaryKey = ['citizen_data_id',
                'id_citizen_data',
                'employee_data_id',
                'id_employee',
                'service_categori_id',
                'id_service_categori',
                'id_status',
                'file_status_id'];

// $selected   = ['entrance_services.code_entrance_services',
//                 'citizen_data.full_name',
//                 'employee_data.name_employee',
//                 'service_categories.name',
//                 'file_status.status_name'];


post();

// $results = null;

if(request('code_entrance_services')){
   // echo json_encode(request('code_entrance_services'));
   $id = [
              'entrance_services.code_entrance_services' =>request('code_entrance_services')
         ];

   $dataService = $joinFive  ($table,$primaryKey,$id,$selected);

   $dataFile = [
      'service_categori_id'   => $dataService->service_categori_id
   ];
   $dataFileUpload = [
      'entrance_service_code'   => $dataService->code_entrance_services
   ];

   $FileData = $filter_data_all('file_requirements',$dataFile,'service_categori_id');
   $FileDataUpload = $filter_data_all('file_manager',$dataFileUpload,'entrance_service_code');


}
if(!empty($dataService)){
    reponse_ok("OK", ["Data_Layanan" => $dataService,
                      "Data_File"    => $FileData,
                      "Upload"       => $FileDataUpload
                     ]
               );
    exit();
}

// reponse_not_found("Data Tidak Ditemukan!");


