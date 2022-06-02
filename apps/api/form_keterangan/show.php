<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = ['statement_letter',
               'entrance_services',
               'citizen_data',
               'employee_data',
               'service_categories',
               'file_status'
               ];

$selected   = ['statement_letter.code_print',
               'statement_letter.actions',
               'entrance_services.service_categori_id',
            //    'entrance_services.code_entrance_services',
               'citizen_data.full_name',
               'employee_data.name_employee',
               'service_categories.name',
               'file_status.status_name'
              ];

$primaryKey = ['code_print',
               'entrance_service_id',
               'code_entrance_services',
               'citizen_data_id',
               'id_citizen_data',
               'employee_data_id',
               'id_employee',
               'service_categori_id',
               'id_service_categori',
               'id_status',
               'file_status_id'
              ];

get();

$results = null;

if(request('code_print')){
   $id = [
      'statement_letter.code_print' => request('code_print')
   ]; 
   
   $results = $joinSix($table,$primaryKey,$selected,$id);
}else if(request('name')){
   $id = [
      'service_categories.name' =>request('name')
   ];
   $results = $joinSix  ($table,$primaryKey,$selected,$id);
}else if(request('gender')){
   $id = [
   'statement_letter.gender' =>request('gender')
   ];
   $results = $joinSix  ($table,$primaryKey,$selected,$id);
}else{

   $results = $joinSix  ($table,$primaryKey,$selected,$id);
}

if(!empty($results)){
  reponse_ok("OK",$results);
    exit();
}
reponse_not_found("Data Tidak Ditemukan!");
