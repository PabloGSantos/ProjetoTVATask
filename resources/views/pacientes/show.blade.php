@extends('adminlte::page')

 @section('content')

 <div class="card">

    <div class="card-header">

        <div class="row">

            <div class="col col-md-6"><b>Paciente Details</b></div>

            <div class="col col-md-6">

                <a href="{{ route('pacientes.index') }}" class="btn btn-primary btn-sm float-end">View All</a>

            </div>

        </div>

    </div>

    <div class="card-body">

        <div class="row mb-3">

            <label class="col-sm-2 col-label-form"><b>Paciente Name</b></label>

            <div class="col-sm-10">

                {{ $paciente->paciente_name }}

            </div>

        </div>

        <div class="row mb-3">

            <label class="col-sm-2 col-label-form"><b>Paciente Email</b></label>

            <div class="col-sm-10">

                {{ $paciente->paciente_email }}

            </div>

        </div>

        <div class="row mb-4">

            <label class="col-sm-2 col-label-form"><b>Paciente Gender</b></label>

            <div class="col-sm-10">

                {{ $paciente->paciente_gender }}

            </div>

        </div>

        <div class="row mb-4">

            <label class="col-sm-2 col-label-form"><b>Paciente Image</b></label>

            <div class="col-sm-10">

                <img src="{{ asset('images/' .  $paciente->paciente_image) }}" width="200" class="img-thumbnail" />

            </div>

        </div>

    </div>

</div>

@endsection('content')