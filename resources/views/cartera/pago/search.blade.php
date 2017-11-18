{!! Form::open(array('url'=>'pago', 'method'=>'GET', 'autocomplete'=>'off', 'role'=>'search'))!!}
<div class="form-group">
	<div class="input-group">
		<!-- cambiar el tipo de input por number para así evitar ingreso de letras, espacios o caracteres especiales -->
		<input type="number" class="form-control" name="searchText" placeholder="Buscar...." value="{{$searchText}}">
		<!--input type="text" class="form-control" name="searchText" placeholder="Buscar...." value="{{$searchText}}"-->
		<span class="input-group-btn">
		<button type="submit" class="btn btn-primary">Buscar</button>
			
		</span>
	</div>
</div>

{{Form::close()}}
