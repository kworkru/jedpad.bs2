<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/fancybox/jquery.fancybox.css">
		<link rel="stylesheet" href="css/fancybox/jquery.fancybox.theme.css">
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.css">
		<title>Получи полный отчет по VIN коду со скидкой в 100 рублей!</title>
	</head>
	<body>
	<header class="header">
			<div class="container">
				<a class="site-logo" href="/">
					<img src="img/site_logo.png" alt="">
				</a>
				<nav class="site-nav pull-right">
					<div class="site-nav-toggle" data-toggle="collapse" data-target="#site-nav" aria-expanded="false">
						<span class="icon icon-hamburger"></span>
					</div>
					<ul id="site-nav" class="site-nav-menu collapse">
						<li class="site-nav-menu-item">
							<a href="#">О проекте</a>
						</li>
						<li class="site-nav-menu-item">
							<a href="#">Как купить отчет</a>
						</li>
						<li class="site-nav-menu-item">
							<a href="#">Клиентам</a>
						</li>
						<li class="site-nav-menu-item">
							<a href="#">Партнерам</a>
						</li>
					</ul>
				</nav>
			</div>
	</header>
	<!--section class="questions">
			<div class="container">
				<div class="section-content">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="question">
								<div class="question-icon">
									<span class="icon icon-zoom-lg"></span>
								</div>
								<span class="question-text">Вы уверены, что авто не числится в угоне?</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="question">
								<div class="question-icon">
									<span class="icon icon-crash"></span>
								</div>
								<span class="question-text">А сколько раз он попадал в ДТП?</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="question">
								<div class="question-icon">
									<span class="icon icon-speedo-lg"></span>
								</div>
								<span class="question-text">Знаете реальный пробег?</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="question">
								<div class="question-icon">
									<span class="icon icon-taxi-car"></span>
								</div>
								<span class="question-text">Уверены, что авто не использовался в такси?</span>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section-->
	<section class="payment">
			<div class="container" id="buyForm">
				<div class="section-content">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<div class="payment-form">
								<div class="section-form">
									<h4 class="form-headline">Вся правда об автомобиле по цене бизнес ланча!</h4>
									<div class="report-price" data-base="219">
										<span class="old-price">450 &#8381;</span>
										<span class="new-price">219 &#8381;</span>
										<span class="pay-price hidden">219</span>
									</div>
									<p style="text-align:center;margin-bottom:50px;">Ваша скидка - 100 руб!</p>
									<form action="https://money.yandex.ru/eshop.xml" method="POST">
											<input type="hidden" name="shopId" value="113311" />
											<input type="hidden" name="scid" value="97661" />
											<input type="hidden" name="sum" value="219" />
											<input type="hidden" name="customerNumber" value="" />
											<input type="hidden" name="cps_email" value="" />
											<input type="hidden" name="cps_phone" value="" />
											<input type="hidden" name="cb_order_id" value="" />
											<input type="hidden" name="vin" value="" />
											<input type="hidden" name="cb_response_url" value="http://<?php echo $_SERVER["HTTP_HOST"];?>" />
										    <!-- <input type="hidden" name="shopSuccessURL" value="http://checkauto.cars-bazar.ru/" /> -->
										    <input type="hidden" name="shopSuccessURL" value="http://vin.jedpad.com/" />
										    <input type="hidden" name="shopFailURL" value="http://cars-bazar.ru" />
										<p style="text-align:center;margin-bottom:10px;">VIN КОД АВТОМОБИЛЯ:</p>
										<?php
										if($_REQUEST['vin']){
											echo '<input class="text-input" type="text" name="vin" value="' . $_REQUEST['vin'] . '">';
										}else{
											echo '<input class="text-input" type="text" name="vin">';
										}
										?>
										<p style="text-align:center;margin-bottom:10px;">E-MAIL ДЛЯ ОТЧЕТА:</p>
										<?php
										if($_REQUEST['email']){
											echo '<input class="text-input" type="text" name="email" value="' . $_REQUEST['email'] . '">';
										}else{
											echo '<input class="text-input" type="text" name="email">';
										}
										?>
										<p style="text-align:center;margin-bottom:10px;">ПРОМО-КОД</p>
										<?php
										if($_REQUEST['promocode']){
											echo '<input class="text-input" type="text" name="promo" value="' . $_REQUEST['promocode'] . '">';
										}else{
											echo '<input class="text-input" type="text" name="promo">';
										}
										?>
										<input class="button rounded promoButton" value="Применить промо-код" type="button" hidden>
										<div class="input-group">
											<input id="conditions" type="checkbox" required checked>
											<label for="conditions">Я согласен с <a href="http://vin.jedpad.com/conditions.html">условиями сервиса*</a>
											</label>
										</div>
										<input id="oplata-perehod" class="button rounded" value="Перейти к оплате" type="submit">
									</form>
								</div>
							</div>
						</div>
					</div>
					<ul class="check-categories">
						<li class="check-category">
							<span class="icon icon-fssp"></span>
						</li>
						<li class="check-category">
							<span class="icon icon-gibdd"></span>
						</li>
						<li class="check-category">
							<span class="icon icon-rosstat"></span>
						</li>
						<li class="check-category">
							<span class="icon icon-nbki"></span>
						</li>
						<li class="check-category">
							<span class="icon icon-vas-rf"></span>
						</li>
						<li class="check-category">
							<span class="icon icon-fst"></span>
						</li>
					</ul>
				</div>
			</div>
			<br><br><p><a href="report_example.html" target="_blank" style="text-align:center;color:black;text-decoration:underline;text-decoration-style:dashed;font-weight:bold;">Посмотреть пример полного отчета</a></p>
	</section>
	<!--section class="form">
		<div class="container">
			<div class="section-content">
				<div class="row check-form">
					<form class="clearfix" action="">
						<div class="col-lg-3 col-lg-offset-2 col-md-4 col-sm-6">
							<input class="text-input" placeholder="VIN автомобиля" type="text" required>
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<input class="text-input" placeholder="e-mail для отчета" type="text" required>
						</div>
						<div class="col-lg-2 col-md-4 col-sm-12">
							<input class="button" value="Проверить авто" type="submit">
						</div>
					</form>
					<div class="col-lg-3 col-lg-offset-7 col-md-12 full-report-link">
						<a href="report_example.html">Посмотреть пример полного отчета</a>
					</div>
				</div>
			</div>
		</div>
	</section-->
	<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4">
						<a class="site-logo" href="#">
							<img src="img/site_logo.png" alt="">
						</a>
					</div>
					<div class="col-lg-3 col-lg-offset-4 col-md-3 col-md-offset-3 col-sm-4">
						<span class="footer-info">
							Техническая поддержка работает:<br>
							Пн-Пт с 9 до 18 часов
						</span>
					</div>
					<div class="col-lg-2 col-md-3 col-sm-4">
						<span class="footer-info">
							E-Mail: <a href="mailto:info@jedpad.com">info@jedpad.com</a><br>
							Телефон: 8 (981) 104-44-72<br>
						</span>
					</div>
				</div>
				<span class="copyright">© 2015 - 2017
					<a href="http://vin.jedpad.com/">vin.jedpad.com</a>
				</span>
			</div>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="vendor/ScrollMagic.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="vendor/jquery.fancybox.pack.js"></script>
		<script src="vendor/owl.carousel.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/kassa.js"></script>
		<script src="js/parser.js"></script>
		<script>
		$( document ).ready(function() {
			$(".promoButton").hide();
			$(".promoButton").click();
		});
		</script>
		<script>
		<!-- Yandex.Metrika counter -->
// <script type="text/javascript" >
//     (function (d, w, c) {
//         (w[c] = w[c] || []).push(function() {
//             try {
//                 w.yaCounter45236304 = new Ya.Metrika({
//                     id:45236304,
//                     clickmap:true,
//                     trackLinks:true,
//                     accurateTrackBounce:true,
//                     webvisor:true
//                 });
//             } catch(e) { }
//         });
//
//         var n = d.getElementsByTagName("script")[0],
//             s = d.createElement("script"),
//             f = function () { n.parentNode.insertBefore(s, n); };
//         s.type = "text/javascript";
//         s.async = true;
//         s.src = "https://mc.yandex.ru/metrika/watch.js";
//
//         if (w.opera == "[object Opera]") {
//             d.addEventListener("DOMContentLoaded", f, false);
//         } else { f(); }
//     })(document, window, "yandex_metrika_callbacks");
// </script>
<noscript><div><img src="https://mc.yandex.ru/watch/45236304" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
	</body>
</html>
