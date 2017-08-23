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
		<title>VIN JedPad</title>
	</head>
	<body>
		<div id="order-window" class="modal-window">
			<div class="modal-window-header">
				<h3 class="modal-window-headline">Заказать пакет</h3>
			</div>
			<div class="modal-window-content">
				<form method="post">
					<input name="topic" value="Заказ пакета" type="hidden">
					<input class="text-input" placeholder="Имя" type="text" required>
					<input class="text-input" placeholder="Телефон" type="text" required>
					<input class="text-input" placeholder="E-Mail" type="text" required>
					<input class="button lg rounded" value="Отправить" type="submit">
				</form>
			</div>
		</div>
		<a href="#waitreport" style="display:none;" id="open_waitreport"></a>
		<div id="waitreport" class="modal-window">
			<div class="modal-window-header">
				<h3 class="modal-window-headline">Заказать пакет</h3>
			</div>
			<div class="modal-window-content">
				<form method="post">
					<input name="topic" value="Заказ пакета" type="hidden">
					<input class="text-input" placeholder="Имя" type="text" required>
					<input class="text-input" placeholder="Телефон" type="text" required>
					<input class="text-input" placeholder="E-Mail" type="text" required>
					<input class="button lg rounded" value="Отправить" type="submit">
				</form>
			</div>
		</div>
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
		<section class="report">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div  id="report-nav" class="report-nav">
							<!-- <div class="locked-nav">
								<span class="icon icon-lock-lg"></span>
								<span class="locked-nav-text">Все данные доступны в полном отчете</span>
							</div> -->
							<ul class="report-nav-menu nav">
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-1">Общие сведения об автомобиле</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-2">Данные таможни</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-3">Данные ОСАГО</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-4">Пробег автомобиля</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-5">Сведения об участии в ДТП</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-6">Количество владельцев</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-7">История регистрационных действий</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-8">Информация о розыске ТС в системе МВД России</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-9">Информация о наложении ограничений в Госавтоинспекции на ТС</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-10">Утилизация</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-11">Использование автомобиля в качестве такси</a>
								</li>
								<li class="report-nav-menu-item">
									<a class="anchor" href="#report-category-12">Информация о нахождении в залоге у банков</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-9 col-md-8 vin-report">
						<div class="section-header">
							<h4 class="section-headline">Краткий отчет по VIN коду</h4>
						</div>
						<div class="section-content">
							<span class="checkable-vin">NLAFD75308W072210</span>
							<div class="report-buttons">
								<a class="button rounded" href="#buyForm" onclick="scroll_it()">
									<span class="icon icon-doc"></span>
									Рекомендуем получить полный отчет
								</a>
							</div>
							<ul class="report-wrapper">
								<li class="report-category">
									<h4 class="report-category-title">Общие сведения об автомобиле</h4>
									<ul class="report-data">
										<li class="report-data-item">
											<h5 class="report-data-title">VIN</h5>
											<span class="report-data-value">NLAFD75308W072210</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Автомобиль</h5>
											<span class="report-data-value">Honda Civic</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Год</h5>
											<span class="report-data-value">2008</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Объем двигателя</h5>
											<span class="report-data-value">1799 куб. см.</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Мощность двигателя</h5>
											<span class="report-data-value">133 л.с. / 98 кВт</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Цвет</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Комплектация</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Данные таможни</h4>
									<ul class="report-data">
										<li class="report-data-item">
											<h5 class="report-data-title">Дата декларации</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Страна вывоз</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Данные ОСАГО</h4>
									<ul class="report-data">
										<li class="report-data-item">
											<h5 class="report-data-title">Дата запроса действительности полиса</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Серия договора</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Номер договора</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Ограничения лиц допущенных к управлению ТС</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Страховая компания</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Примерная стоимость ОСАГО на 1 год</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Пробег автомобиля</h4>
									<ul class="report-data">
										<li class="report-data-item">
											<h5 class="report-data-title">Значение</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Сведения об участии в ДТП</h4>
									<ul class="report-data column single">
										<li class="report-data-item">
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Количество владельцев</h4>
									<ul class="report-data">
										<li class="report-data-item">
											<h5 class="report-data-title">Владельцев</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">История регистрационных действий</h4>
									<ul class="report-data">
										<li class="report-data-item">
											<h5 class="report-data-title">Дата последней операции</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Дата последней операции</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Дата последней операции</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Дата последней операции</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Информация о розыске ТС в системе МВД России</h4>
									<ul class="report-data column single">
										<li class="report-data-item">
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Информация о наложении ограничений в Госавтоинспекции на ТС</h4>
									<ul class="report-data column single">
										<li class="report-data-item">
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Утилизация</h4>
									<ul class="report-data column single">
										<li class="report-data-item">
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Использование автомобиля в качестве такси</h4>
									<ul class="report-data column single">
										<li class="report-data-item">
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
								<li class="report-category">
									<h4 class="report-category-title">Информация о нахождении в залоге у банков</h4>
									<ul class="report-data">
										<li class="report-data-item">
											<h5 class="report-data-title">Дата регистрации</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Номер уведомления</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Имущество</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Залогодержатель</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
										<li class="report-data-item">
											<h5 class="report-data-title">Залогодатель</h5>
											<span class="report-data-value">
												<span class="locked-data">
													<span class="icon icon-lock"></span>
													Доступно в полном отчёте
												</span>
											</span>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="promo hidden">
			<div class="container">
				<div class="section-content">
					<div class="row">
						<div class="col-lg-5 col-lg-offset-1 col-md-7">
							<div class="promo-text">
								<span>Промо-код на скидку 100р</span>
								<span>в следующем заказе</span>
							</div>
						</div>
						<div class="col-lg-4 col-lg-offset-1 col-md-5">
							<div class="promo-code-wrapper">
								<span class="promo-code">Q4FA-7GAR</span>
								<a class="button lg rounded" href="#">Применить промо-код</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="offers hidden">
			<div class="container">
				<div class="section-header">
					<h2 class="section-headline">
						<span class="icon icon-package"></span>
						Пакетные предложения
					</h2>
				</div>
				<div class="section-content">
					<div class="row">
						<div class="offers-slider owl-carousel owl-theme">
							<div class="col-lg-12">
								<div class="offer">
									<h3 class="offer-title">Пакет 1</h3>
									<span class="offer-info">до 100 проверок в месяц</span>
									<span class="offer-price">99 р. отчет</span>
									<a class="button lg rounded modal-block" href="#order-window">Заказать</a>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="offer">
									<h3 class="offer-title">Пакет 2</h3>
									<span class="offer-info">от 100 до 300 проверок в месяц</span>
									<span class="offer-price">85 р. отчет</span>
									<a class="button lg rounded modal-block" href="#order-window">Заказать</a>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="offer">
									<h3 class="offer-title">Пакет 3</h3>
									<span class="offer-info">от 300 до 500 проверок в месяц</span>
									<span class="offer-price">80 р. отчет</span>
									<a class="button lg rounded modal-block" href="#order-window">Заказать</a>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="offer">
									<h3 class="offer-title">Пакет 4</h3>
									<span class="offer-info">от 500 до 1000 проверок в месяц</span>
									<span class="offer-price">75 р. отчет</span>
									<a class="button lg rounded modal-block" href="#order-window">Заказать</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="features hidden">
			<div class="container">
				<div class="section-content">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="feature">
								<div class="feature-icon">
									<span class="icon icon-like"></span>
								</div>
								<span class="feature-text">Удобный личный кабинет</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="feature">
								<div class="feature-icon">
									<span class="icon icon-api"></span>
								</div>
								<span class="feature-text">Работа по API</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="feature">
								<div class="feature-icon">
									<span class="icon icon-sale"></span>
								</div>
								<span class="feature-text">Спец. условия при работе совместно с JedPad.com</span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3">
							<div class="feature">
								<div class="feature-icon">
									<span class="icon icon-smartphone"></span>
								</div>
								<span class="feature-text">Мобильное приложение</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="questions">
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
		</section>
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
									<script>
									function valueChanged(){
										if($('#promo').is(":checked")){   
											$("input[name='promo']").show();
											$(".promoButton").show();
										}else{
											$("input[name='promo']").hide();
											$(".promoButton").hide();
										}
									}
									</script>
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
										<div class="input-group">
											<input id="promo" type="checkbox" onchange="valueChanged()">
											<label for="promo">Ввести промо-код</label>
										</div>
										<input class="text-input" type="text" name="promo">
										<input class="button rounded promoButton" value="Применить промо-код" type="button">
										<div class="input-group">
											<input id="conditions" type="checkbox" required checked>
											<label for="conditions">Я согласен с <a href="#">условиями сервиса*</a>
											</label>
										</div>
										<input class="button rounded" value="Перейти к оплате" type="submit">
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
		<section class="form">
			<div class="container">
				<div class="section-content">
					<div class="row check-form">
						<form class="clearfix" action="">
							<div class="col-lg-3 col-lg-offset-2 col-md-4 col-sm-6">
								<input class="text-input" placeholder="VIN" type="text" required>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-6">
								<input class="text-input" placeholder="E-Mail для отчета" type="text" required>
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
		</section>
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
		<script src="js/parser.js"></script>
		<script src="js/kassa.js"></script>
		<script>
		$(document).ready(function(){
			$("input[name='promo']").hide();
			$(".promoButton").hide();
		});
		</script>
	</body>
</html>
