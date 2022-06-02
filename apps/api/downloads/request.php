<?php
require __DIR__.'/../../config/web.php';


$table      = "downloads";
$primaryKey = "id_download";

$extraWhere = "";
$groupBy = "";
$having = "";



$columns = [
    [ 'db' => 'id_download',         'dt' => 'id_download', 'field'=>'id_download' ],
    [ 'db' => 'code_print',         'dt' => 'code_print', 'field'=>'code_print' ],
    [ 'db' => 'file',         'dt' => 'file', 'field'=>'file' ],
    [ 'db' => 'actions',         'dt' => 'AksiDownloads', 'field'=>'actions'],
    [ 'db' => 'actions',         'dt' => 'actions', ''=>'actions',
    'formatter' => function($val, $row){
        return $val == 2 ? "
        <span class='text-primary' >Sudah bisa didownloads</span>" : "<span class='text-danger'>Belum bisa</span>";
    }
]
];


echo json_encode(
    SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery='', $extraWhere, $groupBy, $having )
);

