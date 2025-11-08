<?php 

$Website = urlencode(utf8_encode($web));
$Subject = urlencode(utf8_encode($mail->Subject));
$body    = urlencode(utf8_encode($mail->Body));

// Spammers
if (isset($phone) and !is_null($phone) and  substr_count(str_replace(' ', '', $phone), '902044273') > 0) exit;

// Les URL llargues real no pot fer la redirecció de http a https
$HTTP =(substr_count($copyServer, '.lprotiendas.net')) ? "http" : "https"; 

$arrContextOptions=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false,),);  

$url = "$HTTP://$copyServer/contacts/ContactInsert.php?Website=$Website&Subject=$Subject&Mail=$body";

file_get_contents($url,false, stream_context_create($arrContextOptions));

?>