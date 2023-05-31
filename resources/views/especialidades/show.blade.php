@extends('adminlte::page')

 @section('content')

 <div class="card">

    <div class="card-header">

        <div class="row">
            <div class="col col-md-6"><b>Especialidade Details</b></div>
            <div class="col col-md-6">
                <a href="{{ route('especialidades.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Especialidade Name</b></label>
            <div class="col-sm-10">
                {{ $especialidade-> especialidade_name }}
            </div>
        </div>

    </div>
</div>
@endsection('content')