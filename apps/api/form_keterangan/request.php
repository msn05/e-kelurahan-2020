<?php
require __DIR__.'/../../config/web.php';


$table      = "statement_letter";
$primaryKey = "code_print";

$dataId     = $_POST['service_categori_id'];
$joinQuery = "FROM `statement_letter`  LEFT JOIN `entrance_services`  ON (`statement_letter`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) LEFT JOIN `service_categories` ON (`entrance_services`.`service_categori_id` = `service_categories`.`id_service_categori`) ";

$extraWhere = "`entrance_services`.`service_categori_id`='".$dataId."'";
$groupBy = "";
$having = "";
$select = "`statement_letter`.`name` as NamaPembuat";

$columns = [
    [ 'db' => '`statement_letter`.`code_print`',         'dt' => 'code_print', 'field'=>'code_print' ],
    [ 'db' => '`statement_letter`.`office_name`',         'dt' => 'NamaPejabat', 'field'=>'office_name'],
    [ 'db' => '`entrance_services`.`service_categori_id`',         'dt' => 'KodePelayanan', 'field'=>'service_categori_id'],
    [ 'db' => '`statement_letter`.`name`',         'dt' => 'NamaPembuat', 'field'=>'NamaPembuat','as' => 'NamaPembuat' ],
    [ 'db' => '`service_categories`.`name`',         'dt' => 'jenisSurat', 'field'=>'name' ],
    [ 'db' => '`statement_letter`.`actions`',         'dt' => 'StatusSurat', 'field'=>'actions'],
    [ 'db' => '`statement_letter`.`created_at`',         'dt' => 'CreatedSurat', 'field'=>'created_at',
    'formatter' => function( $d, $row ) {
        return date( 'd-m-Y H:i:s', strtotime($d));
    }
]
];


echo json_encode(
            SSP::simple($_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
    // SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraCondition)
);

