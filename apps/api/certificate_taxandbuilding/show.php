<?php
require __DIR__.'/../../config/web.php';

$table      = "certificate_taxandbuilding";
$primaryKey = "code_tax";

$dataId     = $_POST['service_categori_id'];
$joinQuery = "FROM `certificate_taxandbuilding`  LEFT JOIN `entrance_services`  ON (`certificate_taxandbuilding`.`entrance_service_id` = `entrance_services`.`code_entrance_services`) LEFT JOIN `service_categories` ON (`entrance_services`.`service_categori_id` = `service_categories`.`id_service_categori`) ";

$extraWhere = "`entrance_services`.`service_categori_id`='".$dataId."'";
$groupBy = "";
$having = "";
$select = "`certificate_taxandbuilding`.`subject_tax_name` as NamaPembuat";

$columns = [
    [ 'db' => '`certificate_taxandbuilding`.`code_tax`',         'dt' => 'code_print', 'field'=>'code_tax' ],
    [ 'db' => '`certificate_taxandbuilding`.`office_name`',         'dt' => 'NamaPejabat', 'field'=>'office_name'],
    [ 'db' => '`entrance_services`.`service_categori_id`',         'dt' => 'KodePelayanan', 'field'=>'service_categori_id'],
    [ 'db' => '`certificate_taxandbuilding`.`subject_tax_name`',         'dt' => 'NamaPembuat', 'field'=>'NamaPembuat','as' => 'NamaPembuat' ],
    [ 'db' => '`service_categories`.`name`',         'dt' => 'jenisSurat', 'field'=>'name' ],
    [ 'db' => '`certificate_taxandbuilding`.`actions`',         'dt' => 'StatusSurat', 'field'=>'actions'],
    [ 'db' => '`certificate_taxandbuilding`.`created_at`',         'dt' => 'CreatedSurat', 'field'=>'created_at',
    'formatter' => function( $d, $row ) {
        return date( 'd-m-Y H:i:s', strtotime($d));
    }
]
];


echo json_encode(
            SSP::simple($_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having)
    // SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraCondition)
);

