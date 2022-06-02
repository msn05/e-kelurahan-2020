<?php
include __DIR__.'/../../../helpers/date_day_format.php';


if($dataServiceName->name === 'surat keterangan tidak mampu'){
$data = '<p class="paragraf">Berdasarkan surat keterangan RT. '.$check_data->rt.', yang bersangkutan memang benar Penduduk Kelurahan Lebung Gajah Kecamatan Borang Kota Palembang yang berdomisili di alamat tersebut di atas dan yang bersangkutan benar dari <strong><i>Keluarga Kurang Mampu / MISKIN. Dan Keluarga ini Akan diusulkan Dalam Data BDT Periode Berikutnya.</i></strong></p>
        <p class="paragraf">Surat keterangn ini diberikan untuk melengkapi persyaratan administrasi mengurus perpanjangan KIS (Kartu Indonesia Sehat) di Dinas Sosial Kota Palembang.</p>
                <p class="paragraf">Demikian surat keterangan ini diberikan untuk dipergunakan seperlunya.</p>
               ';


}
if($dataServiceName->name ==='Surat keterangan kematian'){

	$data = '<p class="paragraf">Berdasarkan surat keterangan RT. '.$check_data->rt.', yang bersangkutan memang benar Penduduk Kelurahan Lebung Gajah Kecamatan Borang Kota Palembang yang berdomisili di alamat tersebut di atas dan yang bersangkutan benar telah meninggal dunia pada hari '.hari_ini(date('D',strtotime($check_data->death_date))).' tanggal '.date('d-m-Y',strtotime($check_data->death_date)).' karena sakit.</p>
        <p class="paragraf">Demikian surat keterangan ini diberikan untuk dipergunakan seperlunya.</p>
               ';

}
if($dataServiceName->name === 'Surat keterangan domisili'){

	$data = ' <p class="paragraf">Berdasarkan surat keterangan RT. '.$check_data->rt.', yang bersangkutan memang benar Penduduk Kelurahan Lebung Gajah Kecamatan Borang Kota Palembang yang berdomisili di alamat tersebut di atas.</p>
                <p class="paragraf">Demikian surat keterangan ini diberikan untuk dipergunakan seperlunya.</p>
               ';
}
if($dataServiceName->name === 'Surat keterangan berkelakuan baik'){
$data = ' <p class="paragraf">Berdasarkan surat keterangan RT. '.$check_data->rt.', yang bersangkutan memang benar Penduduk Kelurahan Lebung Gajah Kecamatan Borang Kota Palembang yang berdomisili di alamat tersebut di atas dan benar yang bersangkutan berkelakuan baik.</p>
<p> Surat keterangan ini diberikan untuk melengkapi persyaratan administrasi masuk BINTARA.</p>
                <p class="paragraf">Demikian surat keterangan ini diberikan untuk dipergunakan seperlunya.</p>
               ';
}

if($dataServiceName->name ==='Surat keterangan usaha'){
	$data = ' <p class="paragraf">Berdasarkan surat keterangan RT. '.$check_data->rt.', yang bersangkutan memang benar Penduduk Kelurahan Lebung Gajah Kecamatan Borang Kota Palembang yang berdomisili di alamat tersebut di atas dan benar yang bersangkutan diatas memiliki usaha.</p>
<p> Surat keterangan ini diberikan untuk melengkapi persyaratan administrasi pencairan BPUM/UMKM.</p>
                <p class="paragraf">Demikian surat keterangan ini diberikan untuk dipergunakan seperlunya.</p>
               ';
}
if($dataServiceName->name ==='Surat keterangan belum menikah'){
	$data = ' <p class="paragraf">Berdasarkan surat keterangan RT. '.$check_data->rt.', yang bersangkutan memang benar Penduduk Kelurahan Lebung Gajah Kecamatan Borang Kota Palembang yang berdomisili di alamat tersebut di atas dan benar yang bersangkutan belum pernah menikah.</p>
<p> Surat keterangan ini diberikan untuk melengkapi persyaratan administrasi mengajukan kredir rumah.</p>
                <p class="paragraf">Demikian surat keterangan ini diberikan untuk dipergunakan seperlunya.</p>
               ';
}
if($dataServiceName->name ==='Surat keterangan kelahiran'){
	$data = ' <p class="paragraf">Berdasarkan surat keterangan RT. '.$check_data->rt.', yang bersangkutan memang benar Penduduk Kelurahan Lebung Gajah Kecamatan Borang Kota Palembang yang berdomisili di alamat tersebut di atas dan benar terdapat kesalahan nama di Kartu Keluarga. Nama yang benar adalah <strong><i>' .$check_data->name. '</i></strong> sesuai Akter Kelahiran serta benar yang bersangkuran adalah satu orang yang sama. </p>
                <p class="paragraf">Demikian surat keterangan ini diberikan untuk dipergunakan seperlunya.</p>
               ';
}