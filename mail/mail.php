<?
    require "phpmailer/PHPMailerAutoload.php";

    $mail = new PHPMailer;

    $mail->isSMTP();

    $mail->Host = "smtp.yandex.ru";
    $mail->SMTPAuth = true;
    $mail->Username = "checkauto.cars-bazar@yandex.ru";
    $mail->Password = "12345-6";
    $mail->Port = 25;

    $mail->setFrom("checkauto.cars-bazar@yandex.ru", "CheckAuto");
    $mail->addAddress("info@checkauto.cars-bazar.ru");

    $mail->isHTML(true);

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $mail->Subject = "Письмо с сайта CheckAuto";

    $mail->CharSet = "UTF-8";

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($message)) {
        $mail->Body = "<b>Имя:</b> $name<br><b>E-Mail:</b> $email<br><b>Телефон:</b> $phone<br><b>Сообщение:</b> $message";
    }
    else {
        return false;
    }

    if ($mail->send()) {
        echo "Сообщение отправлено!";
    }
    else {
        echo "Сообщение не отравлено! Свяжитесь с администрацией сайта.";
    }
?>
