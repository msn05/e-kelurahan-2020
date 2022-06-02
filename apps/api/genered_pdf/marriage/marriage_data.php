<?php
$dataPria= '
  <tr>
  <td width="150px;">Nama</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->brides_name_men.' Bin '.$yangMenikah->bin_men.'</td>
  </tr>
    <tr>
  <td width="150px;">Jenis Kelamin</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.($OrangTua->type_children === 'Laki-laki' ? 'Laki-laki' :'Laki-laki').'</td>
  </tr>
  <tr>
  <td width="150px;">Tempat, Tanggal Lahir</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->place_of_birth_men.', '.$yangMenikah->date_of_birth_men.'</td>
  </tr>
  <tr>
  <td width="150px;">Agama</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->religion_men.'</td>
  </tr>
     <tr>
  <td width="150px;">Pekerjaan</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->profession_men.'</td>
  </tr>
   <tr>
  <td width="150px;">Status Perkawaninan</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->marital_status_men.'</td>
  </tr>
     <tr>
  <td width="150px;">Nomor KK / NIK</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.($yangMenikah->kk_number_men === NULL ? ' - ' : $yangMenikah->kk_number_men).' / '.$yangMenikah->nik_number_men.'</td>
  </tr>
  <tr>
  <td width="150px;">Alamat</td>
  <td width="5px;"> : </td>
  <td class="uppercase" width="200px;">'.$yangMenikah->address_men.'</td>
  </tr>
  ';
   $dataPerempuan= '
  <tr>
  <td width="150px;">Nama</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->brides_name_female.' Bin '.$yangMenikah->bin_female.'</td>
  </tr>
  <tr>
  <td width="150px;">Jenis Kelamin</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.($OrangTua->type_children === 'Perempuan' ? 'Perempuan' : 'Perempuan').'</td>
  </tr>
  <tr>
  <td width="150px;">Tempat, Tanggal Lahir</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->place_of_birth_female.', '.$yangMenikah->date_of_birth_female.'</td>
  </tr>
    <tr>
  <td width="150px;">Agama</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->religion_female.'</td>
  </tr>
  <tr>
  <td width="150px;">Pekerjaan</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->profession_female.'</td>
  </tr>
   <tr>
  <td width="150px;">Status Perkawaninan</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$yangMenikah->marital_status_men.'</td>
  </tr>
     <tr>
  <td width="150px;">Nomor KK / NIK</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.($yangMenikah->kk_number_female === NULL ? ' - ' : $yangMenikah->kk_number_female).' / '.$yangMenikah->nik_number_female.'</td>
  </tr>
  <tr>
  <td width="150px;">Alamat</td>
  <td width="5px;"> : </td>
  <td class="uppercase" width="200px;">'.$yangMenikah->address_female.'</td>
  </tr>
  ';
 

$dataAyah= '
  <tr>
  <td width="150px;">Nama </td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->father_name.'</td>
  </tr>
   <tr>
  <td width="150px;">NIK</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->number_nik_father.'</td>
  </tr>
  <tr>
  <td width="150px;">Tempat, Tanggal Lahir</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->place_of_birth_father.', '.$OrangTua->date_of_birth_father.'</td>
  </tr>
  <tr>
  <td width="150px;">Kewarganegaraan</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->national_father.'</td>
  </tr>
  <tr>
  <td width="150px;">Agama</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->religion_father.'</td>
  </tr>
  <tr>
  <td width="150px;">Pekerjaan</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->profession_father.'</td>
  </tr>
  <tr>
  <td width="150px;">Alamat</td>
  <td width="5px;"> : </td>
  <td class="uppercase" width="200px;">'.$OrangTua->address_father.'</td>
  </tr>
  ';
 $dataIbu= '
  <tr>
  <td width="150px;">Nama </td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->mother_name.'</td>
  </tr>
   <tr>
  <td width="150px;">NIK</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->number_nik_mother.'</td>
  </tr>
  <tr>
  <td width="150px;">Tempat, Tanggal Lahir</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->place_of_birth_mother.', '.$OrangTua->date_of_birth_mother.'</td>
  </tr>
  <tr>
  <td width="150px;">Kewarganegaraan</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->national_mother.'</td>
  </tr>
  <tr>
  <td width="150px;">Agama</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->religion_mother.'</td>
  </tr>
  <tr>
  <td width="150px;">Pekerjaan</td>
  <td width="5px;"> : </td>
  <td class="uppercase">'.$OrangTua->profession_mother.'</td>
  </tr>
  <tr>
  <td width="150px;">Alamat</td>
  <td width="5px;"> : </td>
  <td class="uppercase" width="200px;">'.$OrangTua->address_mother.'</td>
  </tr>
  ';
  
    

 
if($OrangTua->type_children === 'Laki-laki' ){
  $dataNya = $dataPria;
}

if($OrangTua->type_children === 'Perempuan'){
  $dataNya = $dataPerempuan;
}

if($OrangTua->type_children === 'Laki-laki'){
  $Calon = $dataPerempuan;
}

if($OrangTua->type_children === 'Perempuan'){
  $Calon = $dataPria;
}

