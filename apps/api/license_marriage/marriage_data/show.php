<?php
require __DIR__.'/../../../config/api.php';

$table      = 'license_marriage';

$primaryKey = 'id_license_marriage';
$selected='';


post();

$results = null;
if(request($primaryKey)){
  
	$results = $show_by_id($table,$primaryKey,request($primaryKey),$selected);

}
if(!empty($results)){
		$dataYangMenikah = $show_by_id('marriage_data','license_marriage_id',$results->id_license_marriage,$selected);
	$dataOrangTua = $show_by_id('parent_data','marriage_data_id',$dataYangMenikah->id_marriage_data,$selected);
    reponse_ok("OK", ["Pemohon" => $results,
                      "YangMenikah"    => $dataYangMenikah,
                      "OrangTua"       => $dataOrangTua
                     ]
               );
    exit();
}

reponse_not_found("Data Tidak Ditemukan!");


