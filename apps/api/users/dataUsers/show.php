<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = ['users','role'];
$primaryKey = ['id_users','role_id','id_role'];
$selected   = ['username','status','name'];

get();

$results = null;

if (request('name')) {
    $results = $join_request($table, $primaryKey,$selected, request('name'));
   
// }else if(request('username')){
    // $results = $join_request($table, 'users.username',$selected, request('username'));
}else{
    $results = $join($table,$primaryKey,$selected,$id);
}
if(!empty($results)){
    reponse_ok("OK", $results);
    exit();
}

reponse_not_found("Data Tidak Ditemukan!");
