<!DOCTYPE HTML>

<html>
	<head>
		<title>Cadastro de Carro</title>
	</head>
	
	<body>
		<h1>Cadastro de Carros</h1>
		<form action="/carro" method="POST">
			<div>
				<label>Marca</label>
				<input type="text" name="marca" value="{{ $carro->marca}}"/>
			</div>
			<div>
				<label>Modelo</label>
				<input type="text" name="modelo" value="{{ $carro->modelo}}" />
			</div>
			<div>
				<label>Placa</label>
				<input type="text" name="placa" value="{{ $carro->placa}}"/>
			</div>
			<div>
				<label>Cor</label>
				<input type="text" name="cor" value="{{ $carro->cor}}" />
			</div>
			<div>
				<label>Ano</label>
				<input type="text" name="ano" value="{{ $carro->ano}}" />
			</div>
			@csrf
			<input type="hidden" name="id" value= " {{ $carro->id }}"/>
			<button type="submit">Salvar</button>
			<a href="/carro">Novo</a>
		</form>
		<br/>
		<table>
			<thead>
				<tr>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Placa</th>
					<th>Cor</th>
					<th>Ano</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			<thead/>
			<tbody>
				@foreach ($carros as $carro)
					<tr>
						<td>{{ $carro->marca }}</td>
						<td>{{ $carro->modelo }}</td>
						<td>{{ $carro->placa }}</td>
						<td>{{ $carro->cor }}</td>
						<td>{{ $carro->ano }}</td>
						<td>
							<a href="/carro/ {{ $carro->id }}/edit">Editar</a>
						</td>
						<td>
							<form action="/carro/ {{$carro->id}}" method="POST">
								@csrf
								<input type="hidden" name="_method" value="delete" />
								<button type="submit">Excluir</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</body>
</html>