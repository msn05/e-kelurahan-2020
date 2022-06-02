<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'users';
$primaryKey = 'id_users';
$selected='';
post();

$results = null;

if(request('username')){
   $results = $show_by_id($table, 'username',request('username'),$selected);

}else if(request('id_users')){
   $results = $show_by_id($table, 'id_users',request('id_users'),$selected);

}else{
   $results = $show_by_id($table, $primaryKey,request($primaryKey),$selected);
}

if(!empty($results)){
   reponse_ok("OK", $results);
   exit();
}

