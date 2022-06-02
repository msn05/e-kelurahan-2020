<?php
require __DIR__.'/../../config/web.php';


$table      = "file_requirements";
$primaryKey = "id_file_requietmens";

$joinQuery = "FROM `file_requirements`  LEFT JOIN `service_categories`  ON (`file_requirements`.`service_categori_id` = `service_categories`.`id_service_categori`) ";

$extraWhere = "";
$groupBy = "";
$having = "";

$Status       = $_POST['status'];
$name         = $_POST['name'];
if(!empty($Status) ){
    if($Status == 'Berlaku'){
        $extraWhere .= "`file_requirements`.`status` = '".$Status."'";
    }
    if($Status == 'Tidak Berlaku'){
        $extraWhere .= "`file_requirements`.`status` = '".$Status."'";
    }

}else{
    $extraWhere .= "";
}
if(!empty($name) ){
    if($extraWhere ==''){
        $extraWhere .= " `file_requirements`.`service_categori_id` = '".$name."'";
    }else{
        $extraWhere .= " AND `file_requirements`.`service_categori_id` = '".$name."'";

    }
}else{
    $extraWhere .= "";
}

$columns = [
    [ 'db' => '`file_requirements`.`id_file_requietmens`','dt' => 'id_file_requietmens', 'field'=>'id_file_requietmens' ],
    [ 'db' => '`file_requirements`.`name_file`',          'dt' => 'name_file',           'field'=>'name_file' ],
    [ 'db' => '`file_requirements`.`created_at`',         'dt' => 'created_atFile',          'field'=>'created_at' ],
    [ 'db' => '`file_requirements`.`status`',             'dt' => 'statusFile',              'field'=>'status',
               'formatter' => function($val, $row){
                              return $val =="Berlaku" ? "<span class='text-primary' >Berlaku</span>" : "<span class='text-danger'>Tidak Berlaku</span>";
                           }
    ],
    [ 'db' => '`service_categories`.`name`',               'dt' => 'name',                 'field'=>'name']
];


echo json_encode(
              SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
    // SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraCondition)
);

