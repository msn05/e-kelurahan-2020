<?php

require __DIR__.'/../../config/api.php';


$table      = 'signature_lurah';
$primaryKey = 'id_sig';
$selected='';

$setData = [
  'file'                    => $_POST['file']
];

// echo json_encode($setData);
$setRules = [
  'file'    => 'required'
];

$setAliases = [
  'file'    => 'TTD harus diisi'
];

post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,'actions','berlaku',$selected);
if(!empty($check_data)){
  response_failed("Tanda Tangan sudah ada dan status masih berlaku.!");
  exit();
}

    $image_parts = explode(";base64,", $_POST['file']);
    // echo json_encode($image_parts);
    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);

    $file = uniqid() . '.'.$image_type;
    // echo json_encode($file);
    $dir            = '../../file_manager/signature_lurah/'.$file;

   
// // var_dump($results);die();

if(!empty($dir)){
   $Ttd = file_put_contents($dir, $image_base64);
   $DataInsertTtd = [
    'file' => $file,
    'actions'  => 'berlaku'
  ];
  $results = $insert($table, $DataInsertTtd);
  reponse_ok("Berhasil Ditambahkan!", $results);
  exit();
}

