 <?php 
 // if($OrangTua->type_children == 'Pria'){
 // 	$namaNya = $yangMenikah->brides_name_men
 // };
 include __DIR__.'/marriage_data.php';

 $head = '
 <head>
 <style>
 /** 
 Set the margins of the page to 0, so the footer and the header
 can be of the full height and width !
                **/
 @page {
 	margin : 0cm 0cm;
 }
 .page_break { page-break-before: always; }


 /** Define now the real margins of every page in the PDF **/
 body {
 	margin-top: 1.5cm;
 	margin-left: 2cm;
 	margin-right: 2cm;
 	margin-bottom: 1cm;
 	font-size:10;
 }

 /** Define the header rules **/
 header {
 	position: fixed;
 	margin-top:4px;

 }
 .padding2cm{

 	padding-top:20px; padding-bottom:15px;
 }

 p{
 	font-size :10;
 	margin:0px;
 	padding: 0px;
 }
 .header img {
 	float: left;
 	padding-left: 3cm;
 	padding-top : 0.4cm;
 }
 .header p {
 	position : absolute;
 	padding-left : 6cm;
 	text-align:left;
 	font-size : 20px;
 }
 .kanan{
 	text-align:right;
 }
 .kiri{
 	text-align:left;
 	font-size :12;
 }
 .besarDepan {
 	text-transform:capitalize;
 }
 .besartanpaBold {
 	text-transform:uppercase;
 }
 .uppercase {
 	text-transform : uppercase;
 	font-weight: bold;
 }
 .titik_rata {
 	padding-left : 50px;
 }
 .rata_kiri p {
 	padding-left: 5px;
 }
 .font12 {
 	font-size:12;
 }

 main .surat-jenis {
 	margin-top : 3cm;
 	text-transform : uppercase;
 }
 main img {
 	padding-top : 0.2cm;
 	float : right;
 }
 main .ttd {
 	text-align:right;
 }


 .border {
 	border-bottom : 2px solid black;
 }
 .text-center{
 	text-align: center;
 }
 .text-right{
 	text-align: right;
 	margin : 2cm;
 }
 .paragraf {
 	text-align:justify;  
 	text-justify:initial;
 	font-size:15px;
 	margin-right:20px;
 }
 /** Define the footer rules **/
 footer {
 	position: fixed; 
 	bottom: 0cm; 
 	left: 2cm; 
 	right: 0cm;
 	height: 2cm;
 	color:blue;
 	font-style: italic;
 }
 </style>
 </head>
 <body>
 <table border="0" width="600px;" class="header">
 <tbody>
 <tr>
 <td colspan="3"></td>
 <td><strong>Palembang</strong></td>
 </tr>
 <tr>
 <td>Perihal:</td>
 <td>Permohonan Nikah mendapatkan</td>
 <td rowspan="2"></td>
 <td>Yth. Lurah Lebung Gajah</td>
 </tr>
 <tr>
 <td></td>
 <td>surat izin nikah / Kawin </td>
 <td>Kecamatan Sematang Borang<</td>
 </tr>
 <tr>
 <td colspan="3"></td>
 <td>di,-</td>
 </tr>
 <tr>
 <td colspan="3"></td>
 <td style="letter-spacing: 2px;" class="text-center">Palembang</td>
 </tr>
 </tbody>
 </table>
 <p> Dengan hormat:</P>
 <p style="text-indent: 50px; padding-top:5px; padding-bottom:5px;
 ">Saya yang bertanda tangan dibawah ini : </p>
 <table border="0" width="600px;">
 <tbody>
 <tr>
 <td width="150px;">Nama</td>
 <td width="5px;"> : </td>
 <td class="uppercase">'.$check_data->marriage_guardian_name.'</td>
 </tr>
 <tr>
 <td width="150px;">Tempat, Tanggal Lahir</td>
 <td width="5px;"> : </td>
 <td class="uppercase">'.$check_data->place_of_birth.' , '.$check_data->date_of_birth.'</td>
 </tr>
 <tr>
 <td width="150px;">Bangsa / Agama</td>
 <td width="5px;"> : </td>
 <td class="uppercase">'.$check_data->national.' , '.$check_data->religion.'</td>
 </tr>
 <tr>
 <td width="150px;">Pekerjaan</td>
 <td width="5px;"> : </td>
 <td class="uppercase">'.$check_data->profession.' </td>
 </tr>
 <tr>
 <td width="150px;">Alamat</td>
 <td width="5px;"> : </td>
 <td class="uppercase">'.$check_data->address.' </td>
 </tr>
 
 <tr>
 <td colspan="4" style="text-indent: 50px;padding-top:20px; padding-bottom:20px;">Dengan ini menyatakan permohonan kehadapan Lurah Lebung Gajah untuk mendapatkan izin menikah : Anak, Sdr, Keponakan, Saya dibawah ini :
 </td>
 </tr>

 '.$dataNya.'

 <tr>
 <td colspan="4" style="padding-top:20px; padding-bottom:20px;">
 Akan menikah dengan seorang Laki-laki / Perempuan dibawah ini:
 </td>
 '.$Calon.'
 </tr>
 <tr>
 <td colspan="4" class="paragraf" style="padding-top:20px; padding-right:85px;">
 Demikian surat permohonan ini saya buat dengan sebenarnya dan apabila dalam pernikahan ini bertentangan dengan Hukum yang berlaku, Maka saya Orang Tua / Wali yang menjamin akan bertanggung jawab segala resikonya, dengan tidak melibatkan pihak manapun juga. 
 </td>
 </tr>
 <tr>
 <td colspan="2" ></td>
 <td width="10px"></td>
 <td style="padding-top:20px; font-weight: bold;" width="200px;">Palembang, '.$date.'</td>
 </tr>

 <tr>
 <td style="padding-top:20px; ">Yang Bersangkutan</td>
 <td colspan="2"></td>
 <td style="padding-top:20px;"" width="200px">Hormat Saya Pemohon</td>
 </tr>
 <tr>
 <td colspan="2"></td>
 <td width="10px"></td>
 <td width="200px">Orang Tua Wali</td>
 </tr>
 <tr>
 <td style="padding-top:80px;" > .................</td>
 <td colspan="2"></td>
 <td  style="padding-top:80px;"width="200px">...................</td>
 </tr>
 <tr>
 <td>Saksi-saksi.
 </tr>
 <tr>
 <td>1.'.$check_data->saksi_one.'
 </td>
 </tr>
 <tr>
 <td >2.'.$check_data->saksi_two.'</td>
 </tr>
 <tr>
 <td colspan="4" class="text-center uppercase">
 Mengetahui
 </td>
 </tr>
 <tr>
 <td colspan="4" class="text-center ">
 Ketua RT '.$check_data->rt_number.' / RW '.$check_data->rw_number.'
 </td>
 </tr>
 <tr>
 <td  colspan="4" class="text-center " style="padding-top:80px;">....................</td>
 </tr>

 </tbody>
 </table>
 <footer> E-kelurahan Lebung Gajah Palembang</footer>
 <div class="page_break"></div>
 <p class="kanan besartanpaBold"> keputusan direktur jenderal bimbingan masyarakat islam</p>
 <p class="kanan besartanpaBold"> lampiran i</p>
 <p class="kanan besartanpaBold"> nomor 713 / tahun 2018</p>
 <p class="kanan besartanpaBold"> tentang</p>
 <p class="kanan besartanpaBold"> peneterapan formulir dan laporan pencatatan perkawinan atau rujuk</p>
 <p class="kanan uppercase" style="font-size:12;padding-top:2px; padding-bottom:3px;"> MODEL N1 </p>
 <table  border="0" width="600px;"  class="header">
 <tbody>

 <tr>
 <td class=" uppercase" width="150px;">kantor desa / kelurahan</td>
 <td class=" uppercase" width="5px;">:</td>
 <td class=" uppercase" width="200px;"> lebung gajah </td>
 </tr>
 <tr>
 <td class=" uppercase" width="150px;">Kecamatan</td>
 <td class=" uppercase" width="5px;">:</td>
 <td class=" uppercase" width="200px;"> sematang borang </td>
 </tr>
 <tr>
 <td class=" uppercase" width="150px;">Kabupaten / kota</td>
 <td class=" uppercase" width="5px;">:</td>
 <td class=" uppercase" width="200px;"> palembang </td>
 </tr>

 </tbody>
 </table>
 <p class="uppercase text-center" style="padding-top:10px; font-size:13;  text-decoration: underline; font12">surat pengantar perkawinan</p>
 <p class="text-center"> Nomor : 474.2/'.$check_data->id_license_marriage.' LG /V /'.$tahun.'</p>
 <table border="0" width="600px;" class="header">
 <tr>
 <td colspan="4" style="padding-top:20px; padding-bottom:15px;" class=" besarDepan">Yang bertanda tangan dibawah ini menerangkan dengan sesungguhnya bahwa :
 </td>
 </tr>

 '.$dataNya.'

 <tr>
 <td width="150px;">Kewarganegaraan</td>
 <td width="5px;"> : </td>
 <td class="uppercase">'.($OrangTua->type_children === 'Laki-laki' ? $yangMenikah->national_men : $yangMenikah->national_female).'</td>
 </tr>

 </table>
 <p class="padding2cm  besarDepan"> Adalah benar anak dari perkawinan seorang pria :</p> 
 <table>
 '.$dataAyah.'
 <tr>
 <td class="padding2cm" colspan="3">Dengan seorang wanita : </td>
 </tr>
 '.$dataIbu.'
 <tr>
 <td colspan="4" class="paragraf" style="padding-top:20px; padding-right:85px;">
 Dengan demikian surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya. 
 </td>
 </tr>
 </table>
 <p class="ttd"> Palembang,'.$date.'<br>
 Lurah Lebung Gajah</p>
 <img class="ttd" src="../../../file_manager/signature_lurah/'.$TTD->file.'" width="33%" height=50px">
 <br>
 <br>
 <br>
 <p class="ttd uppercase padding2cm">'.$NameLurah->name_employee.'<br>
 NIP : '.$NameLurah->number_identity.'</p>
 <footer> E-kelurahan Lebung Gajah Palembang</footer>

 <div class="page_break"></div>
 <p class="kanan besartanpaBold"> lampiran iii</p>
 <p class="kanan besartanpaBold"> keputusan direktur jenderal bimbingan masyarakat islam</p>
 <p class="kanan besartanpaBold"> nomor 713 / tahun 2018</p>
 <p class="kanan besartanpaBold"> tentang</p>
 <p class="kanan besartanpaBold"> peneterapan formulir dan laporan pencatatan perkawinan atau rujuk</p>
 <p class="kanan uppercase" style="font-size:12;padding-top:2px; padding-bottom:3px;"> MODEL N3 </p>
 <p class="uppercase text-center" style="padding-top:10px; font-size:13;  text-decoration: underline; font12">surat persetujuan mempelai</p>
 
 <table>
 <tr>
 <td class="padding2cm besarDepan" colspan="3"> yang bertanda tangan dibawah ini : </td>
 </tr>
 <tr>
 <td class="upeercase"> A. Calon Suami</td>
 </tr>
 </table>
 <table border="0" width="600px;" class="header" style="padding-left:20px;">
 '.$dataPria.'
 </table>

 <table style="padding-top:10px;">
 <tr>
 <td class="upeercase"> B. Calon Istri</td>
 </tr>
 </table>
 <table border="0" width="600px;" class="header" style="padding-left:20px; ">
 '.$dataPerempuan.'
 </table>
 <table>
 <tr>
 <td class="padding2cm besarDepan " colspan="3">Menyatakan dengan sesungguhnya bahwa atas dasar suka rela dengan kesadaran sendiri tanpa paksaan dari siapapun juga, setuju melangsungkan perkawaninan. <br> Demikian surat persetujuan ini dibuat untuk seperlunya. </td>
 </tr>

 </table>
 </table>
 <table border="0" width="600px;" class="header">
 <tbody>
 <tr>
 <td colspan="2" ></td>
 <td width="10px"></td>
 <td style="padding-top:20px; font-weight: bold;" width="200px;">Palembang, '.$date.'</td>
 </tr>

 <tr>
 <td style="padding-top:20px; " class="uppercase">calon suami</td>
 <td colspan="2"></td>
 <td style="padding-top:20px;"" width="200px"  class="uppercase">Calon Istri</td>
 </tr>
 
 <tr>
 <td style="padding-top:80px;" > .................</td>
 <td colspan="2"></td>
 <td  style="padding-top:80px;"width="200px">...................</td>
 </tr>
 </tbody>
 </table>
 </table>


 <footer> E-kelurahan Lebung Gajah Palembang</footer>
 ';
