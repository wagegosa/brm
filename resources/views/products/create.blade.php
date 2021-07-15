@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Agregar Nuevo Producto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Atras</a>
        </div>
    </div>
</div>


@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> Hubo algunos problemas con su entrada.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{ route('products.store') }}" method="POST">
    @csrf


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lote:</strong>
                <input type="text" name="lote" class="form-control" placeholder="Lote">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cantidad:</strong>
                <input type="text" name="cantidad" class="form-control" placeholder="Cantidad">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fec. Venci.:</strong>
                <input type="text" name="fecha_vencimiento" class="form-control" placeholder="Fec. Venci.">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Precio:</strong>
                <input type="text" name="precio" class="form-control" placeholder="Precio">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>


</form>


@endsection