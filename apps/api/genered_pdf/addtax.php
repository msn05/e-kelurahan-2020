<?php
require __DIR__.'/../../config/api.php';
$table      = 'certificate_taxandbuilding';
$primaryKey = 'code_tax';
$selected='';


$setData = [
    'code_print'   => request('code_print')
];
// echo json_encode(request('code_tax'));
$setRules = [
    'code_print'   => 'required'
];

$setAliases = [
    'code_print'             => 'Pilih Kode Berkas'
];

post();

require __DIR__.'/../../config/validator.php';


$check_data = $show_by_id($table,$primaryKey, request('code_print'),$selected);

if($check_data->actions === 'diterima'){
    if($check_data->status_genered == 0){

    $users = $show_by_id('users','role_id','2',$selected);
    $NameLurah = $show_by_id('employee_data','users_id',$users->id_users,$selected);
    $TTD = $show_by_id('signature_lurah','actions','berlaku',$selected);

    // $where_data = ['entrance_services.code_entrance_services' => $check_data->entrance_service_id
                //   ];
    $dataService = $show_by_id('entrance_services','code_entrance_services', $check_data->entrance_service_id,$selected);
    // echo json_encode($dataService->service_categori_id);


    $dataServiceName = $show_by_id('service_categories', 'id_service_categori',$dataService->service_categori_id,$selected);
    $date = date("Y");
    include __DIR__.'/../../helpers/print.php';
    $foto = __DIR__.'../../file_manager/file/logo.png';
    // // reponse_ok("Berhasil Dibuat!", $results);
    // // exit();
    include __DIR__.'/header.php';
    // include __DIR__.'/keterangan_genered/index.php';
    include __DIR__.'/footer.php';
    $html   = '
            <html>
                '.$head.'
                <main>
                    <h3 class="text-center surat-jenis ">'.$dataServiceName->name.' <br>
                    <span style="font-size:15px; border-top:2px solid black;">Nomor : 470/ '.$check_data->code_tax.' / V / LG / '.$date.' </span>
                    </h3>
                   <table border="0" width="600px;">
                    <tbody>
                    <tr><td colspan="3"> Saya yang bertanda tangan dibawah ini :</td></tr>
                    <tr><td width="200px;">Nama</td><td width="5px;">:</td><td class="uppercase">' .$check_data->office_name.'</td></tr>
                    <tr><td width="200px">Jabatan</td width="5px;"><td>:</td><td class="uppercase">' .$check_data->position.'</td></tr>
                    <tr><td style="padding-top:0.6cm;"></td></tr>
                    <tr><td colspan="3">Dengan ini menerangkan bahwa :</td>
                    <tr><td>Nama Subjek Pajak</td><td>:</td><td class="uppercase">' .$check_data->subject_tax_name.'</td></tr>
                    <tr><td>Alamat Subjek Pajak</td><td>:</td><td class="uppercase">' .$check_data->address_tax_object.'</td></tr>
                    <tr><td>Letak Objek Pajak</td><td>:</td><td class="uppercase">' .$check_data->location.'</td></tr>
                    <tr><td>Nomor Objek Pajak</td><td>:</td><td class="uppercase">' .$check_data->number_object.'</td></tr>
                    <tr><td>Nilai</td><td>:</td><td class="uppercase">' .$check_data->value_of_tax_payable.'</td></tr>
                    <tr><td>Keperluan</td><td>:</td><td class="uppercase">' .$check_data->necessity.'</td></tr>
                    <tr><td>Keterangan</td><td>:</td><td class="uppercase">' .$check_data->coment.'</td></tr>
                    </tbody></table>

                '.$footer.'      

                </main>
            </body>
            </html>
    ';
                    // <h3 class="paragraf"> Saya yang bertanda tangan dibawah : </h3>


    $dompdf->loadHtml($html);
    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();
    $FileCreated = uniqid('',true); 

    $output = $dompdf->output();
    $Created = file_put_contents('../../file_manager/file_request/'.$FileCreated.'.pdf',$output);

    $dataDownloads = [
        'code_print' => request('code_print'),
        'file'       => $FileCreated.'.pdf',
        'actions'    => 1
    ];
    $dataGenered = [
        'status_genered' => 1
    ];
    $results = $update($table,$primaryKey,request('code_print'),$dataGenered);
        $Insert = $insert('downloads',$dataDownloads);
        reponse_ok("Berhasil Dibuat!");
        exit();
    } else {
    response_failed("Mohon maaf data sudah digenered.!");
    exit();

    }
   
} else{

    response_failed("Belum bisa dilakukan genered pada file ini karena belum disetujui.!");
    exit();


}