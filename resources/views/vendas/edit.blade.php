@extends('adminlte::page')
 @section('content')
 <div class="card">
    <div class="card-header">Edit venda</div>
    <div class="card-body">
        <form method="post" action="{{ route('vendas.update', $venda->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Name da comida</label>
                <div class="col-sm-10">
                    <input type="text" name="venda_name" class="form-control" value="{{ $venda->venda_name }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">inf</label>
                <div class="col-sm-10">
                    <input type="text" name="venda_inf" class="form-control" value="{{ $venda->venda_inf }}" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">tipo da comidsa</label>
                <div class="col-sm-10">
                    <select name="venda_tipo" class="form-control">
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
                    <br />
                    <img src="{{ asset('images/' . $venda->venda_image) }}" width="100" class="img-thumbnail" />
                    <input type="hidden" name="hidden_venda_image" value="{{ $venda->venda_image }}" />
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $venda->id }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementsByName('venda_tipo')[0].value = "{{ $venda->venda_tipo }}";
</script>
 @endsection('content')