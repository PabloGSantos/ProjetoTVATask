@extends('adminlte::page')

 @section('content')

 <div class="card">
    <div class="card-header">Edit Especialidade</div>
    <div class="card-body">
        <form method="post" action="{{ route('especialidades.update', $especialidade->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Especialidade Name</label>
                <div class="col-sm-10">
                    <input type="text" name="especialidade_name" class="form-control" value="{{ $especialidade->especialidade_name }}" />
                </div>
            </div>

            <div class="row mb-3">

                <label class="col-sm-2 col-label-form">Especialidade Email</label>

                <div class="col-sm-10">

                    <input type="text" name="especialidade_email" class="form-control" value="{{ $especialidade->especialidade_email }}" />

                </div>

            </div>

            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{$especialidade->id }}" />
                <input type="submit" class="btn-primary" value="Edit" />
            </div>
        </form>
    </div>
</div>
 @endsection('content')