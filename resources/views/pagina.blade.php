<!DOCTYPE html>
<html>
<head>
    <title>UniformesK</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/kube.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/custom.min.css" />
    <link rel="shortcut icon" href="img/favicon.png" />
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display+SC:700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	@vite(['resources/js/app.js'])
</head>
<body>
	<!-- Navigation -->
	<div class="main-nav">
		<div class="container">
			<header class="group top-nav">
				<div class="navigation-toggle" data-tools="navigation-toggle" data-target="#navbar-1">
				    <span class="logo">Lizethe</span>
				</div>
			    <nav id="navbar-1" class="navbar item-nav">
				    <ul>
				        <li class="active"><a href="#about">Sobre mi</a></li>
				        <li><a href="#experiences">Empresa</a></li>
				        <li><a href="#achievements">Trabajos</a></li>
						@if (Route::has('login'))
							@auth
								<li><a href="/evento">Pedidos</a></li>
							@endauth
						@endif
						@if (Route::has('login'))
							<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
								@auth
									<li><a href="{{ url('/user/profile') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Perfil</a></li>
								@else
									<li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

									@if (Route::has('register'))
										<li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
									@endif
								@endauth
							</div>
						@endif
				    </ul>
				</nav>
			</header>
		</div>
	</div>

	<!-- Introduction -->
	<div class="intro section" id="about">
		<div class="container">
			<p>Hola, Mi nombre es lizeth</p>
			<div class="units-row units-split wrap">
				<div class="unit-20">
					<img src="img/kathia.jpg" alt="Avatar">
				</div>
				<div class="unit-80">
					<h1>Soy de<br><span id="typed"></span></h1>
				</div>
				<p>
                    Soy una emprendedora Mexicana que realiza el trabajo, gestion y compromiso de una empresa de manufactura de uniformes de trabajo y de hasta esceula llevando la mejor calidad y precios a nuestros clientes. siemrpe con el comprimiso de cumplir al 100% con las expectativas de los clientes.
				</p>
			</div>
		</div>
	</div>

    <!-- Work Experience -->
	<div class="work section second" id="experiences">
		<div class="container">
			<h1>Quienes<br>Somos</h1>
			<ul class="work-list">
				<li>Somos una empresa de diseño de unofrmes dedicada a las necesidades de los clientes trabajamos desde 
                    uniformes para cualquier tipo de trabajo hasta uniformes escolares haciendo uso de materiales de alta calidad
                    y duraderos con la garantia que correspopnde tenemos una alta expereincia en el campo y gran compromiso para 
                    que tu empresa quede bien a la vista de tus clientes.
                </li>
		</div>

	<!-- Award & Achievements -->
	<div class="award section second" id="achievements">
		<div class="container">
            <br>
			<h1>Trabajos &amp;<br>Hechos</h1>
			<ul class="award-list list-flat">
				<li>Empresa de fontaneria</li>
				<li>es una empresa pequeña pero con un numero considerable de trabajdores</li>
				<li>manufacturamos sus uniformes completos con la calidad que requieren</li>
                <li>para el tipo de trabajo que manejan.</li>
			</ul>
			<ul class="award-list list-flat">
				<li>Empresa de soldadura</li>
				<li>Trabajamos con material de alta calidad y de dificil manejo</li>
				<li>para hacer uniformes de acuerdo a las necesidades en este caso</li>
				<li>contra fuego o quemaduras por la soldadura.</li>
			</ul>
			<ul class="award-list list-flat">
				<li>Colegio local</li>
				<li>Trabajamos como distribuidor de un colegio local para los uniformes</li>
				<li>tanto escolares como de los maestros dejando que no solo manejamos </li>
                <li>material para trabajos pesados si no diseños comodos y bonitos.</li>
			</ul>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="units-row">
			    <div class="unit-50">
					<ul class="social list-flat right">
                        <li>Nuestro medio de contacto</li><br>
						<li><a href="mailto:tako511@hotmail.com"><i class="fa fa-send"></i></a></li>
						<li><a href="http://twitter.com"><i class="fa fa-twitter"></i></a>
                        <li><a href="http://facebook.com"><i class="fa fa-facebook"></i></a>
					</ul>
			    </div>
			</div>
		</div>
	</footer>

	<!-- Javascript -->
	<script src="js/jquery.min.js"></script>
	<script src="js/typed.min.js"></script>
    <script src="js/kube.min.js"></script>
    <script src="js/site.js"></script>
    <script>
		function newTyped(){}$(function(){$("#typed").typed({
		// Change to edit type effect
		strings: ["Mexico", "Jalisco", "donde tus uniformes quedan bien"],
		typeSpeed:90,backDelay:700,contentType:"html",loop:!0,resetCallback:function(){newTyped()}}),$(".reset").click(function(){$("#typed").typed("reset")})});
    </script>
</body>
</html>