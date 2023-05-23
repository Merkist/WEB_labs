<!DOCTYPE html>

<html>

<head>
	<title>RocketPizza</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="header__container">
				<a href="/" class="header__logo">
					<div class="header__logo-icon">
						<img src="{{ asset('assets/img/header/RocketPizzaLogo.png') }}" alt="Icon">
					</div>
					<div class="header__logo-text">
						Rocket Pizza
					</div>
				</a>
				<div class="header__phone">
					+380-XX-XXX-XXXX
				</div>
				<nav class="header__menu menu">
					<div class="menu__body">
						<ul class="menu__list">
							<li class="menu__item">
								<a href="/section/pizza" class="menu__link">Піца</a>
							</li>
							<li class="menu__item">
								<a href="/section/drink" class="menu__link">Напої</a>
							</li>
							<li class="menu__item">
								<a href="/section/snack" class="menu__link">Закуски</a>
							</li>
							<li class="menu__item">
								<a href="/section/dessert" class="menu__link">Десерти</a>
							</li>
						</ul>
					</div>
				</nav>
				<a href="/cart" class="header__cart"><img src="{{ asset('assets/img/header/Cart.svg') }}" alt="Cart"></a>
				<button class="icon-menu" type="button">
					<span></span>
				</button>
			</div>
		</header>
		<main class="page">
			@yield('content')
		</main>
		<footer class="footer">
			<div class="footer__container">
				<div class="footer__social">
					<div class="social__title">
						Слідкувати
					</div>
					<div class="social__icons">
						<a href="https://twitter.com/" target="_blank"><img src="{{ asset('assets/img/footer/Twitter.svg') }}" alt="Twitter"></a>
						<a href="https://web.telegram.org/z/" target="_blank"><img src="{{ asset('assets/img/footer/Telegram App.svg') }}" alt="Telegram"></a>
						<a href="https://www.instagram.com/" target="_blank"><img src="{{ asset('assets/img/footer/Instagram.svg') }}" alt="Instagram"></a>
						<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank"><img src="{{ asset('assets/img/footer/YouTube.svg') }}" alt="YouTube"></a>
						<a href="https://www.facebook.com/" target="_blank"><img src="{{ asset('assets/img/footer/Facebook.svg') }}" alt="Facebook"></a>
					</div>
				</div>
				<div class="footer__contacts">
					<div class="contacts__block">
						<h1>Контакти</h1>
						<p>+380-XX-XXX-XXXX</p>
						<p>info@rocketpizza.ua</p>
					</div>
				</div>
				<div class="footer__logo">
					<a href="/" class="header__logo">
						<div class="header__logo-icon">
							<img src="{{ asset('assets/img/header/RocketPizzaLogo.png') }}" alt="Icon">
						</div>
						<div class="header__logo-text">
							Rocket Pizza
						</div>
					</a>
					<p>Макет створений @merk1st</p>
				</div>
			</div>
		</footer>
	</div>
	<script src="{{ asset('assets/js/script.js') }}"> </script>
</body>	
</html>