<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'certificate_taxandbuilding';
$primaryKey = 'code_tax';
$selected='';
$setData = [
    'code_tax'            => $uniqueCode($table, $primaryKey),
    'entrance_service_id' => request('entrance_service_id'),
    'office_name'         => request('office_name'),
    'position'            => request('position'),
    'subject_tax_name'    => request('subject_tax_name'),
    'address_tax_object'  => request('address_tax_object'),
    'location'            => request('location'),
    'number_object'            => request('number_object'),
    // 'value_of_tax_payable'            => request('value_of_tax_payable'),
    'necessity'           => request('necessity'),
    'coment'              => request('coment'),
    'actions'             => 'pending',
    'status_genered'      => 0
];

$setRules = [
    'subject_tax_name'    => 'required',
    'office_name'         => 'required', 
    'position'            => 'required',
    'address_tax_object'  => 'required',
    'location'            => 'required',
    'coment'              => 'required',
    'necessity'           => 'required',
    'entrance_service_id' => 'required'
];

$setAliases = [
    'office_name'         => 'Nama Pegawai Kelurahan', 
    'position'            => 'Posisi Pegawai',
    'subject_tax_name'    => 'Nama Pembuat Pajak',
    'address_tax_object'  => 'Alamat Pajak',
    'location'            => 'Lokasi',
    'coment'              => 'Keterangan',
    'necessity'           => 'Keperluan',
    'entrance_service_id' => 'Pilih Nomor Pengajuannya'
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
    reponse_ok("Berhasil Ditambahkan!", $results);
  exit();
}  