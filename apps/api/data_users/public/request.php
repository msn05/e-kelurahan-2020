<?php
require __DIR__.'/../../../config/api.php';

$table          = "users";
$primaryKey     = "id_users";


$joinQuery = "FROM `users`  LEFT JOIN `citizen_data`  ON (`users`.`id_users` = `citizen_data`.`users_id`) ";

$extraCondition = "`users`.`role_id`=3";

$columns = [
    [ 'db' => '`users`.`id_users`',         'dt' => 'id_users', 'field'=>'id_users' ],
    [ 'db' => '`users`.`username`',         'dt' => 'username', 'field'=>'username' ],
    [ 'db' => '`users`.`status`',         'dt' => 'Statusnya', 'field'=>'status' ],
    [ 'db' => '`users`.`status`',         'dt' => 'status', 'field'=>'status' ,
               'formatter' => function($val, $row){
                            return $val =="Aktif" ? "
<span class='text-primary' >Aktif</span>" : "<span class='text-danger'>Tidak Aktif</span>";
                        }

],
    [ 'db' => '`citizen_data`.`full_name`', 'dt'=>'full_name', 'field' =>'full_name' ],
    [ 'db' => '`citizen_data`.`address`', 'dt'=>'address', 'field' =>'address' ],
    [ 'db' => '`citizen_data`.`phone_number`', 'dt'=>'phone_number', 'field' =>'phone_number' ]
];


echo json_encode(
    SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraCondition)
);

