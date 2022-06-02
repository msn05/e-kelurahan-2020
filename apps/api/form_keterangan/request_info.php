<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'statement_letter ';
$primaryKey = 'code_print';
$selected='';
post();
// $results = null;

if(request('code_print')){
  $results = $show_by_id($table, 'code_print', request('code_print'),$selected);

}else{

}
if(!empty($results)){
  reponse_ok("Data Ditemukan.! ", $results);
  exit();
}
reponse_not_found("Data Tidak Ditemukan!");


