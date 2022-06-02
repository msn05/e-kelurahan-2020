<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      ='license_marriage';
$primaryKey ='id_license_marriage';


$setData = [
        'id_license_marriage'   =>request('id_license_marriage'),
        'rt_number'             =>request('rt_number'),
        'rw_number'             =>request('rw_number'),
        'saksi_one'             =>request('saksi_one'),
        'saksi_two'             =>request('saksi_two')
];

$setRules = [
        'id_license_marriage'   =>'required',
        'rt_number'             =>'required|numeric|min:1|max:5',
        'rw_number'             =>'required|numeric|min:1|max:5',
        'saksi_one'             =>'required|alpha',
        'saksi_two'             =>'required|alpha'
];

$setAliases = [
        'id_license_marriage'   =>'Kode Data',     
        'rt_number'             =>'RT',
        'rw_number'             =>'RW',
        'saksi_one'             =>'Saksi 1',
        'saksi_two'             =>'Saksi 2'
];


post();

require __DIR__.'/../../config/validator.php';

$results = $update($table,$primaryKey,request($primaryKey),$setData); 
if(!empty($results)){
    reponse_ok("Berhasil diupdate.!", $results);
  exit();
}  