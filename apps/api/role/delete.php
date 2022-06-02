<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'role';
$primaryKey = 'id_role';
$selected='';
$setData    = [$primaryKey => request('id_role')];
$setRules   = [$primaryKey => 'required'];
$setAliases = [$primaryKey => 'Nama Akses'];

delete();

require __DIR__.'/../../config/validator.php';

if(request('id_role')){
    $where = [
        'role_id' => request('id_role')
    ];
    $check_users = $show_by_id('users','role_id',request('id_role'),$selected);

    // var_dump($check_users);die();

    if(!empty($check_users)){
         response_failed("Role ini sedang digunakan.!");
         exit();
    }

    $results = $delete($table, $primaryKey, request('id_role'));

    if(!empty($results)){
        reponse_ok("Berhasil Dihapus!", $results);
        exit();
    }
exit();
}

reponse_not_found();