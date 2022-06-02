<?php
require __DIR__.'/../../../config/web.php';
include __DIR__.'/../../../helpers/print.php';
$foto = __DIR__.'../../../file_manager/file/logo.png';
include __DIR__.'/header_laporan.php';


$start   			= $_POST['startdate'];
$end   				= $_POST['enddate'];
$kode_pelayanan   	= $_POST['jenisLaporan'];
$selected   		= '';
// post();

$starter        = strtotime($start);

$ender          = strtotime($end);
$mulai          = date('Y-m-d H:i:s',$starter);
$akhir          = date('Y-m-d H:i:s',$ender);
if($kode_pelayanan != ''){
	$dataService = $show_by_id('service_categories','id_service_categori', $kode_pelayanan,$selected);
	$keteranganSurat = $dataService->name;
}else{
	$keteranganSurat = 'Keterangan';
}

include __DIR__.'/db.php';
$html = 
'<html>
'.$head.'
<main>
<h3 class="text-center surat-jenis ">Laporan '.$keteranganSurat.' <br>
<span style="font-size:15px;">Dari : '.date('d-m-Y',$starter).' Sampai '.date('d-m-Y',$ender).' </span>
</h3>
<br>
<table class="customers">
'.$data.'
</table>
</main>
</html>';

$FileCreated = uniqid('',true);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($FileCreated,array("Attachment"=>false));
