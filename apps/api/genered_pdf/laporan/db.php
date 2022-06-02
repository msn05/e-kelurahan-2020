<?php 
$data ='';
if($kode_pelayanan == 'SPK-0009'){
	$dataTabel = $db->table('entrance_services')->where('service_categori_id', $kode_pelayanan)->between('created_at', $mulai, $akhir)->getAll();
	$data.= '
	<tr>
	<th width="5px;">NO</th>
	<th>Nama Pemohon</th>
	<th>Nama Yang Menikah</th>
	<th>Nomor NIK Mempelai</th>
	<th>Orang Tua Pemohon</th>
	<th>Alamat Pemohon</th>
	<th>Tanggal Dibuat Surat</th>
	<th>Saksi </th>
	<th>Status Pencetakan Berkas </th>
	</tr>
	';
	$i = 1;
	foreach ($dataTabel as $value) { 
		$check_data = $show_by_id('license_marriage','entrance_service_id', $value->code_entrance_services,$selected);
		$yangMenikah = $show_by_id('marriage_data','license_marriage_id',$check_data->id_license_marriage,$selected);
		$OrangTua = $show_by_id('parent_data','marriage_data_id',$yangMenikah->id_marriage_data,$selected);
		$data.= '
		<tr>
		<td>'.$i++.'</td>

		';
		if(!empty($check_data->id_license_marriage)){
			$data.='
			<td class="besarDepan">'.$check_data->marriage_guardian_name.'</td>
			<td class="besarDepan">'.$yangMenikah->brides_name_men.' Dengan  '.$yangMenikah->brides_name_female.'</td>
			<td >'.$yangMenikah->nik_number_men.' /  '.$yangMenikah->nik_number_female.'</td>
			<td class="besarDepan"> Bapak'.$OrangTua->father_name.' /  Ibu '.$OrangTua->mother_name.'</td>
			<td class="besarDepan">'.$check_data->address.' RT '.$check_data->rt_number.' RW '.$check_data->rw_number.'</td>
			<td class="besarDepan">'.$check_data->saksi_one.' / '.$check_data->saksi_two.'</td>
			<td class="besarDepan">'.($check_data->status_genered == 1 ? 'Sudah Tercetak' : 'Proses').' </td>
			<td class="besarDepan">'.$check_data->created_at.' </td>
			';
		}else{
			$data.='<td class="uppercase">Tidak Diketahui</td>';
		}
		$data.='
		</tr>
		';
	}

	return $data;

}
if($kode_pelayanan == 'SPK-0012'){
	$dataTabel = $db->table('entrance_services')->where('service_categori_id', $kode_pelayanan)->between('created_at', $mulai, $akhir)->getAll();
	$data.= '
	<tr>
	<th width="5px;">NO</th>
	<th>Kode Surat</th>
	<th>Tanggal Dibuat Surat</th>
	<th>Nama Staf Pembuat</th>
	<th>Posisi Staf</th>
	<th>Nama Subjek Pajak</th>
	<th>Alamat</th>
	<th>Lokasi</th>
	<th>Nomor Kode Pajak</th>
	<th>Keperluan</th>
	<th>Status Pencetakan Berkas </th>
	</tr>
	';
	$i = 1;
	foreach ($dataTabel as $value) { 
		$check_data = $show_by_id('certificate_taxandbuilding','entrance_service_id', $value->code_entrance_services,$selected);
		$data.= '
		<tr>
		<td>'.$i++.'</td>

		';
		if(!empty($check_data->code_tax)){
			$data.='
			<td class="besarDepan">'.$check_data->office_name.'</td>
			<td class="besarDepan">'.$check_data->position.'</td>
			<td >'.$check_data->created_at.' </td>
			<td class="besarDepan"> Bapak / Ibu '.$check_data->subject_tax_name.' </td>
			<td class="besarDepan">'.$check_data->address_tax_object.'</td>
			<td class="besarDepan">'.$check_data->location.'</td>
			<td class="besarDepan">'.$check_data->number_object.'</td>
			<td class="besarDepan">'.$check_data->necessity.'</td>
			<td class="besarDepan">'.($check_data->status_genered == 1 ? 'Sudah Tercetak' : 'Proses').' </td>
			<td class="besarDepan">'.$check_data->created_at.' </td>
			';
		}else{
			$data.='<td class="uppercase">Tidak Diketahui</td>';
		}
		$data.='
		</tr>
		';
	}

	return $data;
}
if($kode_pelayanan == ''){
	$surat = ["SPK-0009","SPK-0012"];
	$dataTabel = $db->table('entrance_services')->notIn('service_categori_id',$surat)->between('created_at', $mulai, $akhir)->getAll();
		$data.= '
		<tr>
		<th width="5px;">NO</th>
		<th>Kode Surat</th>
		<th>Jenis Surat</th>
		<th>Nama Staf Pembuat</th>
		<th>Posisi Staf</th>
		<th>Nama Tercatum</th>
		<th>Tempat, Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Kewarganegaan</th>
		<th>Tanggal Dibuat</th>
		<th>Status Pencetakan</th>
		</tr>
		';
		$i = 1;
		foreach ($dataTabel as $value) { 
		$check_data = $show_by_id('service_categories','id_service_categori', $value->service_categori_id,$selected);
		$SuratNya = $show_by_id('statement_letter','entrance_service_id', $value->code_entrance_services,$selected);
			$data.= '
			<tr>
			<td>'.$i++.'</td>
			<td class="besarDepan">'.$value->service_categori_id.'</td>
			<td class="besarDepan">'.$check_data->name.'</td>
			<td class="besarDepan">'.$SuratNya->office_name.'</td>
			<td class="besarDepan">'.$SuratNya->position.'</td>
			<td class="besarDepan">'.$SuratNya->name.'</td>
			<td class="besarDepan">'.$SuratNya->place_of_birth.' , '.$SuratNya->date_of_birth.'</td>
			<td class="besarDepan">'.$SuratNya->gender.'</td>
			<td class="besarDepan">'.$SuratNya->national.'</td>
			<td class="besarDepan">'.$SuratNya->created_at.'</td>
			// <td class="besarDepan">'.($SuratNya->status_genered == 1 ? 'Sudah Tercetak' : 'Proses').'</td>
			</tr>
			';
		}

		return $data;
	}
