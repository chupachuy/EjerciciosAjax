<?php

if(isset($_POST)){

    //echo $_SERVER["HTTP_HOST"];
    error_reporting(0);

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $comments = $_POST["comments"];
    $domain = $_SERVER["HTTP_HOST"];

    $to = "chupachuy@hotmail.com";

    $subject = "Contacto desde el Formulario del sitio ". $domain .": ". $subject . ";"

    $message = "<p>datos enviados desde el formulario del sitio <strong>". $domain. 
    "</strong>
    <ul>
     <li>Nombre: ". $name ."</li>
     <li>Email: ". $email ."</li>
     <li>Asunto: ". $subject ."</li>
     <li>Comentarios: ". $comments ."</li>
     
    </ul>
    ";

    $headers = "MIME-Version:1.0\r\n" ."Content-type: text/html; charset=utf-8\r\n"."From: Envio Automatico.No responder <no-reply@".$domain.">";

    $send_mail = mail($to, $subject, $message, $headers);

    if($send_mail){
        $res = [
            "err" => false,
            "message" => "Tus datos han sido enviados";
        ]
    } else {
        res = [
            "err" => true,
            "message" => "Error al enviar tus datos: intenta nuevamente";
        ]
    }

    //header("Access-Control-Allow-Origin: *")
    header("Access-Control-Allow-Origin: https://jesuslopez.com")

    header('Content-type: application/json');

    echo json.encode($res);
    exit();


}

?>