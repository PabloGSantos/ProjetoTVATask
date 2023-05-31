@extends('adminlte::page')
 @section('content')
 <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Medico Details</b></div>
            <div class="col col-md-6">
                <a href="{{ route('medicos.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Medico Name</b></label>
            <div class="col-sm-10">
                {{ $medico->medico_name }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Medico Email</b></label>
            <div class="col-sm-10">
                {{ $medico->medico_email }}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-label-form"><b>Medico Gender</b></label>
            <div class="col-sm-10">
                {{ $medico->medico_gender }}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-label-form"><b>Medico Image</b></label>
            <div class="col-sm-10">
                <img src="{{ asset('images/' .  $medico->medico_image) }}" width="200" class="img-thumbnail" />
            </div>
        </div>
    </div>
</div>
@endsection('content')