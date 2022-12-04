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
    <h1>Editar Pedido</h1>
    <a href="/evento">Ver Pedidos</a>
    <form action="/evento" method="post">
        @csrf
        @method('patch')
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="{{old('nombre') ?? $evento->nombre}}">
        @error('nombre')
            <i>{{$message}}</i>
        @enderror
        <br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="{{old('correo')}}">
        @error('correo')
            <i>{{$message}}</i>
        @enderror
        <br>

        <label for="telefono">Telefono:</label>
        <input type="text" name="telefono" id="telefono" value="{{old('telefono')}}">
        @error('telefono')
            <i>{{$message}}</i>
        @enderror
        <br>

        <label for="pedidos">Pedido:</label>
        <textarea name="pedidos" id="pedidos" cols="40" rows="10">{{old('pedidos')}}</textarea>
        @error('pedidos')
            <i>{{$message}}</i>
        @enderror
        <br>
        <input type="submit" value="Editar">
    </form>
</x-plantilla>