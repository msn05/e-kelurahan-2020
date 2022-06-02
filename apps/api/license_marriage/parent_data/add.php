<?php
require __DIR__.'/../../../config/api.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      ='parent_data';
$primaryKey ='id_parent_data';
$selected='';

$setData = [
        'marriage_data_id'      =>request('id_marriage_data'),
        'type_children'         =>request('type_children'),
        'father_name'           =>request('father_name'),
        'number_nik_father'     =>request('number_nik_father'),
        'place_of_birth_father' =>request('place_of_birth_father'),
        'date_of_birth_father'  =>request('date_of_birth_father'),
        'national_father'       =>request('national_father'),
        'religion_father'       =>request('religion_father'),
        'profession_father'     =>request('profession_father'),
        'address_father'        =>request('address_father'),
        'mother_name'           =>request('mother_name'),
        'number_nik_mother'     =>request('number_nik_mother'),
        'place_of_birth_mother' =>request('place_of_birth_mother'),
        'date_of_birth_mother'  =>request('date_of_birth_mother'),
        'national_mother'       =>request('national_mother'),
        'religion_mother'       =>request('religion_mother'),
        'profession_mother'     =>request('profession_mother'),
        'address_mother'        =>request('address_mother'),
];

$setRules = [
        'marriage_data_id'      =>'required',
        'type_children'         =>'required',
        'father_name'           =>'required|alpha_spaces',
        'number_nik_father'     =>'required|numeric|digits_between:16,16',
        'place_of_birth_father' =>'required|alpha',
        'date_of_birth_father'  =>'required|date',
        'national_father'       =>'required',    
        'religion_father'       =>'required',
        'profession_father'     =>'required',
        'address_father'        =>'required',
        'mother_name'           =>'required|alpha_spaces',
        'number_nik_mother'     =>'required|numeric|digits_between:16,16',
        'place_of_birth_mother' =>'required|alpha|max:50',
        'date_of_birth_mother'  =>'required|date',
        'national_mother'       =>'required',
        'religion_mother'       =>'required',
        'profession_mother'     =>'required',
        'address_mother'        =>'required'
];

$setAliases = [
        'marriage_data_id'      =>'Kode Data Menikah',
        'type_children'         =>'Orang tua dari mempelai',
        'father_name'           =>'Nama Ayah',
        'number_nik_father'     =>'Nomor NIK Ayah',
        'place_of_birth_father' =>'Tempat Lahir Ayah',
        'date_of_birth_father'  =>'Tanggal Lahir Ayah',
        'national_father'       =>'Kebangsaan',    
        'religion_father'       =>'Agama',
        'profession_father'     =>'Pekerjaan Ayah',
        'address_father'        =>'Alamat Ayah',
        'mother_name'           =>'Nama Ibu',
        'number_nik_mother'     =>'Nomor NIK Ibu',
        'place_of_birth_mother' =>'Tempat Lahir Ibu',
        'date_of_birth_mother'  =>'Tanggal Lahir Ibu',
        'national_mother'       =>'Kebangsaan',
        'religion_mother'       =>'Agama',
        'profession_mother'     =>'Pekerjaan Ibu',
        'address_mother'        =>'Alamat Ibu',
];


post();

require __DIR__.'/../../../config/validator.php';

$check_data = $show_by_id($table,'marriage_data_id',request('id_marriage_data'),$selected);
if(!empty($check_data)){
    response_failed("Anda Sudah menambahkan data.!");
    exit();
}
// echo json_encode($check_data);
// try {
//         echo json_encode($results);
// } catch (Exception $e) {
//         echo $e->getMessage(),$setData;
        
// }
$results = $insert($table,$setData); 

if(!empty($results)){
    reponse_ok("Berhasil. ", $results);
    exit();
}  