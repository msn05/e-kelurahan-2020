<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      ='marriage_data';
$primaryKey ='id_marriage_data';
$selected='';
$kk_men         = request('kk_number_men') == '' ? NULL : request('kk_number_men');
$kk_female      = request('kk_number_female') == '' ? NULL : request('kk_number_female');


$setData = [
        'license_marriage_id'   =>request('license_marriage_id'),
        'brides_name_men'       =>request('brides_name_men'),
        'bin_men'               =>request('bin_men'),
        'place_of_birth_men'    =>request('place_of_birth_men'),
        'date_of_birth_men'     =>request('date_of_birth_men'),
        'profession_men'        =>request('profession_men'),
        'kk_number_men'         =>$kk_men,
        'nik_number_men'        =>request('nik_number_men'),
        'marital_status_men'    =>request('marital_status_men'),
        'address_female'        =>request('address_female'),
        'brides_name_female'    =>request('brides_name_female'),
        'bin_female'            =>request('bin_female'),
        'place_of_birth_female' =>request('place_of_birth_female'),
        'date_of_birth_female'  =>request('date_of_birth_female'),
        'profession_female'     =>request('profession_female'),
        'marital_status_female' =>request('marital_status_female'),
        'kk_number_female'      =>$kk_female,
        'nik_number_female'     =>request('nik_number_female'),
        'national_men'           =>request('national_men'),
        'national_female'           =>request('national_female'),
        'address_men'           =>request('address_men'),
        'religion_men'           =>request('religion_men'),
        'religion_female'           =>request('religion_female'),
];

$setRules = [
        'license_marriage_id'     =>'required',
        'brides_name_men'         =>'required',
        'bin_men'                 =>'required',
        'place_of_birth_men'      =>'required|alpha',
        'date_of_birth_men'       =>'required|date',
        'profession_men'          =>'required',
        'nik_number_men'          =>'required|numeric|digits_between:16,16',
        'marital_status_men'      =>'required',
        'address_female'          =>'required',
        'brides_name_female'      =>'required',
        'bin_female'              =>'required',
        'place_of_birth_female'   =>'required|alpha',
        'date_of_birth_female'    =>'required|date',
        'profession_female'       =>'required',
        'marital_status_female'   =>'required',
        'nik_number_female'       =>'required|numeric|digits_between:16,16',
        'address_men'             =>'required',
        'national_men'             =>'required|alpha',
        'national_female'             =>'required|alpha',
        'religion_men'             =>'required',
        'religion_female'             =>'required'
];

$setAliases = [
        'license_marriage_id'       =>'Kode Pemohon',     
        'brides_name_men'           =>'Nama Mempelai Pria',
        'bin_men'                   =>'Bin Mempelai Pra',
        'place_of_birth_men'        =>'Tempat Lahir Pra',
        'date_of_birth_men'         =>'Tanggal Lahir Pria',
        'profession_men'            =>'Pekerjaan Pria',
        'nik_number_men'            =>'Nomor NIK Pria',
        'marital_status_men'        =>'Status Perkawaninan Pira',
        'address_female'            =>'Alamat Mempelai Wanita',   
        'brides_name_female'        =>'Nama Mempelai Wanita',
        'bin_female'                =>'Bin Mempelai Wanita',
        'place_of_birth_female'     =>'Tempat Lahir Wanita',
        'date_of_birth_female'      =>'Tanggal Lahir Wanita',
        'profession_female'         =>'Pekerjaan Wanita',
        'marital_status_female'     =>'Status Perkawanian Wanita',
        'nik_number_female'         =>'Nomor NIK Wanita',
        'address_men'               =>'Alamat Pria',
        'national_men'              =>'Kewarganegaraan Pria',
        'national_female'              =>'Kewarganegaraan Wanita',
        'religion_men'              =>'Agama Pria',
        'religion_female'              =>'Agama Wanita'
];


post();

require __DIR__.'/../../../config/validator.php';

$check_data = $show_by_id($table,'license_marriage_id',request('license_marriage_id'),$selected);
if(!empty($check_data)){
    response_failed("Anda Sudah menambahkan data.!");
    exit();
}
$results = $insert($table,$setData); 
if(!empty($results)){
    reponse_ok("Berhasil. Ditambahkan.!", $results);
  exit();
}  