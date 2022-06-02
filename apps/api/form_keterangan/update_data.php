<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'statement_letter';
$primaryKey = 'code_print';

$setData = [
    'code_print'          => request('code_print'),
    'entrance_service_id' => request('entrance_service_id'),
    'office_name'         => request('office_name'),
    'position'            => request('position'),
    'name'                => request('name'),
    'gender'              => request('gender'),
    'national'            => request('national'),
    'religion'            => request('religion'),
    'status'              => request('status'),
    'address_now'         => request('address_now'),
    'users_id'            => request('users_id'),
    'actions'             => 'pending',
    'rt'                  => request('rt'),
    'date_rt'             => request('date_rt')
    // 'death_date'          => request('death_date'),
];

$setRules = [
    'code_print'          => 'required',
    'entrance_service_id' => 'required',
    'office_name'         => 'required', 
    'position'            => 'required',
    'name'                => 'required',
    'gender'              => 'required',
    'national'            => 'required',
    'religion'            => 'required',
    'status'              => 'required',
    'address_now'         => 'required',
    'rt'                  => 'required|numeric',
    'date_rt'             => 'required|date'
    // 'death_date'          => 'required|date'
];

$setAliases = [
    'code_print'            => 'Kode Pencetakan',
    'office_name'           => 'Nama Pegawai Kelurahan', 
    'position'              => 'Posisi Pegawai',
    'name'                  => 'Nama Yang Meninggal Dunia',
    'gender'                => 'Jenis Kelamin',
    'national'              => 'Kebangsaan',
    'religion'              => 'Agama',
    'status'                => 'Status',
    'address_now'           => 'Alamat',
    'entrance_service_id'   => 'Kode Pengajuan Layanan',
    'rt'                    => 'RT',
    'date_rt'               => 'Tanggal RT'
    // 'death_date'            => 'Tanggal Meninggal'
];


post();

require __DIR__.'/../../config/validator.php';

$results = $update($table,$primaryKey,request($primaryKey),$setData);
if(!empty($results)){
  reponse_ok("Berhasil Diupdate!", $results);
  exit();
}  