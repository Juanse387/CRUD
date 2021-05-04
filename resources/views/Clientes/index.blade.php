@extends('layouts.app')

@section('content')

<div class="container">
@if(Session::has('Mensaje'))

<div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
</div>

@endif

<a href="{{url('clientes/create')}}" class = "btn btn-success">Agregar empleado</a>
<br/>
<br/>

<table class="table table-light table-hover ">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombres Completos</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    
    @foreach ($clientes as $cliente)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td> 
            <img  src="{{asset('storage').'/'.$cliente->Foto}}" class="img-thumbnail img-fluid" alt="" width="100" >
            </td>
            <td> {{$cliente->Nombres}} {{$cliente->Apellidos}}</td>
            <td> {{$cliente->Telefono}} </td>
            <td> {{$cliente->Direccion}} </td>
            <td> {{$cliente->Correo}} </td>
            <td>             
            <a class ="btn btn-warning" href=" {{url('/clientes/'.$cliente->id.'/edit')}} ">
            Editar
            </a>
                       
            <form method="post" action=" {{url('/clientes/'.$cliente->id)}} " style ="display:inline">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button class ="btn btn-danger" type="submit" onclick ="return confirm('¿Desea borrar el registro?');">Borrar</Button>

                
            </form>

             </td>
        </tr>
    @endforeach    
    </tbody>
</table>


{{ $clientes->links() }}

</div>
@endsection