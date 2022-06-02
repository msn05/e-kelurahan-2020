<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      ='parent_data';
$primaryKey ='id_parent_data';


$setData = [
        'id_parent_data'        =>request('id_parent_data'),
        'father_name'           =>request('father_name'),
        'bin_name_father'       =>request('bin_name_father'),
        'number_nik_father'     =>request('number_nik_father'),
        'place_of_birth_father' =>request('place_of_birth_father'),
        'date_of_birth_father'  =>request('date_of_birth_father'),
        'national_father'       =>request('national_father'),
        'religion_father'       =>request('religion_father'),
        'profession_father'     =>request('profession_father'),
        'address_father'        =>request('address_father'),
        'mother_name'           =>request('mother_name'),
        'bin_name_mother'       =>request('bin_name_mother'),
        'number_nik_mother'     =>request('number_nik_mother'),
        'place_of_birth_mother' =>request('place_of_birth_mother'),
        'date_of_birth_mother'  =>request('date_of_birth_mother'),
        'national_mother'       =>request('national_mother'),
        'religion_mother'       =>request('religion_mother'),
        'profession_mother'     =>request('profession_mother'),
        'address_mother'        =>request('address_mother')
];

$setRules = [
        'id_parent_data'        =>'required',
        'father_name'           =>'required',
        'bin_name_father'       =>'required',
        'number_nik_father'     =>'required|numeric|digits_between:16,16',
        'place_of_birth_father' =>'required|alpha',
        'date_of_birth_father'  =>'required|date',
        'national_father'       =>'required',    
        'religion_father'       =>'required',
        'profession_father'     =>'required',
        'address_father'        =>'required',
        'mother_name'           =>'required',
        'bin_name_mother'       =>'required',
        'number_nik_mother'     =>'required|numeric|digits_between:16,16',
        'place_of_birth_mother' =>'required|alpha|max:50',
        'date_of_birth_mother'  =>'required|date',
        'national_mother'       =>'required',
        'religion_mother'       =>'required',
        'profession_mother'     =>'required',
        'address_mother'        =>'required'
];

$setAliases = [
        'id_parent_data'        =>'Kode Data',
        'father_name'           =>'Nama Ayah',
        'bin_name_father'       =>'Bin Ayah',
        'number_nik_father'     =>'Nomor NIK Ayah',
        'place_of_birth_father' =>'Tempat Lahir Ayah',
        'date_of_birth_father'  =>'Tanggal Lahir Ayah',
        'national_father'       =>'Kebangsaan',    
        'religion_father'       =>'Agama',
        'profession_father'     =>'Pekerjaan Ayah',
        'address_father'        =>'Alamat Ayah',
        'mother_name'           =>'Nama Ibu',
        'bin_name_mother'       =>'Bin Ibu',
        'number_nik_mother'     =>'Nomor NIK Ibu',
        'place_of_birth_mother' =>'Tempat Lahir Ibu',
        'date_of_birth_mother'  =>'Tanggal Lahir Ibu',
        'national_mother'       =>'Kebangsaan',
        'religion_mother'       =>'Agama',
        'profession_mother'     =>'Pekerjaan Ibu',
        'address_mother'        =>'Alamat Ibu'
];


post();

require __DIR__.'/../../../config/validator.php';

$results = $update($table,$primaryKey,request($primaryKey),$setData); 
if(!empty($results)){
    reponse_ok("Berhasil diupdate.!", $results);
  exit();
}  