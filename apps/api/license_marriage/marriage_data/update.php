<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      ='marriage_data';
$primaryKey ='id_marriage_data';


$setData = [
        'id_marriage_data'      =>request('id_marriage_data'),
        'brides_name_men'       =>request('brides_name_men'),
        'bin_men'               =>request('bin_men'),
        'place_of_birth_men'    =>request('place_of_birth_men'),
        'date_of_birth_men'     =>request('date_of_birth_men'),
        'profession_men'        =>request('profession_men'),
        'kk_number_men'         =>request('kk_number_men'),
        'nik_number_men'        =>request('nik_number_men'),
        'marital_status_men'    =>request('marital_status_men'),
        'address_female'        =>request('address_female'),
        'brides_name_female'    =>request('brides_name_female'),
        'bin_female'            =>request('bin_female'),
        'place_of_birth_female' =>request('place_of_birth_female'),
        'date_of_birth_female'  =>request('date_of_birth_female'),
        'profession_female'     =>request('profession_female'),
        'marital_status_female' =>request('marital_status_female'),
        'kk_number_female'      =>request('kk_number_female'),
        'nik_number_female'     =>request('nik_number_female'),
        'address_men'           =>request('address_men'),
        'actions'               =>'pending'
];

$setRules = [
        'id_marriage_data'        =>'required',
        'brides_name_men'         =>'required',
        'bin_men'                 =>'required',
        'place_of_birth_men'      =>'required|alpha',
        'date_of_birth_men'       =>'required|date',
        'profession_men'          =>'required',
        'kk_number_men'           =>'required|numeric|digits_between:16,16',
        'nik_number_men'          =>'required|numeric|digits_between:16,16',
        'marital_status_men'      =>'required',
        'address_female'          =>'required',
        'brides_name_female'      =>'required',
        'bin_female'              =>'required',
        'place_of_birth_female'   =>'required|alpha',
        'date_of_birth_female'    =>'required|date',
        'profession_female'       =>'required',
        'marital_status_female'   =>'required',
        'kk_number_female'        =>'required|numeric|digits_between:16,16',
        'nik_number_female'       =>'required|numeric|digits_between:16,16',
        'address_men'             =>'required'
];

$setAliases = [
        'id_marriage_data'          =>'Kode Data',     
        'brides_name_men'           =>'Nama Mempelai Pria',
        'bin_men'                   =>'Bin Mempelai Pra',
        'place_of_birth_men'        =>'Tempat Lahir Pra',
        'date_of_birth_men'         =>'Tanggal Lahir Pria',
        'profession_men'            =>'Pekerjaan Pria',
        'kk_number_men'             =>'Nomor KK Pria',
        'nik_number_men'            =>'Nomor NIK Pria',
        'marital_status_men'        =>'Status Perkawaninan Pira',
        'address_female'            =>'Alamat Mempelai Wanita',   
        'brides_name_female'        =>'Nama Mempelai Wanita',
        'bin_female'                =>'Bin Mempelai Wanita',
        'place_of_birth_female'     =>'Tempat Lahir Wanita',
        'date_of_birth_female'      =>'Tanggal Lahir Wanita',
        'profession_female'         =>'Pekerjaan Wanita',
        'marital_status_female'     =>'Status Perkawanian Wanita',
        'kk_number_female'          =>'Nomor KK Wanita',
        'nik_number_female'         =>'Nomor NIK Wanita',
        'address_men'               =>'Alamat Pria'
];

post();

require __DIR__.'/../../../config/validator.php';

$results = $update($table,$primaryKey,request($primaryKey),$setData); 
if(!empty($results)){
    reponse_ok("Berhasil diupdate.!", $results);
  exit();
}  