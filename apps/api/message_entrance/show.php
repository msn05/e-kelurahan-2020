<?php
require __DIR__.'/../../config/web.php';


$table          = "message_entrance_service";
$primaryKey     = "id_message";

$joinQuery = "FROM `message_entrance_service`  LEFT JOIN `employee_data`  ON (`message_entrance_service`.`employee_id` = `employee_data`.`id_employee`) LEFT JOIN `entrance_services` ON (`message_entrance_service`.`entrance_service_id` = `entrance_services`.`code_entrance_services`)";
// LEFT JOIN `log_message` ON (`message_entrance_service`.`id_message` = `log_message`.`message_entrance_id`)
$extraWhere = "";
$groupBy = "";
$having = "";
$sessionRole    = $_SESSION['session_role'];
if($sessionRole == 3){
    $sessionUsers   = $_SESSION['users_id'];
    $DataUsers      = $show_by_id('citizen_data','users_id',$sessionUsers,'');

    $extraWhere .= "`entrance_services`.`citizen_data_id` = '".$DataUsers->id_citizen_data."'";
}


$columns = [
    [ 'db' => '`message_entrance_service`.`id_message`','dt' => 'id_message', 'field'=>'id_message' ],
    [ 'db' => '`message_entrance_service`.`message`',          'dt' => 'message',           'field'=>'message' ],
    [ 'db' => '`employee_data`.`name_employee`',         'dt' => 'staf',          'field'=>'name_employee' ],
    [ 'db' => '`entrance_services`.`service_categori_id`',         'dt' => 'kode',          'field'=>'service_categori_id' ],
    [ 'db' => '`message_entrance_service`.`entrance_service_id`',         'dt' => 'entrance_service_id',          'field'=>'entrance_service_id' ]
];


echo json_encode(
   SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);

