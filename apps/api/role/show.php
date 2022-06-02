<?php
require __DIR__.'/../../config/web.php';


$table      = 'role';
$primaryKey = 'id_role';


$columns = array(
    array( 'db' => 'id_role','dt' => 'id_role' ),
    array( 'db' => 'name','dt' => 'name' ),
    array( 'db' => 'created','dt' => 'created' )
);



echo json_encode(
    SSP::simple( $_POST, $config, $table, $primaryKey, $columns )
);

// reponse_not_found("Data Tidak Ditemukan!");
