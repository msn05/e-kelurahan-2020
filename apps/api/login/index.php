<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table = 'users';

$setData = [
    'username' => request('username'),
    'password' => request('password')
];


$setRules = [
    'username' => 'required|email',
    'password' => 'required|min:8'
];

$setAliases = [
    'username' => 'Username',
    'password' => 'Password'
];

post();

require __DIR__.'/../../config/validator.php';

$username = trim(request('username'));
$password = trim(request('password'));

$users = $show_by_id($table,'username',$username, '*');

if (empty($users)) {
    response_failed("Username/Password Yg Dimasukkan Salah!");
    exit();
}

if($users->status === 'Aktif'){

    $isValidLogin = !empty($users) && password_verify($password, $users->password);
    // if(true){
    if($isValidLogin){
        if(!isset($_SESSION)) { session_start(); }
        reponse_ok("Berhasil.",[
            $_SESSION['Users']        = $users->username,
            $_SESSION['users_id']     = $users->id_users,
            $_SESSION['session_role'] = $users->role_id,
            $_SESSION['TrueLog']      = true
        ]);
        exit();
    }
    response_failed("Username/Password Yg Dimasukkan Salah!");
    exit();
}
response_failed("Maaf Status Akun Dinonaktifkan.!");
exit();


