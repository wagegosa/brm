@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Producto</h2>
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


    <form action="{{ route('products.update',$product->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nombre:</strong>
		            <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lote:</strong>
                    <input type="text" name="lote" value="{{ $product->lote }}" class="form-control" placeholder="Lote">
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cantidad:</strong>
                    <input type="text" name="cantidad" value="{{ $product->cantidad }}" class="form-control" placeholder="Cantidad">
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fec. Venci.:</strong>
                    <input type="text" name="fecha_vencimiento" value="{{ $product->fecha_vencimiento }}" class="form-control" placeholder="Fec. Venci.">
                </div>
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="text" name="precio" value="{{ $product->precio }}" class="form-control" placeholder="Precio">
                </div>
            </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Actualizar</button>
		    </div>
		</div>


    </form>


@endsection
