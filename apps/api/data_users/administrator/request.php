<?php
require __DIR__.'/../../../config/web.php';

$table      = "users";
$primaryKey = "id_users";

$joinQuery = "FROM `users`  LEFT JOIN `employee_data`  ON (`users`.`id_users` = `employee_data`.`users_id`) ";

$extraCondition = "`users`.`role_id`=1";

$columns = [
 [ 'db' => '`users`.`id_users`',         'dt' => 'id_users', 'field'=>'id_users' ],
 [ 'db' => '`users`.`username`',         'dt' => 'username', 'field'=>'username' ],
 [ 'db' => '`users`.`status`',         'dt' => 'Statusnya', 'field'=>'status' ],
 [ 'db' => '`users`.`status`',         'dt' => 'status', 'field'=>'status' ,
 'formatter' => function($val, $row){
  return $val =="Aktif" ? "<span class='label label-success'>Aktif</span>" : "<span class='label label-info'>Tidak Aktif</span>";
 }

],
[ 'db' => '`employee_data`.`name_employee`', 'dt'=>'name_employee', 'field' =>'name_employee' ],
[ 'db' => '`employee_data`.`phone_number`', 'dt'=>'phone_number', 'field' =>'phone_number' ],
[ 'db' => '`employee_data`.`position`', 'dt'=>'position', 'field' =>'position' ]
];


echo json_encode(
 SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraCondition)
);

