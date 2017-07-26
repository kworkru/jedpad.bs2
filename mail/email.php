<?php
    //require "phpmailer/PHPMailerAutoload.php";
    $result = ["message"=>"ok","code"=>200];
    echo json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    exit;
    chdir("../");
    //echo file_exists('autoload.php')?"in dir root/":"in dir mail";exit;
    include("autoload.php");

    use cb\Pdf as Pdf;
    use cb\ClientBase as ClientBase;
    use core\Log as Log;
    //header('Content-Type: application/json; charset=utf-8');
    ob_start();


    $rq = $_REQUEST;

    $promo = json_decode(file_get_contents('mail/promo.json'),true);
    $promoCode = false;
    if(count($promo)){
        foreach($promo as $k=>$v){
            $promoCode=$v;
            unset($promo[$k]);
            break;
        }
        file_put_contents('mail/promo.json',json_encode($promo,JSON_PRETTY_PRINT));
    }
    $cb = new ClientBase;
    $result = ["message"=>"Unknown","code"=>500];
    $current = $cb->get($rq);
    $found = false;
    $data = $rq;
    $reportPdf="";
    $code = 200;
    if(count($current)){
        foreach($current as $row){
            $data = array_merge($row["line"],$data);
            //print_r($data);exit;
            $found = true;
            break;
        }
    }
    if($found){
        $report = json_decode(preg_replace_callback('/"issue":\s*"(.+)"/ium',function($m){return '"issue": "'.preg_replace('/"/m',"'",$m[1]).'"';},$data["report"]),true);
    //if(!empty($rq["vin"])&&!empty($rq["email"])){
        $mail = new PHPMailer;

        $mail->isSMTP();
        Log::debug("sending mailto: ".$data["email"]);
        $mail->Host = "smtp.yandex.ru";
        $mail->SMTPAuth = true;
        $mail->Username = "checkauto.cars-bazar@yandex.ru";
        $mail->Password = "12345-6";
        $mail->Port = 25;

        $mail->setFrom("checkauto.cars-bazar@yandex.ru", "CheckAuto");
        $mail->addAddress($data["email"]);

        $mail->isHTML(true);
        $mail->Subject = "Полный отчет проверки по VIN ".$report["history"]["vin"];

        $mail->CharSet = "UTF-8";

        $mail->Body ='<h3>Здравствуйте.</h3>';
        $mail->Body.='<p><b>Благодарим вас за то что воспользовались нашим сервисом проверки vin номера "ChechAuto Cars-Bazar".</b></p>';
        $mail->Body.='<p>PDF отчет готов, и находится во вложении к письму.</p>';
        if($promoCode!==false){
            $mail->Body.='<p>В качестве бонуса дарим вам промокод на скидку в 100 рублей на следующую проверку!</p>';
            //$mail->Body.='<p><span style="font-size:24px;font-weight:bold;">'.$promo[0].'</span></p>';unset($promo[0]);
            $mail->Body.='<p><span style="font-size:24px;font-weight:bold;padding:0 1em;color:#444;height:3em;line-height:3em;background-color:#1485cc">'.$promoCode.'</span></p>';
        }


        //Тут картинка с промокодом.
        $mail->Body.='<hr />';
        $mail->Body.='<h4>С уважением команда сервиса "ChechAuto Cars-Bazar".</h4>';

        // PDF attachment
        $pdf = new Pdf;
        $reportPdf = $pdf->Report($report);
        $current = $cb->update(["ID"=>$rq["cb_order_id"],"pdf"=>"http://checkauto.cars-bazar.ru/pdf.php?cb_order_id=".$rq["cb_order_id"]]);

        $dataFile = 'store/'.$report["history"]["vin"].".pdf";
        file_put_contents($dataFile,$reportPdf);
        $mail->addAttachment($dataFile, $report["history"]["vin"].".pdf");

        $result["code"] = $mail->send()?200:503;
        $result["message"] = ($result["code"]!=200)?"Сообщение не отравлено! Свяжитесь с администрацией сайта.":"OK";

    }else {
        $result["message"] = "not found";
    }
    ob_end_clean();
    echo json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
?>
