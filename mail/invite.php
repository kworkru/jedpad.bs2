<?php
    $result = ["message"=>"ok","code"=>200];
    echo json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
    exit;
    //require "phpmailer/PHPMailerAutoload.php";
    chdir("../");
    //echo file_exists('autoload.php')?"in dir root/":"in dir mail";exit;
    include("autoload.php");

    use cb\Pdf as Pdf;
    use cb\ClientBase as ClientBase;
    use core\Log as Log;
    header('Content-Type: application/json; charset=utf-8');
    //ob_start();

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

        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';

        $mail->Host = "smtp.yandex.ru";
        $mail->Port = 465;
        //$mail->SMTPSecure = 'tls';
        $mail->SMTPSecure = 'ssl';
        //$mail->SMTPAutoTLS = false;
        $mail->SMTPAuth = true;


        $mail->Username = "vin@jedpad.com";
        $mail->Password = "12345-6";



        $mail->setFrom($mail->Username, "CheckAuto");
        $mail->addAddress($data["email"]);

        $mail->isHTML(true);
        $mail->Subject = "Краткий отчет проверки по VIN ".$data["vin"];

        $mail->CharSet = "UTF-8";

        $mail->Body ='<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

        <!-- Web Font / @font-face : END -->

        <!-- CSS Reset -->
        <style type="text/css">


            html,
            body {
    	        margin: 0 auto !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
            }


            * {
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }


            div[style*="margin: 16px 0"] {
                margin:0 !important;
            }


            table,
            td {
                mso-table-lspace: 0pt !important;
                mso-table-rspace: 0pt !important;
            }


            table {
                border-spacing: 0 !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
                Margin: 0 auto !important;
            }
            table table table {
                table-layout: auto;
            }


            img {
                -ms-interpolation-mode:bicubic;
            }


            .mobile-link--footer a,
            a[x-apple-data-detectors] {
                color:inherit !important;
                text-decoration: underline !important;
            }

        </style>
        <center style="width: 100%; background: #fffffff;">

            <!-- Visually Hidden Preheader Text : BEGIN -->
            <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">

            </div>
            <!-- Visually Hidden Preheader Text : END -->


            <div style="width: 680px; margin: auto;">
                <!--[if (gte mso 9)|(IE)]>
                <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
                <tr>
                <td>
                <![endif]-->


                <!-- Email Body : BEGIN -->
                <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#eaeaea" width="100%" style="width: 680px;">

                    <!-- Head : BEGIN -->

                    <tr>
                        <td bgcolor="#000000" style=" padding-left:41px; padding-bottom:14px; padding-top:8px">
                         <table cellspacing="0" cellpadding="0" width="100%">
                           <tr>
                            <td width="120">
                            <img src="http://checkauto.cars-bazar.ru/img/mail/site_logo.png" alt="logo" width="90" height="48">
                            </td>
                            <td style="color: #ecd223;font-size: 18px;font-weight: 700; font-family: \'Roboto Condensed\', sans-serif;">
                                Провека истории автомобиля по VIN коду по 29 пунктам
                            </td>
                           </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Head : END -->


                    <!-- Image : BEGIN -->
                     <tr>
            <td background="http://checkauto.cars-bazar.ru/img/mail/fon2.png"  valign="top" style="background: url(http://checkauto.cars-bazar.ru/img/mail/fon2.png) no-repeat center;  background-position: center;">
              <!--[if gte mso 9]>
              <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:303px;">
                <v:fill type="tile" src="http://checkauto.cars-bazar.ru/img/mail/fon2.png"  />
                <v:textbox inset="0,0,0,0">
              <![endif]-->
              <div>
                <center>
                  <table cellspacing="0" cellpadding="0" width="680" height="213" class="w320">
                    <tr>
                      <td valign="middle" style="vertical-align:middle;  text-align:left;color:  #ffffff;font-size: 16px;font-style: italic;line-height: 18px;font-family: \'Roboto Condensed\', sans-serif; padding-left:30px;" class="mobile-center" height="213">
                        <span style="font-size: 24px;font-weight: 700;font-style:normal">ЗДРАВСТВУЙТЕ!</span><br><br>
                        Вы осуществили краткую проверку VIN номера: '.$data["vin"].' <br>
                        <b>Мы сформировали для вас отчет в формате PDF, он приложен к письму.</b><br><br>
                            По каким-то причинам Вы не стали заказывать полный отчет по данному вин коду. <br>
    <span style="color:#ebff00;">А зря!</span> Откровенные случаи мошенничества - это реалии отечественного авторынка.
                      </td>
                    </tr>
                  </table>
                </center>
              </div>
              <!--[if gte mso 9]>
                </v:textbox>
              </v:rect>
              <![endif]-->
            </td>
          </tr>
                    <!-- Image : END -->
                    <tr>
                        <td  align="center"  valign="top" width="100%" style="padding-top:15px; padding-bottom:10px; color:  #000000;font-size: 24px;font-weight: 700;text-align: center; font-family: \'Roboto Condensed\', sans-serif; ">
                         Заказав полный отчет,вы узнаете:
                        </td>
                    </tr>
                    <!-- 8 Block : BEGIN -->
                     <tr>
                        <td style="padding-top:10px; text-align:center; color:  #666666;font-size: 14px;font-weight: 700;line-height: 16px; font-family: \'Roboto Condensed\', sans-serif; padding-right:15px;padding-left:15px">
                        <table cellspacing="0" cellpadding="0" width="100%">
                            <tr>
                                <td valing="top"  style="text-align:center;">

                                        <img src="http://checkauto.cars-bazar.ru/img/mail/avariya.png" width="75" height="75" alt="icon" border="0" style="padding-bottom:5px;"><br>Историю участия<br>авто в  ДТП

                                </td>
                                <td valing="top"  style="text-align:center;">

                                        <img src="http://checkauto.cars-bazar.ru/img/mail/%D0%B8%D0%BA%D0%BE%D0%BD%D0%BA%D0%B02.png" width="75" height="75" alt="icon" border="0" style="padding-bottom:5px;"><br>Залог в банке, кредит<br>&nbsp;

                                </td>
                                <td valing="top" style="text-align:center;">

                                        <img src="http://checkauto.cars-bazar.ru/img/mail/%D0%B8%D0%BA%D0%BE%D0%BD%D0%BA%D0%B03.png" width="75" height="75" alt="icon" border="0" style="padding-bottom:5px;"><br>Реальный пробег<br>&nbsp;

                                </td>
                                <td valing="top" style="text-align:center;">

                                        <img src="http://checkauto.cars-bazar.ru/img/mail/%D0%B8%D0%BA%D0%BE%D0%BD%D0%BA%D0%B04.png" width="75" height="75" alt="icon" border="0" style="padding-bottom:5px;"><br>Рыночную стоимость<br> авто

                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top:30px; text-align:center">

                                         <img src="http://checkauto.cars-bazar.ru/img/mail/%D0%B8%D0%BA%D0%BE%D0%BD%D0%BA%D0%B05.png" width="75" height="75" alt="icon" border="0" style="padding-bottom:5px;"><br>Ограничения<br>на регистрационные<br>действия
                                </td>
                                <td style="padding-top:30px; text-align:center">

                                        <img src="http://checkauto.cars-bazar.ru/img/mail/%D0%B8%D0%BA%D0%BE%D0%BD%D0%BA%D0%B06.png" width="75" height="75" alt="icon" border="0" style="padding-bottom:5px;"><br>Проверка на угон<br>&nbsp;<br>&nbsp;
                                </td>
                                <td style="padding-top:30px; text-align:center">

                                         <img src="http://checkauto.cars-bazar.ru/img/mail/%D0%B8%D0%BA%D0%BE%D0%BD%D0%BA%D0%B07.png" width="75" height="75" alt="icon" border="0" style="padding-bottom:5px;"><br>Год выпуска и<br>комплектация ТС<br>&nbsp;
                                </td>
                                <td style="padding-top:30px; text-align:center">

                                        <img src="http://checkauto.cars-bazar.ru/img/mail/%D0%B8%D0%BA%D0%BE%D0%BD%D0%BA%D0%B08.png" width="75" height="75" alt="icon" border="0" style="padding-bottom:5px;"><br>Сведения о<br> покупке в лизинг<br>&nbsp;

                                </td>
                            </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- 8 Block : END -->
                    <tr>
                        <td   valign="top" width="100%" style="padding-top:15px; padding-bottom:10px;padding-left:30px; padding-right:30px;  color:  #555551;font-size: 18px;line-height: 18px; font-family: \'Roboto Condensed\', sans-serif; ">
                         <span style="color:#06b828;">Можно ли с этим бороться, защитить свои деньги и сберечь нервы?</span><br>
    Да, если проверить машину перед покупкой. Ваш полный отчет по VIN номеру уже готов и включает
    достоверные данные. Этот документ – ваша надежная страховка.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td width="30"></td>
                                    <td valing="top" width="320" bgcolor="#ffffff" style="color:  #000000;font-size: 24px;font-weight: 700; font-family: \'Roboto Condensed\', sans-serif; padding-top:30px; padding-left:30px;">
                                        <span style="color:  #666666;font-weight: 700;">ПРОМОКОД</span> на скидку в 50 руб:<br><br>
                                        <span style="display:inline-block; border-radius: 2px;border-width: 2px;border-color:  #d0b606;border-style: solid;width: 146px;height: 36px; text-align:center; color:  #000000;font-size: 16px;font-weight: 700; line-height:36px;">'.array_shift($promo).'</span><br><br>&nbsp;
                                    </td>
                                    <td valing="top" bgcolor="#ffffff" style="padding-bottom:10px; padding-top:20px;">
                                        <img src="http://checkauto.cars-bazar.ru/img/mail/car.png" alt="" width="271" height="139">
                                    </td>
                                    <td width="30"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Button : BEGIN -->
                           <tr>
                          <td style="width:261px; height:37px; text-align:center; padding-top:20px; padding-bottom:40px;" >
                            <div>
                              <a href="http://checkauto.cars-bazar.ru/reports.php?vin='.$data["vin"].'&email='.$data["email"].'" target="_blank" style="border-radius: 2px;background-color:  #ecd223;min-width: 313px;height: 44px;display:inline-block;font-family: \'Roboto Condensed\', sans-serif;color:  #010000;font-size: 14px;font-weight: 700;line-height:44px;text-align:center;text-decoration:none;-webkit-text-size-adjust:none; padding-left:3px; padding-right:3px;">Заказать полный отчет по '.$data["vin"].'.</a>
                              </div>
                          </td>

                        </tr>
                        <!-- Button : END -->


                </table>
                <!-- Email Body : END -->



                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
            </div>
        </center>';

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
    //ob_end_clean();
    echo json_encode($result,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
?>
