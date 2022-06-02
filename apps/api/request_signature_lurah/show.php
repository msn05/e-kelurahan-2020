<?php
require __DIR__.'/../../config/web.php';


$table      = 'signature_lurah';
$primaryKey = 'id_sig';


$columns = array(
    array( 'db' => 'id_sig','dt' => 'id_sig' ),
    array( 'db' => 'file','dt' => 'file' ),
    array( 'db' => 'created_at','dt' => 'created_at' ),
    array( 'db' => 'actions','dt' => 'actions' )
);



echo json_encode(
    SSP::simple( $_POST, $config, $table, $primaryKey, $columns )
);

// reponse_not_found("Data Tidak Ditemukan!");
