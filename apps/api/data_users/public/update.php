<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'citizen_data';
$primaryKey = 'id_citizen_data';
$selected   = '';

$setData = [
 'phone_number'                    => request('phone_number'),
 'number_identification_card'      => request('number_identification_card'),
 'phone_number_whatshapp'          => request('phone_number_whatshapp'),
 'full_name'                       => request('full_name'),
 'address'                         => request('address'),
 'profession'                      => request('profession'),
 'id_citizen_data'                 => request('id_citizen_data'),
];

$setRules = [
 'phone_number'                    => 'required|numeric|digits_between:10,16',
 'number_identification_card'      => 'required|numeric|digits_between:16,16',
 'phone_number_whatshapp'          => 'required|numeric|digits_between:10,16',
 'full_name'                       => 'required|max:60',
 'address'                         => 'required',
 'profession'                      => 'required'
];

$setAliases = [
 'phone_number'                    => 'Nomor Handphone',
 'number_identification_card'      => 'Nomor identitas Kartu',
 'phone_number_whatshapp'          => 'Nomor Whatshapp',
 'full_name'                       => 'Nama lengkap anda',
 'address'                         => 'Alamat',
 'profession'                      => 'Profesi'
];


post();

require __DIR__.'/../../../config/validator.php';
$check_data = $show_by_id($table,'id_citizen_data',request('id_citizen_data'),$selected);
// echo json_encode($check_data);
if(request('number_identification_card') == $check_data->number_identification_card && request('phone_number') == $check_data->phone_number && request('phone_number_whatshapp') == $check_data->phone_number_whatshapp){
 $results = $update($table, $primaryKey, request('id_citizen_data'), $setData);
 if(!empty($results)){
  reponse_ok("Berhasil Diupdate!", $results);
  exit();
 }
 exit();
}

$check_data_nic = $show_by_id($table,'number_identification_card',request('number_identification_card'),$selected);
if(!empty($check_data_nic) && request('phone_number') == $check_data->phone_number && request('phone_number_whatshapp') == $check_data->phone_number_whatshapp){
 response_failed("Nomor Identitas Sudah Ada.!");
 exit();
// echo'adad';
}

$check_data_number = $show_by_id($table,'phone_number',request('phone_number'),$selected);
if(!empty($check_data_number) && request('number_identification_card') == $check_data->number_identification_card && request('phone_number_whatshapp') == $check_data->phone_number_whatshapp){
 response_failed("Nomor HP Sudah Ada.!");
 exit();
}

$check_data_wa = $show_by_id($table,'phone_number_whatshapp',request('phone_number_whatshapp'),$selected);
if(!empty($check_data_wa) && request('number_identification_card') == $check_data->number_identification_card && request('phone_number') == $check_data->phone_number){
 response_failed("Nomor WA Sudah Ada.!");
 exit();
}

$results = $update($table, $primaryKey, request('id_citizen_data'), $setData);
if(!empty($results)){
 reponse_ok("Berhasil Diupdate!", $results);
            // exit();
}