<?php
session_start();
 $url = 'https://www.google.com/recaptcha/api/siteverify';
 $data = array(
     'secret' => '6LdUXtQUAAAAAHZ1xKcS2c6WHHuMxsyABkrOjwuv',
     'response' => $_POST["g-recaptcha-response"]
 );
 $options = array(
     'http' => array (
         'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
         "Content-Length: ".strlen(http_build_query($data))."\r\n".
         "User-Agent:MyAgent/1.0\r\n",
         'method' => 'POST',
         'content' => http_build_query($data)
     )
 );
 $context  = stream_context_create($options);
 $verify = file_get_contents($url, false, $context);
 $captcha_success = json_decode($verify);
 if($captcha_success->success != false) {

    $toAdmin = "office@cdigrup.ro";
    
    $subjectAdmin = "Ati primit o solicitare de informatii de pe siteul www.cdigrup.ro";

    $headersAdmin = "MIME-Version: 1.0" . "\r\n";
    $headersAdmin .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headersAdmin .= 'From: Cdi Grup<office@cdigrup.ro>' . "\r\n";

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $qnt = $_POST['qnt'] . ' kg';
    $message = $_POST['message'];

    $txtAdmin = "Nume: $name \r\nTelefon: $phone \r\nEmail: $email \r\nCantitate: $qnt \r\nMesaj: $message";

    mail($toAdmin,$subjectAdmin,$txtAdmin,$headersAdmin);
    header('Location: contact');

    $_SESSION['succes'] = "Mesajul a fost trimis cu succes. Multumim.";
 }else {
    echo 'Va rugam sa incercati din nou';
 }
    

?>