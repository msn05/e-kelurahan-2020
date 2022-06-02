<?php
require __DIR__.'/../../config/web.php';


$table      = "license_marriage";
$primaryKey = "id_license_marriage";

$dataId     = $_POST['service_categori_id'];
$joinQuery = "FROM `license_marriage`  LEFT JOIN `entrance_services`  ON (`license_marriage`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) LEFT JOIN `service_categories` ON (`entrance_services`.`service_categori_id` = `service_categories`.`id_service_categori`) LEFT JOIN `marriage_data` ON (`license_marriage`.`id_license_marriage` = `marriage_data`.`license_marriage_id`) LEFT JOIN  `parent_data` ON (`marriage_data`.`id_marriage_data` = `parent_data`.`marriage_data_id`) ";

$extraWhere = "`entrance_services`.`service_categori_id`='".$dataId."'";
$groupBy = "";
$having = "";

$columns = [
	[ 'db' => '`license_marriage`.`id_license_marriage`',         'dt' => 'code_print', 'field'=>'id_license_marriage' ],

	[ 'db' => '`license_marriage`.`marriage_guardian_name`',         'dt' => 'NamaPembuat', 'field'=>'marriage_guardian_name'],

	[ 'db' => '`entrance_services`.`service_categori_id`',         'dt' => 'KodePelayanan', 'field'=>'service_categori_id'],

	[ 'db' => '`license_marriage`.`actions`',         'dt' => 'StatusSurat', 'field'=>'actions'],

	[ 'db' => '`marriage_data`.`id_marriage_data`',         'dt' => 'id_marriage_data', 'field'=>'id_marriage_data'],

	[ 'db' => '`marriage_data`.`brides_name_men`',         'dt' => 'Pria', 'field'=>'brides_name_men', 'formatter' => function($val, $row){
		return $val !='' ? "
		<span class='text-primary'>".strtoupper($val)."</span>" : "<span class='text-danger'>Tidak Diketahui</span>";
	}
],

[ 'db' => '`marriage_data`.`brides_name_female`',         'dt' => 'Wanita', 'field'=>'brides_name_female', 'formatter' => function($val, $row){
		return $val !='' ? "
		<span class='text-primary'>".strtoupper($val)."</span>" : "<span class='text-danger'>Tidak Diketahui</span>";
	}],
	[ 'db' => '`parent_data`.`father_name`',         'dt' => 'father_name', 'field'=>'father_name', 'formatter' => function($val, $row){
		return $val !='' ? "
		<span class='text-primary'>Bapak ".($val)."</span>" : "<span class='text-danger'>Tidak Diketahui</span>";
	}],
	[ 'db' => '`parent_data`.`mother_name`',         'dt' => 'mother_name', 'field'=>'mother_name', 'formatter' => function($val, $row){
		return $val !='' ? "
		<span class='text-primary'>Ibu ".($val)."</span>" : "<span class='text-danger'>Tidak Diketahui</span>";
	}],

    [ 'db' => '`license_marriage`.`created_at`',         'dt' => 'CreatedSurat', 'field'=>'created_at',
    'formatter' => function( $d, $row ) {
        return date( 'd-m-Y H:i:s', strtotime($d));
    }
]
];


echo json_encode(
	SSP::simple($_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
    // SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraCondition)
);

