<?php
if(!isset($_SESSION)) { session_start(); }

if(@$_SESSION['TrueLog'] == false ){
    header('location:../../login.php');
    exit();
}

require __DIR__.'/../../../helpers/uri.php';
require __DIR__.'/head.php';
require __DIR__.'/menu.php';

?>
<!-- #Menu -->

<!-- Right Sidebar -->
<div class="main-content">

    <div class="page-content">
     <div class="row">
      <div class="col-12">
         <div class="page-title-box d-flex align-items-center justify-content-between">
             <h4 class="page-title mb-0 font-size-18"><?=strtoupper($_GET['Halaman']??'dashboard');?></h4>
             <div class="page-title-right">
              <ol class="breadcrumb m-0">
                 <li class="breadcrumb-item"><a href="javascript: void(0);">E-kelurahan</a></li>
                 <li class="breadcrumb-item active"><?=strtoupper($_GET['Halaman']??'dashboard');?></li>
             </ol>
         </div>
     </div>
 </div>
</div>

<?php
@$content   = $_GET['Halaman'] ?? '';
@$aksi      = $_GET['Aksi'] ?? '';
$validpage  = array("profile","role","staf","pelayanan","users","public","persyaratan","pelayanan_masuk","log_pelayanan","upload_file","pesan","signature_lurah","pembuatan_berkas_pengajuan_keterangan","request_signature_lurah","verifikasi","downloads","pengajuan_masuk","pembuatan_berkas_pajak","profile","laporan","pengantar_nikah","pembuatan_surat_pengantar_nikah","laporan");
$validadmin = array("profile","role","staf","pelayanan","users","public","persyaratan","pelayanan_masuk","log_pelayanan","upload_file","pesan","signature_lurah","pembuatan_berkas_pengajuan_keterangan","request_signature_lurah","verifikasi","downloads","pengajuan_masuk","pembuatan_berkas_pajak","profile","laporan","pengantar_nikah","pembuatan_surat_pengantar_nikah","laporan");
if (in_array($content, $validpage)){
    if($aksi ==""){
        include(__DIR__."/"."../".$content."/".$content.".php");
    }elseif ($aksi=="form" && in_array($content, $validadmin)) {
        include(__DIR__."/"."../".$content."/form.php");
    }elseif ($aksi=="form_update" && in_array($content, $validadmin)) {
        include(__DIR__."/"."../".$content."/form_update.php");
    }elseif ($aksi=="info" && in_array($content, $validadmin)) {
        include(__DIR__."/"."../".$content."/info.php");
    }

}else{
    include(__DIR__."/../dashboard.php");
}
?>
</div>
<?php

require __DIR__.'/footer.php';

?>
