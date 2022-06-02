<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'statement_letter';
$primaryKey = 'code_print';
$selected='';
$setData = [
    'code_print'          => $uniqueCode($table, $primaryKey),
    'entrance_service_id' => request('entrance_service_id'),
    'office_name'         => request('office_name'),
    'position'            => request('position'),
    'name'                => request('name'),
    'place_of_birth'      => request('place_of_birth'),
    'date_of_birth'       => request('date_of_birth'),
    'profession'          => request('profession'),
    'gender'              => request('gender'),
    'national'            => request('national'),
    'religion'            => request('religion'),
    'status'              => request('status'),
    'address_now'         => request('address_now'),
    'users_id'            => request('users_id'),
    'actions'             => 'pending',
    'rt'                  => request('rt'),
    'status_genered'      => 0
];

$setRules = [
    'entrance_service_id' => 'required',
    'office_name'         => 'required', 
    'position'            => 'required',
    'name'                => 'required',
    'gender'              => 'required',
    'national'            => 'required',
    'religion'            => 'required',
    'status'              => 'required',
    'address_now'         => 'required',
    'rt'                  => 'required',
    'place_of_birth'      => 'required',
    'date_of_birth'       => 'required|date',
    'profession'          => 'required'
];

$setAliases = [
    'office_name'           => 'Nama Pegawai Kelurahan', 
    'position'              => 'Posisi Pegawai',
    'name'                  => 'Nama Yang Meninggal Dunia',
    'gender'                => 'Jenis Kelamin',
    'national'              => 'Kebangsaan',
    'religion'              => 'Agama',
    'status'                => 'Status',
    'address_now'           => 'Alamat',
    'entrance_service_id'   => 'Kode Pengajuan Layanan',
    'rt'                    => 'Keterangan RT Tanggal dan Nomor ',
    'place_of_birth'        => 'Tempat Lahir',
    'date_of_birth'         => 'Tanggal Lahir',
    'profession'            => 'Profesi'
];


post();

require __DIR__.'/../../config/validator.php';


    $check_data = $show_by_id($table,'entrance_service_id',request('entrance_service_id'),$selected);
        if(!empty($check_data)){
            response_failed("Anda Sudah menambahkan data.!");
            exit();
        }
        $check_keteranganKematian = $show_by_id('entrance_services','code_entrance_services',request('entrance_service_id'),$selected);
        // $checkDataKematian  = $show_by_id('service_categories','id_service_categori',$check_keteranganKematian->service_categori_id,$selected);


        if($check_keteranganKematian->service_categori_id === 'SPK-0002'){
            if(request('death_date') == null){
                // $setData = [
                //     'code_print'          => $uniqueCode($table, $primaryKey),
                //     'entrance_service_id' => request('entrance_service_id'),
                //     'office_name'         => request('office_name'),
                //     'position'            => request('position'),
                //     'name'                => request('name'),
                //     'place_of_birth'      => request('place_of_birth'),
                //     'date_of_birth'       => request('date_of_birth'),
                //     'profession'          => request('profession'),
                //     'gender'              => request('gender'),
                //     'national'            => request('national'),
                //     'religion'            => request('religion'),
                //     'status'              => request('status'),
                //     'address_now'         => request('address_now'),
                //     'users_id'            => request('users_id'),
                //     'actions'             => 'pending',
                //     'rt'                  => request('rt'),
                //     'death_date'          => request('death_date')
                // ];
                
            response_failed("Silakan Mengisi Tanggal Meninggal.!");
              exit();
            }
             $setDataKemtian = [
                   'code_print'          => $uniqueCode($table, $primaryKey),
                    'entrance_service_id' => request('entrance_service_id'),
                    'office_name'         => request('office_name'),
                    'position'            => request('position'),
                    'name'                => request('name'),
                    'place_of_birth'      => request('place_of_birth'),
                    'date_of_birth'       => request('date_of_birth'),
                    'profession'          => request('profession'),
                    'gender'              => request('gender'),
                    'national'            => request('national'),
                    'religion'            => request('religion'),
                    'status'              => request('status'),
                    'address_now'         => request('address_now'),
                    'users_id'            => request('users_id'),
                    'actions'             => 'pending',
                    'rt'                  => request('rt'),
                     'death_date'          => request('death_date')
                ];
                $results = $insert($table,$setDataKemtian);    
                reponse_ok("Berhasil Ditambahkan!", $results);
            exit();
        }
        $results = $insert($table,$setData);    

        if(!empty($results)){
            reponse_ok("Berhasil Ditambahkan!", $results);
            exit();
        }  
        response_failed("Terjadi Kesalahan!");
