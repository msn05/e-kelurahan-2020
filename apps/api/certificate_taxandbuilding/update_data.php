<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';
$table      = 'certificate_taxandbuilding';
$primaryKey = 'code_tax';

$setData = [
    'code_tax'            => request('code_tax'),
    'entrance_service_id' => request('entrance_service_id'),
    'office_name'         => request('office_name'),
    'position'            => request('position'),
    'subject_tax_name'    => request('subject_tax_name'),
    'address_tax_object'  => request('address_tax_object'),
    'location'            => request('location'),
    'necessity'           => request('necessity'),
    'coment'              => request('coment'),
    'actions'             => 'pending'
];

$setRules = [
    'code_tax'            => 'required',
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
    'code_tax'            => 'Kode Pajak Bumi dan Bangunan',
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

$results = $update($table,$primaryKey,request($primaryKey),$setData);
if(!empty($results)){
  reponse_ok("Berhasil Diupdate!", $results);
  exit();
}  