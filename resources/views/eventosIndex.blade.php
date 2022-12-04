<x-plantilla>
    <div class="main-nav">
		<div class="container">
			<header class="group top-nav">
			    <nav id="navbar-1" class="navbar item-nav">
				    <ul>
				        <li><a href="/uniformes">Inicio</a></li>
						<li><a href="/evento">Pedidos</a></li>
                        <li ><a href="/evento/create">Crear nuevo pedido</a></li>
				    </ul>
				</nav>
			</header>
		</div>
	</div>
    
    <h1>Lsita de pedidos</h1>
    <table border="1">
        <tr>
            <th>Usuario</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Pedidos</th>
            <th>Editar</th>
            <th>Correo</th>
            <th>Eliminar</th>
        </tr>
        @foreach($eventos as $evento)
            <tr>
                <td>{{ $evento->user->name}}</td>
                <td>
                    <a href="/evento/{{ $evento ->id }}">
                        {{ $evento->nombre}}
                    </a>
                </td>
                <td>{{ $evento->correo}}</td>
                <td>{{ $evento->telefono}}</td>
                <td>{{ $evento->pedidos}}</td>
                <td>
                    <a href="/evento/{{$evento->id}}/edit">Editar</a>
                </td>
                <td>
                    <a href="{{ route('evento.correo', $evento) }}">Enviar a correo</a>
                </td>
                <td>
                    <form action="/evento/{{$evento->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</x-plantilla>