@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear Nueva Compra</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('purchases.index') }}"> Atras</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> Hubo algunos problemas con los datos ingresados.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



{!! Form::open(array('route' => 'purchases.store','method'=>'POST')) !!}
<div class="row form-group" id="data_1">
    {!! Form::label('fecha', 'Fecha de compra', ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-4">
        <div class="input-group date">
            <span class="input-group-addon">
            	<i class="fa fa-calendar"></i>
            </span>
            {!! Form::text('fecha', null, ['id' => 'fecha', 'class' => 'form-control']) !!}
        </div>
        @error('fecha')
        <span class="text-danger m-b-none">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-lg-9">
        <div id="addProduct">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="producto">Producto</label>
                        <input id="producto" class="form-control eac-square" placeholder="Digite el nombre del producto" name="producto" type="text" value="">
                        <input id="hdnProducto" name="hdnProducto" type="hidden" value="">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">
                    <label for="">Cantidad</label>
                    <input id="cantidadProducto" class="form-control cantidad" disabled name="cantidadProducto" type="text" value="00">
                </div>
                <div class="col-md-4">
                    <label>Precio</label>
                    <div class="input-group m-b">
                        <div class="input-group-prepend">
                            <span class="input-group-addon">$</span>
                        </div>
                        <input id="costoProducto" class="form-control valorMonetario" disabled name="costoProducto" type="text" value="0">
                    </div>
                </div>
                <div class="col-md-4">
                    <label>En Existencias</label>
                    <input id="existenciaMinima" class="form-control" readonly name="existenciaMinima" type="text" value="0">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label>Subtotal</label>
                    <div class="input-group m-b">
                        <div class="input-group-prepend">
                            <span class="input-group-addon">$</span>
                        </div>
                        <input id="precioCompra" class="form-control valorMonetario" disabled name="precioCompra" type="text" value="0">
                    </div>
                </div>
                <div class="col-md-4">
                    <label>Acción</label>
                    <br>
                    <button type="button" id="btnAddProduct" class="btn btn-primary" disabled>
                        <i class="fa fa-shopping-basket"></i> Agregar producto
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

    <!-- data picker -->
    <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.es.min.js') }}"></script>
    <!-- easy-autocompete -->
    <script src="{{ asset('js/plugins/EasyAutocomplete/jquery.easy-autocomplete.js') }}"></script>

    <script>
        // Busqueda de productos
        function baseUrl(url) {
            return "{{ route('BuscarProducto') }}" + url;
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            let user = {{ (Auth::user()->id) }}

                // date picket - formateo de fecha
                $('#data_1 .input-group.date').datepicker({
                    keyboardNavigation: false,
                    language: "es",
                    format: "yyyy-mm-dd",
                    calendarWeeks: true,
                    autoclose: true,
                    todayHighlight: true
                });
        }

    </script>
@endsection
