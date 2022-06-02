<?php

$uniqueCode = function ($table, $prefix_params, $prefix_code = null) use (&$db) {
	$prefixList = (object) [
		'citizen_data'       		=> 'UEW-',
		'employee_data'      		=> 'UEM-',
		'service_categories' 		=> 'SPK-',
		'entrance_services'  		=> 'RLG-',
		'statement_letter'	 		=> 'SKM-',
		'statement_letter_bk'	 		=> 'SKM-',
		'certificate_taxandbuilding'=> 'STP-',
		'license_marriage'			=> 'SIN-',
		'message_entrance_service'  => 'PLM-',
	];

	if (is_null($prefix_code)) {
		$prefix_code = property_exists($prefixList, $table) ? $prefixList->$table : null;
		// If Still Null
		if (is_null($prefix_code)) {
			return null;
		}
	}

	$last_prefix = $db->table($table)->max($prefix_params,'name')->get();
	$last_number = ((int)substr($last_prefix->name,4,4)) + 1;

	return $prefix_code . sprintf("%04s", $last_number);
};