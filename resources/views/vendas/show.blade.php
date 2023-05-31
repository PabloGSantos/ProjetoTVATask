@extends('adminlte::page')
 @section('content')
 <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Venda Details</b></div>
            <div class="col col-md-6">
                <a href="{{ route('vendas.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Comida Name</b></label>
            <div class="col-sm-10">
                {{ $venda->venda_name }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Venda inf</b></label>
            <div class="col-sm-10">
                {{ $vanda->venda_inf }}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-label-form"><b>Venda tipo</b></label>
            <div class="col-sm-10">
                {{ $venda->venda_tipo }}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-label-form"><b>Comida Image</b></label>
            <div class="col-sm-10">
                <img src="{{ asset('images/' .  $venda->venda_image) }}" width="200" class="img-thumbnail" />
            </div>
        </div>
    </div>
</div>
@endsection('content')