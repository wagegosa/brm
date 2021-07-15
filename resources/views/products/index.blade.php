@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products</h2>
        </div>
        <div class="pull-right">
            @can('product-create')
            <a class="btn btn-success" href="{{ route('products.create') }}"> Creae Nuevo Producto</a>
            @endcan
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
        <th>Lote</th>
        <th>Cantidad</th>
        <th>Fec. Venci.</th>
        <th>Precio</th>
        {{--  <th>Proveedor</th>  --}}
        <th width="280px">Acción</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->nombre }}</td>
        <td>{{ $product->lote }}</td>
        <td>{{ $product->cantidad }}</td>
        <td>{{ $product->fecha_vencimiento }}</td>
        <td>{{ $product->precio }}</td>
        {{--  <td>{{ $product->name }}</td> --}}

        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Mostrar</a>
                @can('product-edit')
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>
                @endcan


                @csrf
                @method('DELETE')
                @can('product-delete')
                <button type="submit" class="btn btn-danger">Eliminar</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>


{!! $products->links() !!}


@endsection