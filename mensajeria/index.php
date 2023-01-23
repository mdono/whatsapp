<?php
//token de fb
$token="TOKEN";
//telefono
$telefono="PHONE_NUMBER";
//url a donde se enviará el mensaje
$url="https://graph.facebook.com/v15.0/116542267997823/messages";
//configuración del mensaje
$mensaje=''
        . '{'
            . '"messaging_product":"whatsapp", '
            . '"to":"'.$telefono.'", '
            . '"type":"template", '
            . '"template": '
            . '{'
            . '     "name":"hello_world", '
            . '     "language":{ "code":"en_US" }, '
            . '}'
        . '}'
    ;
//declaramos las cabeceras
$header=array("Authorization: Bearer " . $token, "Content-Type:application/json",);
//iniciamos la curl
$curl=curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//obtenemos la respuesta del envío de la información
$response=json_decode(curl_exec($curl), true);
//imprimimos la respuesta
print_r($response);
//obtenemos el código de la respuesta
$status_code=curl_getinfo($curl, CURLINFO_HTTP_CODE);
//cerramos la curl
curl_close($curl);
?>