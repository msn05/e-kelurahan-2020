<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'parent_data';
$primaryKey = 'id_parent_data';
$selected   = [
                'id_parent_data',
                'father_name',
                'mother_name',
                'number_nik_father',
                'number_nik_mother'
              ];
get();

$results = null;

if (request('father_name')) {
    $results = $show_by_id($table, 'father_name', request('father_name'),$selected);
} else if(request('mother_name')){
    $results = $show_by_id($table,'mother_name', request('mother_name'),$selected);
}else{
    $results = $show($table,$selected);
}

if(!empty($results)){
    reponse_ok("OK", $results);
    exit();
}

reponse_not_found("Data Tidak Ditemukan!");
