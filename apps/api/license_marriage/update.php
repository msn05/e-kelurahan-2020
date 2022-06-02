<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      ='license_marriage';
$primaryKey ='id_license_marriage';

$setData =[
            'id_license_marriage'   =>request('id_license_marriage'),
            'marriage_guardian_name'=>request('marriage_guardian_name'),
            'place_of_birth'        =>request('place_of_birth'),
            'date_of_birth'         =>request('date_of_birth'),
            'national'              =>request('national'),
            'religion'              =>request('religion'),
            'profession'            =>request('profession'),
            'kk_number'             =>request('kk_number'),
            'nik_number'            =>request('nik_number'),
            'address'               =>request('address'),
            'users_id'              =>request('user_id'),
            'actions'               =>'pending',
];

$setRules =[
            'id_license_marriage'   =>'required',
            'marriage_guardian_name'=>'required',
            'place_of_birth'        =>'required|alpha',
            'date_of_birth'         =>'required|date',
            'national'              =>'required',
            'religion'              =>'required',
            'profession'            =>'required',
            'kk_number'             =>'required|numeric|digits_between:10,16',
            'nik_number'            =>'required|numeric|digits_between:10,16',
            'address'               =>'required'
];

$setAliases =[
            'id_license_marriage'   =>'Kode Berkas',
            'marriage_guardian_name'=>'Nama yang mengajukan',
            'place_of_birth'        =>'Tempat Lahir',
            'date_of_birth'         =>'Tanggal Lahir',
            'national'              =>'Kebangsaan',
            'religion'              =>'Agama',
            'profession'            =>'Pekerjaan',
            'kk_number'             =>'Nomor KK',
            'nik_number'            =>'Nomor NIK',
            'address'               =>'Alamat'
];


post();

require __DIR__.'/../../config/validator.php';

if(!empty(request($primaryKey))){
    $results = $update($table,$primaryKey,request($primaryKey),$setData); 
    if(!empty($results)){
        reponse_ok("Berhasil Ditambahkan!", $results);
    exit();
    }  
    exit();
}
response_failed("Silakan Memilih datanya.!");
exit();