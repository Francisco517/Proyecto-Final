<x-plantilla>
    <div class="main-nav">
		<div class="container">
			<header class="group top-nav">
			    <nav id="navbar-1" class="navbar item-nav">
				    <ul>
				        <li><a href="/uniformes">Inicio</a></li>
						<li><a href="/evento">Pedidos</a></li>
				    </ul>
				</nav>
			</header>
		</div>
	</div>
    <h1>Detalles del Pedido</h1><br>
    <h2>Nombre: {{$evento->nombre}}</h2>
    <P>Correo: {{$evento->correo}}</P>
    <P>Telefono: {{$evento->telefono}}</P>
    <P>Pedido: <br>{{$evento->pedidos}}</P>
	<p>
		<h3>Archivo</h3>
		<ul>
			@foreach($evento->archivos as $archivo)
				<li><a href=" {{ route('descarga', $archivo) }} ">{{ $archivo->nombre_original }}</a></li>
			@endforeach
		</ul>
	</p>

</x-plantilla>