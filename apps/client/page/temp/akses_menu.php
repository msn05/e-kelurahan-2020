<?php
$Menu = @$_SESSION['session_role'];
if($Menu == 1){
	$dataMenu = '

	<li>
	<a href="?Halaman=role" class="waves-effect">
	<i class=" mdi mdi-access-point "></i><span>Role</span>
	</a>
	</li>
	<li >
	<a href="javascript: void(0);" class="has-arrow waves-effect">
	<i class=" mdi mdi-account-multiple-check-outline "></i><span>Users</span>
	</a>
	<ul class="sub-menu" aria-expanded="true">
	<li><a href="?Halaman=staf" >Staf</a>
	</li>
	<li><a href="?Halaman=public">Warga</a>
	</li>
	</ul>
	</li>

	<li><a href="javascript:void(0);"  class="has-arrow waves-effect">   <i class=" mdi mdi-file-sync "></i><span>Management Berkas</span></a>
	<ul class="sub-menu" aria-expanded="true">
	<li>
	<a href="?Halaman=pelayanan" >
	<i class=" mdi mdi-folder-key-outline "></i><span>Pelayanan</span>
	</a>
	</li>
	<li >
	<a href="?Halaman=persyaratan" >
	<i class="  mdi mdi-folder-upload-outline "></i><span>Persyaratan</span>
	</a>
	</li>
	
	<li>
	<a href="?Halaman=pesan"><i class="mdi mdi-message"></i><span>Pesan</span>
	</a>
	</li>
	</ul>
	</li>

	<li >
	<a href="?Halaman=pembuatan_berkas_pengajuan_keterangan" >
	<i class=" mdi mdi-file-certificate-outline"></i><span>Pembuatan Berkas </span>
	</a>

	</li>
	<li class="menu-title">Management Berkas</li><li>
	<li>
	<a href="?Halaman=downloads"><i class=" mdi mdi-file-download "></i><span>Downloads</span>
	</a>
	</li>

	</li>
	';

}elseif($Menu == 2){
	$dataMenu = '
	<li class="menu-title">Management Lurah</li>
	<li ><a href="javascript:void(0);" class="has-arrow waves-effect"> <i class="  mdi mdi-signature  "></i></i><span> TTD Lurah</span></a>
	<ul class="sub-menu" aria-expanded="true">
	<li><a href="?Halaman=signature_lurah"> <i class=" mdi mdi-file-certificate-outline"></i><span>Data</span></a>
	</li>
	<li  >
	<a href="javascript: void(0);" class="has-arrow waves-effect">
	<i class=" mdi mdi-file-certificate-outline"></i><span>Permintaan TTD</span>
	</a>
	<ul class="sub-menu" aria-expanded="true">
	<li><a href="?Halaman=request_signature_lurah&if=keterangan">Data Keterangan</a></li>
	<li><a href="?Halaman=request_signature_lurah&if=pajak">Data Pajak</a></li>
	<li><a href="?Halaman=request_signature_lurah&Aksi=info">Data Menikah</a></li>
	</ul>

	</li>
	</ul>
	</li>


	<li ><a href="javascript:void(0);" class="has-arrow"> <i class="  mdi mdi-signature  "></i><span>Manajement Laporan</span></a>
	<ul class="sub-menu" aria-expanded="true">
	<li><a href="?Halaman=laporan&Keterangan=keterangan">Data Keterangan</a></li>
	<li><a href="?Halaman=laporan&Keterangan=Pajak">Data Pajak</a></li>
	<li><a href="?Halaman=laporan&Keterangan=Menikah">Data Menikah</a></li>
	</ul>
	</li>

	';

}else{
	$dataMenu = '

	<li>
	<a href="?Halaman=pengajuan_masuk">
	<i class=" mdi mdi-folder-upload-outline"></i><span>Berkas Masuk</span>
	</a>
	</li>

	<li><a href="javascript:void(0);"  class="has-arrow waves-effect">   <i class=" mdi mdi-view-agenda-outline "></i><span>Pengajuan Berkas</span></a>
	<ul class="sub-menu" aria-expanded="true">
	<li><a href="?Halaman=pelayanan_masuk&Aksi=form&if=Tambah">Keterangan</a></li>
	<li><a href="?Halaman=pengantar_nikah">Pengantar Nikah</a></li>
	</ul>
	</li>
<li>
	<a href="?Halaman=pesan"><i class="mdi mdi-message"></i><span>Pesan</span>
	</a>
	</li>
	<li class="menu-title">Management Berkas</li><li>
	<li>
	<a href="?Halaman=downloads&Aksi=info"><i class=" mdi mdi-file-download "></i><span>Downloads</span>
	</a>
	</li>

	</li>
	
	';

}
// <li><a href="?Halaman=pengantar_nikah"><i class=" mdi mdi-folder-upload-outline"></i>Pengantar Nikah</a></li>
	// <li>
	// <a href="?Halaman=pesan"><i class="mdi mdi-message"></i><span>Pesan</span>
	// </a>
	// </li>