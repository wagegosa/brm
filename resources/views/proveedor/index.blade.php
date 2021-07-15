extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestión de Usuarios</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('proveedors.create') }}"> Crear Nuevo Usuario</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nombre</th>
        <th>Email</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $proveedor)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $proveedor->nombre }}</td>
        <td>{{ $proveedor->email }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('proveedors.show',$proveedor->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ route('proveedors.edit',$proveedor->id) }}">Editar</a>
            {!! Form::open(['method' => 'DELETE','route' => ['proveedors.destroy',
            $proveedor->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>


{!! $data->render() !!}

@endsection