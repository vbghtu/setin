<?php

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, false);

    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}


$file = file_get_contents_curl('https://perelink.pro/service/otvet.php?proj=seitn.ru&url=https://seitn.ru&code=OEHZZYYNUECTFUPLGFRDBAMSHPNGFUBU');

var_dump($file);

?>