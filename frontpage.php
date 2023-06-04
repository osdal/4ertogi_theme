<?php
/*
Template Name: Главная страница
*/
	get_header('home');
?>
<main class="">
			<div class="main__container">
				<section class="top-section">
					<div class="top-section__firstRow">
						<div class="title1">
							<?php echo get_option('title_frontpage') ?>
						</div>
						<a href="#" class="star">
							<div>
								Получить
							</div>
						</a>
					</div>
					<div class="top-section__secondRow">
						<div>Мечта верстальщика</div>
					</div>
					<div class="top-section__thirdRow">
						<div class="title1">
							Для чего нужна
						</div>
						<div class="title1">"Мечта верстальщика"?</div>
						<a href="#" class="get-it">
							<div>
								получить
							</div>
						</a>
					</div>
				</section>
				<section class="center-section">
					<div class="center-section__left">
						<p>
							Стартовый шаблон в первую очередь помогает существенно увеличить скорость разработки благодаря
							большому количеству готовых решений.
						</p>

						<p>
							Меню-бургеры, табы, слойлеры, слайдеры, галереи, попапы, валидация и отправка форм. Работа со
							скроллом, параллакс, анимации и многое другое.
						</p>
					</div>
					<div class="center-section__middle">
						<div class="portreit">
							<div><picture><source srcset="<?php echo get_template_directory_uri() ?>/assets/img/round_portreit.webp" type="image/webp"><img src="<?php echo get_template_directory_uri() ?>/assets/img/round_portreit.png"></picture></div>
						</div>
					</div>
					<div class="center-section__right">
						я IT-специалист, более 10 лет занимаюсь разработкой сайтов. В "Мечте" собраны решения самых
						странных хотелок заказчиков!
					</div>
					<a href="#">
						<div class="more">
							подробнее
						</div>
					</a>
				</section>
				<section class="properties">
					<div class="properties__first-line">
						<div class="title2">Основные возможности</div>
						<div class="">
							<p>Никакого лишнего кода, только необходимый функционал для конкретного проекта</p>
							<p>Технологии GULP WEBPACK HTML/PUG SCSS/CSS JavaScript</p>
						</div>
						<div class="">
							<h3 class="title3">Скорость</h3>
							<p class="white-paragraph">Быстрая работа в режиме разработчика</p>
						</div>
					</div>
					<div class="properties__second-line">
						<div class="">
							<h3 class="title3">Щедрый JS функционал</h3>

							<p class="white-paragraph">За годы практики, собрано в одном месте большое количество готовых
								JavaScript решений,
								позволяющих решать самые разные задачи.<span><a href="#">Подробнее...</a></span></p>
						</div>
					</div>
					<div class="properties__third-line">
						<div class="clock"></div>
						<div class="">
							<h3 class="title2-white">Время – деньги!</h3>
							<p class="white-paragraph">Существенная экономия времени и сил на решение рутинных задач при
								разработке</p>
						</div>
					</div>
					<div class="properties__forth-line">
						<div class="">
							<h3 class="title2">Обновления</h3>
							<p class="white-paragraph">Постоянная работа по увеличению возможностей</p>
						</div>
						<div class="">
							<p class="">?</p>
							<div class="">Подробная документация, в которой описано применение каждого модуля</div>
						</div>
					</div>
					<div class="properties__fiveth-line">
						<a href="#" class="star">
							<div>
								Получить
							</div>
						</a>
						<div class="title3-violet">
							<h3>Мастер-классы с использованием шаблона</h3>
						</div>
					</div>
				</section>
			</div>
		</main>
		<?php get_footer() ?>