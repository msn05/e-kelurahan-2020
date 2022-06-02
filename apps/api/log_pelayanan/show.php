<?php

// https://github.com/emran/ssp/blob/master/example/scripts/server_processing.php
// https://gitlab.com/aldo_k/attendance-school-system/-/blob/master/modules/_api/guru.php

require __DIR__.'/../../config/web.php';


$table      = "log_file_submision";
$primaryKey = "id_log_file";

$post = $_POST['entrance_service_id'];

// echo json_encode($D);

$joinQuery  = "FROM `log_file_submision` LEFT JOIN `employee_data` ON (`log_file_submision`.`employee_id` = `employee_data`.`id_employee`) LEFT JOIN `file_status` ON (`log_file_submision`.`file_status_id` = `file_status`.`id_status`)";

$extraWhere = "`log_file_submision`.`entrance_service_id`= ".$post."";
$groupBy = "";
$having = "";

// $where='`log_file_submision`.`entrance_service_id`= '.$_POST['entrance_service_id'].'';

$columns = [
    [ 'db' => '`log_file_submision`.`id_log_file`','dt' => 'id_log_file', 'field'=>'id_log_file' ],
    [ 'db' => '`log_file_submision`.`created_at`',         'dt' => 'LogCreated',          'field'=>'created_at',
    		'formatter' => function( $d, $row ) {
        return date( 'd-m-Y H:i:s', strtotime($d));
	}],
	[ 'db' => '`employee_data`.`name_employee`', 'dt' => 'name_employees', 'field'=>'name_employee'],
	[ 'db' => '`file_status`.`status_name`', 'dt' =>'status_file', 'field'=>'status_name']
];


echo json_encode(
		SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
    // SSP::simple( $_POST, $config, $table, $primaryKey, $columns,$joinQuery,$where)
);

