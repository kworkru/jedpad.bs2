<?php
    //require "phpmailer/PHPMailerAutoload.php";
    chdir("../");
    //echo file_exists('autoload.php')?"in dir root/":"in dir mail";exit;
    include("autoload.php");

    use cb\Pdf as Pdf;
    use cb\ClientBase as ClientBase;
    use core\Log as Log;
    //header('Content-Type: application/json; charset=utf-8');
    ob_start();

    $rq = $_REQUEST;
    $data = [
        "vin" => isset($rq["vin"])?$rq["vin"]:false,
        "email" => isset($rq["email"])?$rq["email"]:false
    ];
    $promo = json_decode(file_get_contents('mail/promo.invite.json'),true);
    $result = ["message"=>"noemail","code"=>500];
    $cb = new ClientBase;
    $current = $cb->get(["ID"=>$rq["cb_order_id"],"vin"=>$rq["vin"]]);
    $found = false;
    $reportPdf="";
    $code = 200;
    if(count($current)){
        foreach($current as $row){
            $report = json_decode($row["line"]["report"],true);
            $data["email"] = $row["line"]["email"];
            $found = true;
            break;
        }
    }
    if($found){
        Log::debug($report);
        $code = 200;
        $mail = new PHPMailer;

        $mail->isSMTP();

        $mail->Host = "smtp.yandex.ru";
        $mail->SMTPAuth = true;
        $mail->Username = "checkauto.cars-bazar@yandex.ru";
        $mail->Password = "12345-6";
        $mail->Port = 25;

        $mail->setFrom("checkauto.cars-bazar@yandex.ru", "CheckAuto");
        $mail->addAddress($data["email"]);

        $mail->isHTML(true);
        $mail->Subject = "Краткий отчет проверки по VIN ".$data["vin"];

        $mail->CharSet = "UTF-8";

        $mail->Body ='<h3>Здравствуйте!</h3>';
        $mail->Body.='<p>Вы осуществили краткую проверку VIN номера: <b>'.$data["vin"].'</b>.</p>';
        $mail->Body.='<p>Мы сформировали для вас отчет в формате PDF, он приложен к письму.</p>';
        $mail->Body.='<p>По каким-то причинам Вы не стали заказывать полный отчет по данному вин коду. А зря! Откровенные случаи мошенничества - это реалии отечественного авторынка.</p>';
        $mail->Body.='<p>Можно ли с этим бороться, защитить свои деньги и сберечь нервы? Да, если проверить машину перед покупкой. Ваш полный отчет по VIN номеру уже готов и включает достоверные данные. Этот документ – ваша надежная страховка.</p>';
        $mail->Body.='<p>  Заказав полный отчет, вы узнаете:</p>';
        $mail->Body.='<ul>';
        $mail->Body.='<li>Историю участия авто в ДТП</li>';
        $mail->Body.='<li>Информацию о юридической чистоте автомобиля – залогах, кредитах, ограничениях на регистрационные действия</li>';
        $mail->Body.='<li>Год выпуска и комплектация ТС</li>';
        $mail->Body.='<li>Рыночную стоимость авто</li>';
        $mail->Body.='<li><b>А еще получите проверку на угон и еще 23 пункта ценной информации! </b></li>';
        $mail->Body.='</ul>';
        $mail->Body.='<p>Обратившись к нам, вы избежите таких уловок, как скручивание пробега и продажа по завышенной цене якобы «из первых рук». В нашей практике были случаи, когда клиенты узнавали, что ТС использовалось в качестве такси или было в серьезной аварии. Выгода, от которой сложно отказаться. Так как вы уже начали проверку, предлагаем сразу перейти к полной проверке машины по VIN коду со скидкой. Для этого мы предоставляем ваш <b>персональный промокод со скидкой 50 рублей!</b> Просто введите его перед оплатой отчета в соответствующее поле.</p>';
        $mail->Body.='<p>  ПРОМОКОД:</p>';
        $mail->Body.='<p><span style="font-size:24px;font-weight:bold;padding:0 1em;color:#444;height:3em;line-height:3em;background-color:#1485cc">'.array_shift($promo).'</span></p>';;
        $mail->Body.='<p><a href="http://checkauto.cars-bazar.ru/report.html?vin='.$data["vin"].'&email='.$data["email"].'" style="color:#000;display:inline-block;font-size:18px;text-decoration:none;font-weight:bold;padding:0 1em;height:2em;line-height:2em;background-color:#ecd223">Заказать полный отчет по VIN <b>'.$data["vin"].'</b></a></p>';

        //Тут картинка с промокодом.
        $mail->Body.='<hr />';
        $mail->Body.='<h4>С уважением команда сервиса "ChechAuto Cars-Bazar".</h4>';

        // PDF attachment
        $pdf = new Pdf;
        $reportPdf = $pdf->FastReport($report);

        $dataFile = 'store/fast_'.$data["vin"].".pdf";
        file_put_contents($dataFile,$reportPdf);
        $mail->addAttachment($dataFile, $data["vin"].".pdf");

        $result["code"] = $mail->send()?200:503;
        $result["message"] = ($result["code"]!=200)?"Сообщение не отравлено! Свяжитесь с администрацией сайта.":"OK";
        file_put_contents('mail/promo.invite.json',json_encode($promo,JSON_PRETTY_PRINT));
    }
    ob_end_clean();
    echo json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
?>
