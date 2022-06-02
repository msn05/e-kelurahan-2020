<?php
require __DIR__.'/../../config/web.php';


$table      = "service_categories";
$primaryKey = "id_service_categori";

$joinQuery = "FROM `service_categories`  LEFT JOIN `users`  ON (`service_categories`.`user_id` = `users`.`id_users`) LEFT JOIN `employee_data` ON (`employee_data`.`users_id`=`users`.`id_users`)";

$extraCondition = "";

$Status         = $_POST['status'];
if(!empty($Status)){
    if($Status == 'Show'){
        $extraCondition .= "`service_categories`.`status` = '".$Status."'";
    }
    if($Status == 'Hide'){
        $extraCondition .= "`service_categories`.`status` = '".$Status."'";
    }
}else{
    $extraCondition .= "";
}


$columns = [
    [ 'db' => '`service_categories`.`id_service_categori`',         'dt' => 'id_service_categori', 'field'=>'id_service_categori' ],
    [ 'db' => '`service_categories`.`name`', 'dt' => 'names', 'field'=>'name' ],
    [ 'db' => '`service_categories`.`status`','dt' =>'status', 'field'=>'status',
    'formatter' => function($val, $row){
        return $val =="Show" ? "<span class='label label-success'>Masih Berlaku</span>" : "<span class='label label-warning'>Tdak Berlaku</span>";
    }
],
[ 'db' => '`service_categories`.`created_at`','dt' =>'created_at', 'field' =>'created_at',
'formatter' => function( $d, $row ) {
    return date( 'd-m-Y', strtotime($d));
}
],
[ 'db' => '`employee_data`.`name_employee`', 'dt'=>'name_employees', 'field' =>'name_employee' ]
];



echo json_encode(
    SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraCondition)
);

