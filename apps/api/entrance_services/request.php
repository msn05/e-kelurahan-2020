<?php
require __DIR__.'/../../config/web.php';


$table      = "entrance_services";
$primaryKey = "code_entrance_services";
$sessionRole    = $_SESSION['session_role'];
$sessionUsers   = $_SESSION['users_id'];


$dataId = $_POST['service_categori_id'] ?? '';

$joinQuery = "FROM `entrance_services`  LEFT JOIN `service_categories`  ON (`entrance_services`.`service_categori_id` = `service_categories`.`id_service_categori`) LEFT JOIN `citizen_data` ON (`entrance_services`.`citizen_data_id` = `citizen_data`.`id_citizen_data`) LEFT JOIN `employee_data` ON (`entrance_services`.`employee_data_id` = `employee_data`.`id_employee`) LEFT JOIN `file_status` ON (`entrance_services`.`file_status_id` = `file_status`.`id_status`)";

$extraWhere = "";
$groupBy = "";
$having = "";

$Status          = $_POST['status'];
$name            = $_POST['name'];
$start           = $_POST['startdate'];

$enddate         = $_POST['enddate'];

if($sessionRole == 3){
    $sessionUsers   = $_SESSION['users_id'];
    $DataUsers      = $show_by_id('citizen_data','users_id',$sessionUsers,'');
    if($extraWhere == ''){
        $extraWhere .= "`entrance_services`.`citizen_data_id` = '".$DataUsers->id_citizen_data."'";
    }else{
        $extraWhere .= "AND `entrance_services`.`citizen_data_id` = '".$DataUsers->id_citizen_data."'";
    }
}


if(!empty($name) ){
     if($extraWhere ==''){
        $extraWhere .= "`entrance_services`.`service_categori_id` = '".$name."'";
    }else{
         $extraWhere .= "AND `entrance_services`.`service_categori_id` = '".$name."'";
    }
}else{
    $extraWhere .= "";
}

if(!empty($Status)){

    $extraWhere .= "AND `entrance_services`.`file_status_id` = '".$Status."'";
}else{
    $extraWhere .= "";
}


if($start !='' && $enddate != ''){
    $starter        = strtotime($start);
    $ender          = strtotime($enddate);
    $mulai          = date('Y-m-d H:i:s',$starter);
    $akhir          = date('Y-m-d H:i:s',$ender);
    if($extraWhere==''){
        $extraWhere .= "  `entrance_services`.`created_at` BETWEEN  '".$mulai."' AND '".$akhir."' ";
    }
}else{
   $extraWhere .= "";

}

$columns = [
    [ 'db' => '`entrance_services`.`code_entrance_services`',         'dt' => 'code_entrance_services', 'field'=>'code_entrance_services' ],
    [ 'db' => '`entrance_services`.`created_at`',         'dt' => 'created_atPelayanaMasuk', 'field'=>'created_at','formatter' => function( $d, $row ) {
        return date( 'd-m-Y ', strtotime($d));
    }],
    [ 'db' => '`entrance_services`.`employee_data_id`',         'dt' => 'employee_data_id', 'field'=>'employee_data_id' ],
    [ 'db' => '`service_categories`.`name`',         'dt' => 'namePelayanan', 'field'=>'name' ],
    [ 'db' => '`citizen_data`.`full_name`', 'dt'=>'full_name', 'field' =>'full_name' ],
    [ 'db' => '`employee_data`.`name_employee`', 'dt'=>'name_employee', 'field' =>'name_employee' ],
    [ 'db' => '`file_status`.`status_name`', 'dt'=>'status_name', 'field' =>'status_name',
    'formatter' => function($val, $row){
      return $val =='done' ? '<span class="badge badge-success"><h5></h5></span>' : ( $val == 'pending' ? '<span class="badge badge-dark"><h5></h5></span>' : ($val == 'in the proccess' ? '<span class="badge badge-warning"><h5></h5></span' : '<span class="badge badge-danger"><h5></h5></span>'));
  }
]
];


echo json_encode(
    SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);

