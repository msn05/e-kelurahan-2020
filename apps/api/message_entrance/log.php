<?php

// https://github.com/emran/ssp/blob/master/example/scripts/server_processing.php
// https://gitlab.com/aldo_k/attendance-school-system/-/blob/master/modules/_api/guru.php

require __DIR__.'/../../config/web.php';


$table      = "log_message";
$primaryKey = "id_log_message";

$post = $_POST['message_entrance_id'];


$extraWhere = "message_entrance_id='".$post."'";
$groupBy = "";
$having = "";

// $where='entrance_service_id= '.$_POST['entrance_service_id'].'';

$columns = [
    [ 'db' => 'id_log_message','dt' => 'id_log_message', 'field'=>'id_log_message' ],
    [ 'db' => 'created_at',         'dt' => 'LogCreated',          'field'=>'created_at',
            'formatter' => function( $d, $row ) {
        return date( 'd-m-Y H:i:s', strtotime($d));
    }],
    [ 'db' => 'message', 'dt' =>'message', 'field'=>'message']
];


echo json_encode(
        SSP::simple( $_POST, $config, $table, $primaryKey, $columns, null, $extraWhere, $groupBy, $having )
    // SSP::simple( $_POST, $config, $table, $primaryKey, $columns,$joinQuery,$where)
);

