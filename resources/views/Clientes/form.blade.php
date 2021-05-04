<div class= "form-group">

<label for="Nombres" class = "control-label">{{'Nombres'}}</label>
<input type="text" class = "form-control {{$errors->has('Nombres')?'is-invalid':''}}" name="Nombres" id="Nombres" 
value=" {{isset($cliente->Nombres)?$cliente->Nombres:old('Nombres')}} " >

{!!  $errors->first('Nombres','<div class ="invalid-feedback">:message</div>') !!}


<div class= "form-group">
<label for="Apellidos" class = "control-label">{{'Apellidos'}}</label>
<input type="text" class = "form-control {{$errors->has('Nombres')?'is-invalid':''}}" name="Apellidos" id="Apellidos" 
value=" {{isset($cliente->Nombres)?$cliente->Apellidos:old('Apellidos')}}" >
</div>

{!!  $errors->first('Apellidos','<div class ="invalid-feedback">:message</div>') !!}

<div class= "form-group">
<label for="Telefono" class = "control-label">{{'Telefono'}}</label>
<input type="text" class = "form-control {{$errors->has('Nombres')?'is-invalid':''}}"name="Telefono" id="Telefono" 
value=" {{isset($cliente->Nombres)?$cliente->Telefono:old('Telefono')}}" >
</div>

{!!  $errors->first('Telefono','<div class ="invalid-feedback">:message</div>') !!}
<div class= "form-group">
<label for="Correo"class = "control-label">{{'Correo'}}</label>
<input type="email" class = "form-control {{$errors->has('Nombres')?'is-invalid':''}}" name="Correo" id="Correo" 
value=" {{isset($cliente->Nombres)?$cliente->Correo:old('Correo')}}" >
</div>

{!!  $errors->first('Correo','<div class ="invalid-feedback">:message</div>') !!}

<div class= "form-group">
<label for="Direccion" class = "control-label">{{'Direccion'}}</label>
<input type="text" class = "form-control {{$errors->has('Nombres')?'is-invalid':''}}" name="Direccion" id="Direccion" 
value=" {{isset($cliente->Nombres)?$cliente->Direccion:old('Direccion')}}" >
</div>

{!!  $errors->first('Apellidos','<div class ="invalid-feedback">:message</div>') !!}

<div class= "form-group">
<label for="Foto"class = "control-label">{{'Foto'}}</label>
@if(isset($cliente->Foto))
<br/>
<img   class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$cliente->Foto}}" alt="" width="200" >
<br/>
@endif

<input class = "form-control {{$errors->has('Foto')?'is-invalid':''}}"type="file" name="Foto" id="Foto" value="" >
{!!  $errors->first('Foto','<div class ="invalid-feedback">:message</div>') !!}
</div>

<input type ="submit" class= "btn btn-success" value="{{$Modo=='Crear' ? 'Agregar':'Editar'}}"> 
<a class= "btn btn-primary" href="{{url('clientes')}}">Regresar</a>
