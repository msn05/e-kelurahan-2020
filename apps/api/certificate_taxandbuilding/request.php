<?php
require __DIR__.'/../../config/api.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'certificate_taxandbuilding ';
$primaryKey = 'code_tax';

post();
// $results = null;

if(request('code_tax')){
  $results = $show_by_id($table, 'code_tax', request('code_tax'),$selected='');

}else{

}
if(!empty($results)){
  reponse_ok("Data Ditemukan.! ", $results);
  exit();
}
reponse_not_found("Data Tidak Ditemukan!");


