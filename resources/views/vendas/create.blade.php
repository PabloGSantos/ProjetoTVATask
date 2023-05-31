@extends('adminlte::page')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
 
@endif
<div class="card">
    <div class="card-header">add cardapio</div>
    <div class="card-body">
        <form method="post" action="{{ route('vendas.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Nome da comida</label>
                <div class="col-sm-10">
                    <input type="text" name="venda_name" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">inf</label>
                <div class="col-sm-10">
                    <input type="text" name="venda_inf" class="form-control" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">tipo da comida</label>
                <div class="col-sm-10">
                    <select name="comida_tipo" class="form-control">
                        <option value="Bebida">Bebida</option>
                        <option value="Lanche">Lanche</option>
                        <option value="Sobremesa">Sobremesa</option>
                        <option value="Massas">Massas</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Image da comida</label>
                <div class="col-sm-10">
                    <input type="file" name="venda_image" />
                </div>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>
@endsection('content')