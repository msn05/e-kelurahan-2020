<?php
require __DIR__.'/../../../config/api.php';
$table      = 'license_marriage';
$primaryKey = 'id_license_marriage';
$selected='';


$setData = [
	'id_license_marriage'   => request('id_license_marriage')
];
// echo json_encode(request('code_print'));
$setRules = [
	'id_license_marriage'   => 'required'
];

$setAliases = [
	'id_license_marriage'             => 'Pilih Kode Berkas'
];

post();

require __DIR__.'/../../../config/validator.php';


$check_data = $show_by_id($table,$primaryKey, request($primaryKey),$selected);

if($check_data->actions === 'diterima'){
	if($check_data->status_genered == 0){

		$yangMenikah = $show_by_id('marriage_data','license_marriage_id',$check_data->id_license_marriage,$selected);
		$OrangTua = $show_by_id('parent_data','marriage_data_id',$yangMenikah->id_marriage_data,$selected);
	
		$users = $show_by_id('users','role_id','2',$selected);
		$NameLurah = $show_by_id('employee_data','users_id',$users->id_users,$selected);
		$TTD = $show_by_id('signature_lurah','actions','berlaku',$selected);

		$dataService = $show_by_id('entrance_services','code_entrance_services', $check_data->entrance_service_id,$selected);

    //               ];
    $date = date("d-m-Y");
    $tahun = date("Y");
    include __DIR__.'/../../../helpers/print.php';


    include __DIR__.'/header_nikah.php';
    // // include __DIR__.'/keterangan_genered/index.php';
    $html   = '
            <html>
            <main>
                '.$head.'
                '.$footer.'      

            </body>
            </html>
    ';
    //                 // <h3 class="paragraf"> Saya yang bertanda tangan dibawah : </h3>


    $dompdf->loadHtml($html);

    $dompdf->setPaper('legal', 'portrait');

    // // Render the HTML as PDF
    $dompdf->render();
    $FileCreated = uniqid('',true); 
    $output = $dompdf->output();
    $Created = file_put_contents('../../../file_manager/file_request/'.$FileCreated.'.pdf',$output);

    $dataDownloads = [
        'code_print' => request('id_license_marriage'),
        'file'       => $FileCreated.'.pdf',
        'actions'    => 1
    ];
    $dataGenered = [
        'status_genered' => 1
    ];
    $results = $update($table,$primaryKey,request($primaryKey),$dataGenered);
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