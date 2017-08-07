<?php
// <input name="topic" value="Заказ пакета" type="hidden">
// <input name="packet" value="Заказ пакета" type="hidden">
// <input name="name" class="text-input" placeholder="Имя" type="text" required>
// <input name="phone" class="text-input" placeholder="Телефон" type="text" required>
// <input name="email" class="text-input" placeholder="E-Mail" type="text" required>
chdir("../");
include("autoload.php");
$rq = $_REQUEST;
$mailTo = "komarovb777@gmail.com";

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';

$mail->Host = "smtp.yandex.ru";
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;

$mail->Username = "vin@jedpad.com";
$mail->Password = "12345-6";
$mail->setFrom($mail->Username, "CheckAuto");

$mail->addAddress($mailTo);

$mail->isHTML(true);
$mail->CharSet = "UTF-8";
$mail->Subject = "Запрос пакета от ".$rq["email"];

$mail->Body ='<h3>Запрос пакета услуг.</h3>';
$mail->Body ='<h4>'.$rq["packet"].'</h4>';
$mail->Body.='<p>От: <b>'.$rq["name"].'</b></p>';
$mail->Body.='<p>Телефон: <b>'.$rq["phone"].'</b></p>';
$mail->Body.='<p>Email: <b><a href="mailto:'.$rq["email"].'">'.$rq["email"].'</a></b></p>';
$mail->send();
header("Location: /");
?>
