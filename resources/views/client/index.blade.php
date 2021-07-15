extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestión de Clientes</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('clients.create') }}"> Crear Nuevo Cliente</a>
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
    @foreach ($data as $key => $client)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $client->nombre }}</td>
        <td>{{ $client->email }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('clients.show',$client->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ route('clients.edit',$client->id) }}">Editar</a>
            {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $client->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
</table>


{!! $data->render() !!}

@endsection