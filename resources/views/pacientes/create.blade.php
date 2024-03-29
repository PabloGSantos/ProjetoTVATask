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

    <div class="card-header">Add medico</div>

    <div class="card-body">

        <form method="post" action="{{ route('paciente.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="row mb-3">

                <label class="col-sm-2 col-label-form">Paciente Name</label>

                <div class="col-sm-10">

                    <input type="text" name="paciente_name" class="form-control" />

                </div>

            </div>

            <div class="row mb-3">

                <label class="col-sm-2 col-label-form">Paciente Email</label>

                <div class="col-sm-10">

                    <input type="text" name="paciente_email" class="form-control" />

                </div>

            </div>

            <div class="row mb-4">

                <label class="col-sm-2 col-label-form">Paciente Gender</label>

                <div class="col-sm-10">

                    <select name="paciente_gender" class="form-control">

                        <option value="Male">Male</option>

                        <option value="Female">Female</option>

                    </select>

                </div>

            </div>

            <div class="row mb-4">

                <label class="col-sm-2 col-label-form">Paciente Image</label>

                <div class="col-sm-10">

                    <input type="file" name="paciente_image" />

                </div>

            </div>

            <div class="text-center">

                <input type="submit" class="btn btn-primary" value="Add" />

            </div>

        </form>

    </div>

</div>

@endsection('content')