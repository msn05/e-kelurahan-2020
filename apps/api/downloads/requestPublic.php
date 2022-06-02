<?php
require __DIR__.'/../../config/web.php';
// include __DIR__.'/../../config/db_datables.php';

$table      = "downloads";
$primaryKey = "id_download";
$extraWhere ='';
	$joinQuery = '';
$groupBy = "";
$having = "";
$sessionRole    = $_SESSION['session_role'];
$sessionUsers   = $_SESSION['users_id'];
$DataUsers      = $show_by_id('citizen_data','users_id',$sessionUsers,'');

$JenisSurat 	= $_POST['JenisSurat'];

if(!empty($JenisSurat)){
	if($JenisSurat === 'SPK-0012'){
		$joinQuery .= "FROM `downloads`  LEFT JOIN `certificate_taxandbuilding` ON (`downloads`.`code_print` = `certificate_taxandbuilding`.`code_tax`) LEFT JOIN `entrance_services` ON (`certificate_taxandbuilding`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";
	}
	if($JenisSurat === 'SPK-0009'){
		$joinQuery .= "FROM `downloads`  LEFT JOIN `license_marriage` ON (`downloads`.`code_print` = `license_marriage`.`id_license_marriage`) LEFT JOIN `entrance_services` ON (`license_marriage`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	}
	if($JenisSurat === 'SPK-0005'){
		$joinQuery .= "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
	if($JenisSurat === 'SPK-0001'){
		$joinQuery = "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
	if($JenisSurat === 'SPK-0002'){
		$joinQuery .= "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
	if($JenisSurat === 'SPK-0003'){
		$joinQuery = "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
	if($JenisSurat === 'SPK-0004'){
		$joinQuery = "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
	if($JenisSurat === 'SPK-0006'){
		$joinQuery = "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
	if($JenisSurat === 'SPK-0007'){
		$joinQuery .= "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
	if($JenisSurat === 'SPK-0008'){
		$joinQuery .= "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
	if($JenisSurat === 'SPK-00010'){
		$joinQuery .= "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
	if($JenisSurat === 'SPK-00011'){
		$joinQuery .= "FROM `downloads`  LEFT JOIN `statement_letter` ON (`downloads`.`code_print` = `statement_letter`.`code_print`) LEFT JOIN `entrance_services` ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) ";
		$extraWhere .= " `entrance_services`.`service_categori_id`='".$JenisSurat."'";

	} 
} 

if(!empty($DataUsers)){
		$extraWhere .= " AND`entrance_services`.`citizen_data_id`=".$DataUsers->id_citizen_data."";
}

$select = "`downloads`.`actions` as AksiDownloads";

$columns = [
	[ 'db' => '`downloads`.`id_download`',         'dt' => 'id_download', 'field'=>'id_download' ],
	[ 'db' => '`downloads`.`code_print`',         'dt' => 'CetakPrint', 'field'=>'CetakPrint','as'=>'CetakPrint' ],
	[ 'db' => 'file',         'dt' => 'file', 'field'=>'file' ],
		[ 'db' => '`downloads`.`actions`',         'dt' => 'DownloadsFile', 'field'=>'AksiDownloads' ],
	[ 'db' => '`downloads`.`actions`',         'dt' => 'AksiDownloads', 'field'=>'AksiDownloads', 'as' => 'AksiDownloads','AksiDownloads',
	'formatter' => function($val, $row){
		return $val ==2 ? "
		<span class='text-primary' >Sudah bisa didownloads</span>" : "<span class='text-danger'>Belum bisa</span>";
	}
]

];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);

