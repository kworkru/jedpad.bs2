<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Проверка истории автомобиля по VIN коду">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/form.css">
	<title>VIN JedPad - проверка автомобиля по ВИН коду</title>
  </head>
  <body>
	<form action="reports.php" target="_blank">
      <img src="img/car_small.png" width="180" height="180" id="form-image"/>
	  <span id="VIN_form_header">Проверить автомобиль по VIN коду</span>
	  <img src="img/ugon_icon.png" width="25" height="25" id="VIN_form_icon_1"/>
	  <span class="icon_text" id="VIN_form_icon_text_1">угон</span>
	  <img src="img/dtp_icon.png" width="35" height="25" id="VIN_form_icon_2"/>
	  <span class="icon_text" id="VIN_form_icon_text_2">дтп</span>
	  <img src="img/zalog_icon.png" width="25" height="25" id="VIN_form_icon_3"/>
	  <span class="icon_text" id="VIN_form_icon_text_3">залог</span>
	  <img src="img/probeg_icon.png" width="23" height="18" id="VIN_form_icon_4"/>
	  <span class="icon_text" id="VIN_form_icon_text_4">пробег</span>
	  <span class="icon_text" id="VIN_form_icon_text_5">и еще 25 пунктов</span>
	  <input name="vin" class="text-input" id="Vin_input" placeholder="X7MDC14BM90004876" type="text" minlength="17" maxlength="17" pattern="[0-9A-Z]{17}" required><br />
	  <input name="email" class="text-input" id="Email_input" placeholder="Введите email" type="email" required>
	  <input class="button search" value="Проверить" id="check_VIN_btn" type="submit">
	</form>
  </body>
</html>