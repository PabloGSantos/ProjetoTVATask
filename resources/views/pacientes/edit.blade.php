@extends('adminlte::page')

 @section('content')

 <div class="card">

    <div class="card-header">Edit Paciente</div>

    <div class="card-body">

        <form method="post" action="{{ route('pacientes.update', $paciente->id) }}" enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="row mb-3">

                <label class="col-sm-2 col-label-form">Paciente Name</label>

                <div class="col-sm-10">

                    <input type="text" name="paciente_name" class="form-control" value="{{ $paciente->paciente_name }}" />

                </div>

            </div>

            <div class="row mb-3">

                <label class="col-sm-2 col-label-form">Paciente Email</label>

                <div class="col-sm-10">

                    <input type="text" name="paciente_email" class="form-control" value="{{ $paciente->paciente_email }}" />

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

                    <br />

                    <img src="{{ asset('images/' . $paciente->paciente_image) }}" width="100" class="img-thumbnail" />

                    <input type="hidden" name="hidden_paciente_image" value="{{ $paciente->paciente_image }}" />

                </div>

            </div>

            <div class="text-center">

                <input type="hidden" name="hidden_id" value="{{ $paciente->id }}" />

                <input type="submit" class="btn btn-primary" value="Edit" />

            </div>

        </form>

    </div>

</div>

<script>

    document.getElementsByName('paciente_gender')[0].value = "{{ $paciente->paciente_gender }}";

</script>

 @endsection('content')