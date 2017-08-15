<?php
chdir("../");
include("autoload.php");
$sp = new cb\SendPulse;
$sp->send([
    "vin" => "WF0RХХGСDR8R45807",
    "email" => "yanusdnd@inbox.ru",
    "type" => "small"
]);
?>
