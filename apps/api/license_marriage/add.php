<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      ='license_marriage';
$primaryKey ='id_license_marriage';
$selected='';
$setData =[
    'id_license_marriage'   =>$uniqueCode($table,$primaryKey),
    'entrance_service_id'   =>request('entrance_service_id'),
    'marriage_guardian_name'=>request('marriage_guardian_name'),
    'place_of_birth'        =>request('place_of_birth'),
    'date_of_birth'         =>request('date_of_birth'),
    'national'              =>request('national'),
    'religion'              =>request('religion'),
    'profession'            =>request('profession'),
    'kk_number'             =>request('kk_number'),
    'nik_number'            =>request('nik_number'),
    'address'               =>request('address'),
    'rt_number'                    =>request('rt'),
    'rw_number'                    =>request('rw'),
    'saksi_one'                =>request('saksi1'),
    'saksi_two'                =>request('saksi2'),
    'actions'               =>'pending',
    'status_genered'        => 0,
];

$setRules =[
    'entrance_service_id'   =>'required',
    'marriage_guardian_name'=>'required',
    'place_of_birth'        =>'required|alpha',
    'date_of_birth'         =>'required|date',
    'national'              =>'required',
    'religion'              =>'required',
    'profession'            =>'required',
    'kk_number'             =>'required|numeric|digits_between:16,16',
    'nik_number'            =>'required|numeric|digits_between:16,16',
    'address'               =>'required',
    'rt_number'                    =>'required|numeric',
    'rw_number'                    =>'required|numeric',
    'saksi_one'                    =>'required',
    'saksi_two'                    =>'required'
];

$setAliases =[
    'entrance_service_id'   =>'Kode Pengajuan Berkas',
    'marriage_guardian_name'=>'Nama yang mengajukan',
    'place_of_birth'        =>'Tempat Lahir',
    'date_of_birth'         =>'Tanggal Lahir',
    'national'              =>'Kebangsaan',
    'religion'              =>'Agama',
    'profession'            =>'Pekerjaan',
    'kk_number'             =>'Nomor KK',
    'nik_number'            =>'Nomor NIK',
    'address'               =>'Alamat',
    'rt_number'                    =>'RT',
    'rw_number'                    =>'RW',
    'saksi_one'                =>'Saksi Satu',
    'saksi_two'                =>'Saksi Dua'
];


post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,'entrance_service_id',request('entrance_service_id'),$selected);
if(!empty($check_data)){
    response_failed("Anda Sudah menambahkan data.!");
    exit();
}
$results = $insert($table,$setData); 
if(!empty($results)){
    reponse_ok("Berhasil. Silakan menlanjutkan proses.!", $results);
    exit();
}  