<?php
require __DIR__.'/../../config/web.php';


$table      = "license_marriage";
$primaryKey = "id_license_marriage";

$joinQuery = "FROM `license_marriage`  LEFT JOIN `request_signature_lurah`  ON (`license_marriage`.`id_license_marriage` = `request_signature_lurah`.`code_print`) ";
// $joinQuery = "FROM `request_signature_lurah`  LEFT JOIN `certificate_taxandbuilding`  ON (`request_signature_lurah`.`code_print` = `certificate_taxandbuilding`.`code_print`) ";

$extraWhere = "";
$groupBy = "";
$having = "";


$Status       	= $_POST['status'];
$startdate      = $_POST['startdate'];
$enddate        = $_POST['enddate'];

if(!empty($Status) ){
	if($Status == 'NULL'){
		$extraWhere .= "`request_signature_lurah`.`status` IS NULL";
	}else{
		$extraWhere .= "`request_signature_lurah`.`status` = '".$Status."'";
	}
}else{
	$extraWhere .= "";
}

if($startdate !='' && $enddate != ''){
	$starter        = strtotime($startdate);
	$ender          = strtotime($enddate);
	$mulai          = date('Y-m-d H:i:s',$starter);
	$akhir          = date('Y-m-d H:i:s',$ender);
	if($extraWhere==''){
		$extraWhere .= "  `request_signature_lurah`.`created_at` BETWEEN  '".$mulai."' AND '".$akhir."' ";
	}
}else{
	$extraWhere .= "";

}

$columns = [
	[ 'db' => '`request_signature_lurah`.`id_request`',         'dt' => 'id_request', 'field'=>'id_request' ],
	[ 'db' => '`request_signature_lurah`.`code_print`',         'dt' => 'code_printRSL', 'field'=>'code_print' ],
	[ 'db' => '`request_signature_lurah`.`status`',         'dt' => 'SuratStatus', 'field'=>'status'],
	[ 'db' => '`request_signature_lurah`.`created_at`',         'dt' => 'CreatedSurat', 'field'=>'created_at','formatter' => function( $d, $row ) {
        return date( 'd-m-Y ', strtotime($d));
    }],
	[ 'db' => '`license_marriage`.`marriage_guardian_name`', 'dt' =>'NamaPemohon', 'field'=>'marriage_guardian_name'],
	[ 'db' => '`license_marriage`.`rt_number`', 'dt' =>'RT', 'field'=>'rt_number'],
	[ 'db' => '`license_marriage`.`rw_number`', 'dt' =>'RW', 'field'=>'rw_number']
    // [ 'db' => '`certificate_taxandbuilding`.`office_name`', 'dt' =>'office_name', 'field'=>'office_name']
];


echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);

