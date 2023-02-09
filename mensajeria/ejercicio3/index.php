<?php
/**
 * VERIFICACION DEL WEBHOOK
 */
//TOKEN, QUE ES UN VALOR QUE NOSOTROS BRINDAMOS A FB PARA LA VALIDACION
$token='Guatemala';
//RECIBIMOS EL CHALLENGE DE FB
$desafio=$_GET['hub_challenge'];
//TOKEN DE VERIFICACION DE FB
$token_verificacion=$_GET['hub_verify_token'];

//validación del token
if($token===$token_verificacion) {
    echo $desafio;
    exit;
}

/**
 * OBTENIENDO LOS MENSAJES DESDE WHATSAPP
 */
//LEER LOS MENSAJES RECIBIDOS
$respuesta=file_get_contents("php://input");
//CONVERTIR EL JSON EN UN ARREGLO
$respuesta=json_decode($respuesta, true);

$mensaje=$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['text']['body'];
$telefono_cliente=$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['from'];
$id=$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['id'];
$timestamp=$respuesta['entry'][0]['changes'][0]['value']['messages'][0]['timestamp'];

//VALIDACION SI HAY ALGUN ERROR
if($mensaje!=null) {
    //ESCRIBIR LA RESPUESTA
    file_put_contents("data.txt", $mensaje);
}