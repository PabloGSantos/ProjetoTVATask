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
    <div class="card-header">Cadastro do Medico</div>
    <div class="card-body">
        <form method="post" action="{{ route('medico.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Nome do Medico</label>
                <div class="col-sm-10">
                    <input type="text" name="medico_name" class="form-control" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="medico_email" class="form-control" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Genero</label>
                <div class="col-sm-10">
                    <select name="medico_gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Image</label>
                <div class="col-sm-10">
                    <input type="file" name="medico_image" />
                </div>
            </div>
            
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Especialidade</label>
                <div class="col-sm-10">
                    <select class="form-control" name="id_especialidade" id="id_especialidade">
                        <option value="{{$medico->relEspecialidades->id ?? ''}}">{{ $medico->relEspecialidades->nome_especialidade ?? 'selecione...'}}</option>
                        @foreach($especialidades as $especialidade)
                        <option value="{{ $especialidade->id }}">{{ $especialidade->especialidade_name }}
                    </option>
                    @endforeach
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>
        </form>
    </div>
</div>
@endsection('content')