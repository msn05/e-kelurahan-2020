<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'role';
$primaryKey = 'id_role';
$selected='';

post();


if(request('id_role')){
    $results = $show_by_id($table,$primaryKey, request($primaryKey), $selected);
 }
    if(!empty($results)){
        reponse_ok("Ok.!", $results);
        exit();
    }
reponse_not_found();