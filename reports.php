<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="Проверка истории автомобиля по VIN коду">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/main.css">
		<title>VIN</title>
	</head>
	<body>
		<div class="modal-window">
			<div class="modal-window-wrapper">
				<div class="close-button">
					<i class="icon icon-close"></i>
				</div>
				<a class="link open-modal" data-modal="#modal1" id="openreport" href="#"  style="display:none;">Посмотреть пример полного отчета</a>
				<a class="link open-modal" data-modal="#modal2" id="waitreport" href="#"  style="display:none;">Формируем отчет</a>
				<a class="link open-modal" data-modal="#modal3" id="successpayment" href="#"  style="display:none;">Оплата успешна</a>
				<div id="modal1" class="modal-window-full-report">
					<div class="modal-window-content">
						<div class="vin-full-report">
							<div class="water-marks">
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
								<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
							</div>
							<h3 class="modal-window-title"></h3>
							<div class="modal-window-container">
								<div class="buttons-wrapper">
									<a class="button print" href="#">Распечатать</a>
									<a class="button pdf" href="#">Сохранить в PDF</a>
								</div>
								<div class="vin-full-report-container">
									<h5 class="report-data-category">Общие сведения об автомобиле</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-title">VIN</span>
											<span class="vin-report-data-value vechile-vin"></span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Модель</span>
											<span class="vin-report-data-value vechile-model">Honda Civic</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Год производства</span>
											<span class="vin-report-data-value vechile-year">2008</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Объем двигателя</span>
											<span class="vin-report-data-value vechile-volume">1799 куб. см.</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Мощность двигателя</span>
											<span class="vin-report-data-value vechile-power">133 л.с. / 98 кВт</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Цвет</span>
											<span class="vin-report-data-value vechile-color">Серый</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Комплектация</span>
											<span class="vin-report-data-value vechile-complect">Седан</span>
										</li>
									</ul>
									<h5 class="report-data-category">Данные таможни</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-title">Дата декларации</span>
											<span class="vin-report-data-value vechile-customs-year">2008/10/06</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Страна вывоз</span>
											<span class="vin-report-data-value vechile-customs-country">Турция</span>
										</li>
									</ul>
									<h5 class="report-data-category">Данные ОСАГО</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-title">Дата запроса действительности полиса</span>
											<span class="vin-report-data-value osago-year">2008/10/06</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Серия договора</span>
											<span class="vin-report-data-value osago-series">ЕЕЕ</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Номер договора</span>
											<span class="vin-report-data-value osago-number">0385473973</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Ограничения лиц допущенных к управлению ТС</span>
											<span class="vin-report-data-value osago-restricts">С ограничениями</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Страховая компания</span>
											<span class="vin-report-data-value osago-company">РЕСО-гарантия</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Примерная стоимость ОСАГО на 1 год</span>
											<span class="vin-report-data-value osago-price">
												10570 рублей
												<a class="button" href="http://cars-bazar.ru/uslugi/osago/" target="_blank">Купить ОСАГО</a>
											</span>
										</li>
									</ul>
									<h5 class="report-data-category">Пробег автомобиля</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-title">Значение</span>
											<span class="vin-report-data-value vechile-longs">Данные не зафиксированы</span>
										</li>
									</ul>
									<h5 class="report-data-category">Сведения об участии в ДТП</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-value single dtp">Данные об участии в ДТП не найдены</span>
										</li>
										<li class="vin-report-data dtp-list">

										</li>
									</ul>
									<h5 class="report-data-category">Количество владельцев</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-title">Владельцев</span>
											<span class="vin-report-data-value history-count">-</span>
										</li>
									</ul>
									<h5 class="report-data-category">История регистрационных действий</h5>
									<ul class="vin-report-list history-list">

									</ul>
									<h5 class="report-data-category">Информация о розыске ТС, в системе МВД России</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-value single wanted">ГИБДД подтвердило, что автомобиль не числится в угоне</span>
										</li>
									</ul>
									<h5 class="report-data-category">Информация о наложении ограничений в Госавтоинспекции на ТС</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-value single restrict">Ограничений нет (проверено в ГИБДД)</span>
										</li>
									</ul>
									<h5 class="report-data-category">Утилизация</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-value single utilized">Автомобиль не был утилизирован (Проверено в ГИБДД)</span>
										</li>
									</ul>
									<h5 class="report-data-category">Использование автомобиля в качестве такси</h5>
									<ul class="vin-report-list">
										<li class="vin-report-data">
											<span class="vin-report-data-value single taxy">На автомобиль не выдавалась лицензия на такси</span>
										</li>
									</ul>
									<h5 class="report-data-category">Информация о нахождении в залоге у банков</h5>
									<ul class="vin-report-list zalog">
										<li class="vin-report-data">
											<span class="vin-report-data-title">Дата регистрации</span>
											<span class="vin-report-data-value zalog-date">5.10.2015</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Номер уведомления</span>
											<span class="vin-report-data-value zalog-number">2015-000-953173-757</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Имущество</span>
											<span class="vin-report-data-value zalog-value" >VIN: NLAFD75308W072210</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Залогодержатель</span>
											<span class="vin-report-data-value zalog-debitor">Иванов Иван Иванович (02.04.1992)</span>
										</li>
										<li class="vin-report-data">
											<span class="vin-report-data-title">Залогодатель</span>
											<span class="vin-report-data-value zalog-creditor">Банк СОЮЗ (акционерное общество)</span>
										</li>
									</ul>
								</div>
								<div class="buttons-wrapper">
									<a class="button print" href="#">Распечатать</a>
									<a class="button pdf" href="#">Сохранить в PDF</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="modal2" class="modal-window-notification">
					<div class="modal-window-content">
						<div class="payment-notification">
							<h3 class="modal-window-title request-status-title">Оплата прошла успешно</h3>
							<div class="modal-window-container request-status">
								<span class="modal-window-text">Ваш отчёт по VIN коду - Z8NBBUJ32BS024566 подготавливается.</span>
								<span class="modal-window-text">Пожалуйста подождите, обычно это занимает не более 45 секунд.</span>
							</div>
						</div>
						<div class="payment-status">
							<div class="modal-window-container">
								<div class="payment-status-icon">
									<i class="icon icon-timer"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="modal3" class="modal-window-contact">
					<div class="modal-window-content">
						<div class="contact-form">
							<h3 class="modal-window-title">Задайте вопрос</h3>
							<div class="modal-window-container">
								<span class="modal-window-text">С вами свяжутся в течении рабочего дня</span>
								<form name="contact-form" method="POST">
									<input name="name" class="text-input" placeholder="Введите ваше Имя*" type="text" required>
									<input name="email" class="text-input" placeholder="Введите ваш E-Mail*" type="text" required>
									<input name="phone" class="text-input" placeholder="Введите ваш Телефон*" type="text" pattern="^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$" required>
									<textarea name="message" class="text-input" rows="3" required></textarea>
									<input class="button" value="Отправить" type="submit">
								</form>
								<span class="modal-window-text">Ваши данные не передаются третьим лицам</span>
							</div>
						</div>
					</div>
				</div>
				<div id="modal4" class="modal-window-full-report">
					<div class="modal-window-content">
						<div class="water-marks">
							<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
							<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
							<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
							<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
							<span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span><span>checkauto.cars-bazar.ru</span>
						</div>
						<div class="vin-full-report">
							<h3 class="modal-window-title">Пример полного отчёта по VIN коду - КNАDН511ВА6672755</h3>
							<div class="modal-window-container">
								<div class="buttons-wrapper">
									<a class="button print" href="#">Посмотреть версию для печати</a>
									<a class="button pdf" href="/store/КNАDН511ВА6672755.pdf">Посметреть PDF версию отчета</a>
								</div>
								<div class="vin-full-report-container"><h5 class="report-data-category">Общие сведения об автомобиле</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-title">Модель</span><span class="vin-report-data-value vehicle-model">КИАРИО</span></li><li class="vin-report-data"><span class="vin-report-data-title">VIN</span><span class="vin-report-data-value vehicle-vin">КNАDН511ВА6672755</span></li><li class="vin-report-data"><span class="vin-report-data-title">Год производства</span><span class="vin-report-data-value vehicle-year">2010</span></li><li class="vin-report-data"><span class="vin-report-data-title">Цвет</span><span class="vin-report-data-value vehicle-color">СИНИЙ</span></li><li class="vin-report-data"><span class="vin-report-data-title">Мощность двигателя</span><span class="vin-report-data-value vehicle-powerHp">97 л.с.</span></li><li class="vin-report-data"><span class="vin-report-data-title">Объём двигателя</span><span class="vin-report-data-value vehicle-engineVolume">1399 куб. см.</span></li><li class="vin-report-data"><span class="vin-report-data-title">Тип</span><span class="vin-report-data-value vehicle-category">Легковые автомобили, небольшие грузовики (до 3,5 тонн)</span></li></ul><h5 class="report-data-category">Данные таможни</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-title">Дата декларации</span><span class="vin-report-data-value customs-date">2010</span></li><li class="vin-report-data"><span class="vin-report-data-title">Страна вывоз</span><span class="vin-report-data-value customs-country">Южная Корея</span></li></ul><h5 class="report-data-category">Данные ОСАГО</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-title">Дата запроса действительности полиса</span><span class="vin-report-data-value osago-date">2017/05/14</span></li><li class="vin-report-data"><span class="vin-report-data-title">Серия договора</span><span class="vin-report-data-value osago-policyBsoSerial">ЕЕЕ</span></li><li class="vin-report-data"><span class="vin-report-data-title">Номер договора</span><span class="vin-report-data-value osago-policyBsoNumber">0903950818</span></li><li class="vin-report-data"><span class="vin-report-data-title">Ограничения лиц допущенных к управлению ТС</span><span class="vin-report-data-value osago-policyIsRestrict">Без ограничений</span></li><li class="vin-report-data"><span class="vin-report-data-title">Страховая компания</span><span class="vin-report-data-value osago-insCompanyName">РЕСО-Гарантия</span></li></ul><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-title">Примерная стоимость ОСАГО на 1 год</span><span class="vin-report-data-value osago-price">7840.80<a class="button" href="http://cars-bazar.ru/uslugi/osago/" target="_blank">Купить ОСАГО</a></span></li></ul><h5 class="report-data-category" style="background-color:#19b689;">Рыночная стоимость</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-title">Примерная стоимость</span><span class="vin-report-data-value data-value">от 690 536 руб. до 986 480 руб.</span></li></ul><h5 class="report-data-category">Пробег автомобиля</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-title">Значение</span><span class="vin-report-data-value data-value">Данные не зафиксированы</span></li></ul><h5 class="report-data-category">Сведения об участии в ДТП</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-value single">Данные не зафиксированы</span><span class="vin-report-data-hint">Мы не смогли найти факты, которые указывают на наличие ДТП.<br>Тем не менее, это не означает, что данный автомобиль НЕ УЧАСТВОВАЛ в ДТП</span></li></ul><h5 class="report-data-category">Количество владельцев</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-title">Владельцев</span><span class="vin-report-data-value data-value">1</span></li></ul><h5 class="report-data-category">История регистрационных действий</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-title">Дата последней операции</span><span class="vin-report-data-value data-value">По текущий момент</span></li></ul><h5 class="report-data-category">Информация о розыске ТС, в системе МВД России</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-value single">ГИБДД подтвердило, что автомобиль не числится в угоне</span></li></ul><h5 class="report-data-category">Информация о наложении ограничений в Госавтоинспекции на ТС</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-value single">Информация об ограничении 54#SP1133075</span></li><li class="vin-report-data"><span class="vin-report-data-title">Марка (модель) ТС</span><span class="vin-report-data-value data-value">КИА РИО</span></li><li class="vin-report-data"><span class="vin-report-data-title">Год выпуска ТС</span><span class="vin-report-data-value data-value">2010&nbsp;г.</span></li><li class="vin-report-data"><span class="vin-report-data-title">Дата наложения ограничения</span><span class="vin-report-data-value data-value">14.03.2017</span></li><li class="vin-report-data"><span class="vin-report-data-title">Регион инициатора ограничения</span><span class="vin-report-data-value data-value">Новосибирская область</span></li><li class="vin-report-data"><span class="vin-report-data-title">Кем наложено ограничение</span><span class="vin-report-data-value data-value">Судебный пристав</span></li><li class="vin-report-data"><span class="vin-report-data-title">Вид ограничения</span><span class="vin-report-data-value data-value">Запрет на регистрационные действия</span></li><li class="vin-report-data"><span class="vin-report-data-title">Основания ограничения</span><span class="vin-report-data-value data-value">Документ: 102775493/5443 от 14.03.2017, Зульфалиева Юлия Игоревна, СПИ: 50431010626517, ИП:[Номер ИП скрыт] от 11.01.2017</span></li></ul><h5 class="report-data-category">Утилизация</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-value single">Автомобиль не был утилизирован (Проверено в ГИБДД)</span></li></ul><h5 class="report-data-category">Использование автомобиля в качестве такси</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-value single">На автомобиль не выдавалась лицензия на такси</span></li></ul><h5 class="report-data-category">Информация о нахождении в залоге у банков</h5><ul class="vin-report-list"><li class="vin-report-data"><span class="vin-report-data-value single">Данный автомобиль не числится в залоге</span></li></ul></div>
								<div class="buttons-wrapper">
									<a class="button print" href="#">Посмотреть версию для печати</a>
									<a class="button pdf" href="/store/КNАDН511ВА6672755.pdf">Посметреть PDF версию отчета</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-window-overlay"></div>
		</div>

		<header class="header">
			<div class="container">
				<a class="site-logo" href="/">
					<img src="img/site_logo.png" alt="">
				</a>
				<h2 class="site-description">
					Проверка истории<br>
					автомобиля по <span>VIN</span> коду<br>
					<span>по 29 пунктам</span>
				</h2>
				<nav class="site-nav">
					<div class="menu-button">
						<i class="icon icon-hamburger"></i>
					</div>
					<ul class="site-nav-menu">
						<li class="site-nav-menu-item">
							<a href="index.html#about">О нас</a>
						</li>
						<li class="site-nav-menu-item">
							<a href="faq.html">Частые вопросы</a>
						</li>
						<li class="site-nav-menu-item">
							<a href="conditions.html">Условия сервиса</a>
						</li>
						<li class="site-nav-menu-item dropdown">
							<a href="partnership.html">Партнёрство</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-item">
									<a href="partnership1.html">Ссылка 1</a>
								</li>
								<li class="dropdown-menu-item">
									<a href="partnership2.html">Ссылка 2</a>
								</li>
								<li class="dropdown-menu-item">
									<a href="partnership3.html">Ссылка 3</a>
								</li>
								<li class="dropdown-menu-item">
									<a href="partnership4.html">Ссылка 4</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</header>
		<section class="secondary-section">
			<div class="container">
				<h2 class="section-title">Краткий отчёт</h2>
				<div class="vin-report">
					<a class="button" href="/reports.php#buyForm">Рекомендуем получить полный отчёт</a>
					<h5 class="report-data-category">Общие сведения об автомобиле</h5>

					<ul class="vin-report-list">
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -1px;" class="schet_mobile"><img src="img/reports_icon/1.png" style="width:30px;"></div><span class="vin-report-data-title">Модель</span>
							<span class="vin-report-data-value vechile-model"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: 1px;" class="schet_mobile"><img src="img/reports_icon/2.png" style="width:30px;"></div><span class="vin-report-data-title">VIN</span>
							<span class="vin-report-data-value vechile-vin"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -6px;" class="schet_mobile"><img src="img/reports_icon/3.png" style="width:30px;"></div><span class="vin-report-data-title">Год производства</span>
							<span class="vin-report-data-value vechile-year"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/4.png" style="width:30px;"></div><span class="vin-report-data-title">Цвет</span>
							<span class="vin-report-data-value vechile-color"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -2px;" class="schet_mobile"><img src="img/reports_icon/5.png" style="width:30px;"></div><span class="vin-report-data-title">Мощность двигателя</span>
							<span class="vin-report-data-value vechile-power"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -6px;" class="schet_mobile"><img src="img/reports_icon/6.png" style="width:30px;"></div><span class="vin-report-data-title">Объём двигателя</span>
							<span class="vin-report-data-value vechile-volume"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -7px;" class="schet_mobile"><img src="img/reports_icon/7.png" style="width:30px;"></div><span class="vin-report-data-title">Комплектация автомобиля</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/8.png" style="width:30px;"></div><span class="vin-report-data-title">Участие в ДТП</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/9.png" style="width:30px;"></div><span class="vin-report-data-title">Ограничения на регистрационные действия</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -3px;" class="schet_mobile"><img src="img/reports_icon/10.png" style="width:30px;"></div><span class="vin-report-data-title">Проверка на нахождение в залоге</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -2px;" class="schet_mobile"><img src="img/reports_icon/11.png" style="width:30px;"></div><span class="vin-report-data-title">Информация об угоне и розыске</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -3px;" class="schet_mobile"><img src="img/reports_icon/12.png" style="width:30px;"></div><span class="vin-report-data-title">Пробег машины</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -10px;" class="schet_mobile"><img src="img/reports_icon/13.png" style="width:30px;"></div><span class="vin-report-data-title">Количество владельцев ТС</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -9px;" class="schet_mobile"><img src="img/reports_icon/14.png" style="width:30px;"></div><span class="vin-report-data-title">История регистрационных действий</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/15.png" style="width:30px;"></div><span class="vin-report-data-title">Сведения о страховке ОСАГО</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -5px;" class="schet_mobile"><img src="img/reports_icon/16.png" style="width:30px;"></div><span class="vin-report-data-title">Информация о утилизации</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/17.png" style="width:30px;"></div><span class="vin-report-data-title">Статус владельца (физ / юр. лицо)</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/18.png" style="width:30px;"></div><span class="vin-report-data-title">Использование в качестве такси</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -4px;" class="schet_mobile"><img src="img/reports_icon/19.png" style="width:30px;"></div><span class="vin-report-data-title">Таможенная история</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
						<li class="vin-report-data">
							<div style="position: absolute; margin-top: -6px;" class="schet_mobile"><img src="img/reports_icon/20.png" style="width:30px;"></div><span class="vin-report-data-title">Сведения о покупке в лизинг</span>
							<span class="vin-report-data-value hidden"><img src="img/loader.gif" style="height:1em"/></span>
						</li>
					</ul>
				</div>
				<div>
					<div id="buyForm" class="buy-form">



						<div class="buy-form-wrapper">

						<div style="font-size:14px; line-height: 1.5; margin-bottom: 15px; color:#646766">
						<table width="100%">
						<tr><td align="center"><img src="/img/ugon.png"></td>
						<td align="center"><img src="/img/dtp.png"></td>
						<td align="center"><img src="/img/probeg.png"></td>
						</tr>
						<tr><td align="center">Вы уверены, что авто<br> не числится в угоне?</td>
						<td align="center">А сколько раз он<br> попадал в ДТП?</td>
						<td align="center">Знаете реальный<br> пробег?</td>
						</tr>
						</table><br>
						<span style="font-size:24px;">Вся правда об автомобиле по цене бизнес ланча!</span><br>
						</div>

							<h5 class="form-title">Купить полный отчёт</h5>
							<form action="https://money.yandex.ru/eshop.xml" method="POST">
								<input type="hidden" name="shopId" value="113311" />
								<input type="hidden" name="scid" value="97661" />
								<input type="hidden" name="sum" value="450" />
								<input type="hidden" name="customerNumber" value="" />
								<input type="hidden" name="cps_email" value="" />
								<input type="hidden" name="cps_phone" value="" />
								<input type="hidden" name="cb_order_id" value="" />
								<input type="hidden" name="vin" value="" />
								<input type="hidden" name="cb_response_url" value="http://<?php echo $_SERVER["HTTP_HOST"];?>" />
							    <input type="hidden" name="shopSuccessURL" value="http://checkauto.cars-bazar.ru/" />
							    <!-- <input type="hidden" name="shopSuccessURL" value="http://vin.jedpad.com/" /> -->
							    <input type="hidden" name="shopFailURL" value="http://cars-bazar.ru" />
								<div class="form-group">
									<?php
										echo isset($_REQUEST["email"])
											?'<input name="email" class="text-input" placeholder="Введите ваш E-Mail*" type="hidden" required value="'.$_REQUEST["email"].'">'
											:'<input name="email" class="text-input" placeholder="Введите ваш E-Mail*" type="text" required value="">';
									?>

									<!-- <div class="input-group">
										<input id="phone" class="checkbox toggle-input" data-toggle="#toggle1" type="checkbox">
										<label for="phone">Ввести номер телефона</label>
										<input id="toggle1" name="phone" class="text-input toggle" placeholder="Введите ваш Телефон" type="text">
									</div>-->
									<div class="input-group">
										<input id="promo" class="checkbox toggle-input" data-toggle="#toggle2" type="checkbox">
										<label for="promo">Ввести промо-код</label>
										<input id="toggle2" name="promo" class="text-input toggle" placeholder="Промокод" type="text">
									</div>
									<div class="input-group">
										<input id="circs" class="checkbox" type="checkbox" checked required>
										<label for="circs">Я согласен с <a class="link" href="conditions.html" target="_blank">условиями сервиса</a>*</label>
									</div>
								</div>
								<div class="submit-wrapper clearfix">
									<div class="report-price">
										<span class="price" data-base="199">199</span>
										<span class="old-price">450</span>
									</div>
									<div class="payment-wrapper">
										<!-- <input class="button open-modal" data-modal="#modal2" value="Перейти к оплате" type="submit"> -->
										<input class="button payment-button" value="Перейти к оплате" type="submit">
										<div class="view-report">
											<i class="icon icon-pdf dark"></i>
											<a class="link open-modal" data-modal="#modal4" href="#">
												Посмотреть пример полного отчета
											</a>
										</div>
									</div>
								</div>
							</form>
							<div style="font-size:24px; margin-top:40px; color:#646766" class="schet_mobile">
								Автомобиль проверяется по базам:
							</div>

						</div>
									<div style="text-align:center" class="schet_mobile"><ul class="check-categories">

							<li class="icon icon-nbk" style="margin-right: 64px; margin-left: 45px;">

						</li>

						<li class="icon icon-fns" style="margin-right: 64px;">

						</li>

						<li class="icon icon-nbk2" style="margin-right: 64px;">

						</li>

								<li class="check-category" style="margin-right: 64px; margin-left: 0px;">
									<i class="icon icon-gibdd dark"></i>
									<h3 class="check-category-title">ГИБДД</h3>
								</li>
								<li class="check-category" style="margin-right: 64px; margin-left: 0px;">
									<i class="icon icon-rsa dark"></i>
									<h3 class="check-category-title">РСА</h3>
								</li>
								<li class="check-category" style="margin-right: 64px; margin-left: 0px;">
									<i class="icon icon-fnp dark"></i>
									<h3 class="check-category-title">ФНП</h3>
								</li>
								<li class="check-category" style="margin-right: 54px; margin-left: 0px;">
									<i class="icon icon-fts dark"></i>
									<h3 class="check-category-title">ФТС</h3>
								</li>
							</ul></div>
					</div>
				</div>
			</div>
		</section>
		<section class="check">
			<div class="container">
				<div class="check-form">
						<style>
				input::-moz-placeholder { color: #e0e0e0; }
				input::-webkit-input-placeholder { color: #e0e0e0; }

				</style>
					<h5 class="form-title">Проверить наличие данных по машине:</h5>
					<form action="report.html">
						<span class="input-hint">Введите 17 знаков VIN:<sup>*</sup></span>
						<span class="input-list-enum">1</span><input name="vin" class="text-input" placeholder="X7MDC14BM90004876" type="text" minlength="17" maxlength="17" pattern="[0-9A-Z]{17}" required><br />
						<span class="input-hint"><sup></sup></span>
						<span class="input-list-enum">2</span><input name="email" class="text-input" placeholder="Email для отправки отчета" type="email" required><br />
						<input class="button search" value="Проверить" type="submit">
					</form>
					<div class="view-report">
						<i class="icon icon-pdf"></i>
						<a class="link open-modal" data-modal="#modal4" href="#">
							Посмотреть пример полного отчета
						</a>
					</div>
				</div>
			</div>
		</section>
		<footer class="footer">
			<div class="container">
				<div class="footer-left clearfix">
					<a class="site-logo" href="/">
						<img src="img/site_logo_dark.png" alt="">
					</a>
					<h2 class="site-description">
						Проверка истории<br>
						автомобиля по <span>VIN</span> коду
					</h2>
				</div>
				<div class="footer-right">
					<span>Контакты:</span>
					<ul class="contact-info">
						<li class="contact-info-item">
							E-Mail:
							<a class="link" href="mailto:info@checkauto.cars-bazar.ru">info@checkauto.cars-bazar.ru</a>
						</li>
						<li class="contact-info-item">
							Телефон:
							<span>8 (981) 104-44-72</span>
						</li>
						<li class="contact-info-item">
							Или
							<a class="link open-modal" data-modal="#modal3" href="#">напишите нам</a>
						</li>
						<li class="contact-info-item">
							Техническая поддержка работает:
							<span>Пн-Пт с 9 до 18 часов</span>
						</li>
					</ul>
				</div>
				<span class="copyright">
					c) 2015 - 2017
					<a class="link" href="/">checkauto.cars-bazar.ru</a>
				</span>
			</div>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="vendor/jquery.inputmask.bundle.min.js"></script>
		<script src="../vendor/jspdf.min.js"></script>
		<script src="../vendor/html2canvas.js"></script>
		<script src="js/main.js"></script>
		<script src="js/parser.js"></script>
		<script src="js/kassa.js"></script>
		<script src="js/vin.js"></script>
		<!-- Yandex.Metrika counter --
		<script type="text/javascript">
		    (function (d, w, c) {
		        (w[c] = w[c] || []).push(function() {
		            try {
		                w.yaCounter44533300 = new Ya.Metrika({
		                    id:44533300,
		                    clickmap:true,
		                    trackLinks:true,
		                    accurateTrackBounce:true,
		                    webvisor:true,
		                    trackHash:true
		                });
		            } catch(e) { }
		        });

		        var n = d.getElementsByTagName("script")[0],
		            s = d.createElement("script"),
		            f = function () { n.parentNode.insertBefore(s, n); };
		        s.type = "text/javascript";
		        s.async = true;
		        s.src = "https://mc.yandex.ru/metrika/watch.js";

		        if (w.opera == "[object Opera]") {
		            d.addEventListener("DOMContentLoaded", f, false);
		        } else { f(); }
		    })(document, window, "yandex_metrika_callbacks");
		</script>-->
		<noscript><div><img src="https://mc.yandex.ru/watch/44533300" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
	</body>
</html>
