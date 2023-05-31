@extends('adminlte::page')
 @section('content')
 <div class="card">
    <div class="card-header">Edit Medico</div>
    <div class="card-body">
        <form method="post" action="{{ route('medicos.update', $medico->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Medico Name</label>
                <div class="col-sm-10">
                    <input type="text" name="medico_name" class="form-control" value="{{ $medico->medico_name }}" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Medico Email</label>
                <div class="col-sm-10">
                    <input type="text" name="medico_email" class="form-control" value="{{ $medico->medico_email }}" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Medico Gender</label>
                <div class="col-sm-10">
                    <select name="medico_gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Medico Image</label>
                <div class="col-sm-10">
                    <input type="file" name="medico_image" />
                    <br />
                    <img src="{{ asset('images/' . $medico->medico_image) }}" width="100" class="img-thumbnail" />
                    <input type="hidden" name="hidden_medico_image" value="{{ $medico->medico_image }}" />
                </div>
            </div>
            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Especialidade</label>
                <div class="col-sm-10">

                <select class="form-control" name="id_especialidade" id="id_especialidade">
                    <option value="{{$medico->relEspecialidades-id ?? ''}}">{{ $medico->relEspecialidades->nome_especialidade ?? 'selecione...'}}</option>
                    @foreach($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}">{{ $especialidade->especialidade_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $medico->id }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementsByName('medico_gender')[0].value = "{{ $medico->medico_gender }}";
</script>
 @endsection('content')