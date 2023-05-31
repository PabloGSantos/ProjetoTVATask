@extends('adminlte::page')

 @section('content')

 <div class="card">

    <div class="card-header">Edit Professor</div>

    <div class="card-body">

        <form method="post" action="{{ route('professors.update', $professor->id) }}" enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="row mb-3">

                <label class="col-sm-2 col-label-form">Professor Name</label>

                <div class="col-sm-10">

                    <input type="text" name="professor_name" class="form-control" value="{{ $professor->professor_name }}" />

                </div>

            </div>

            <div class="row mb-3">

                <label class="col-sm-2 col-label-form">Professor Email</label>

                <div class="col-sm-10">

                    <input type="text" name="professor_email" class="form-control" value="{{ $professor->professor_email }}" />

                </div>

            </div>

            <div class="row mb-4">

                <label class="col-sm-2 col-label-form">Professor Gender</label>

                <div class="col-sm-10">

                    <select name="professor_gender" class="form-control">

                        <option value="Male">Male</option>

                        <option value="Female">Female</option>

                    </select>

                </div>

            </div>

            <div class="row mb-4">

                <label class="col-sm-2 col-label-form">Professor Image</label>

                <div class="col-sm-10">

                    <input type="file" name="professor_image" />

                    <br />

                    <img src="{{ asset('images/' . $professor->professor_image) }}" width="100" class="img-thumbnail" />

                    <input type="hidden" name="hidden_professor_image" value="{{ $professor->professor_image }}" />

                </div>

            </div>

            <div class="text-center">

                <input type="hidden" name="hidden_id" value="{{ $professor->id }}" />

                <input type="submit" class="btn btn-primary" value="Edit" />

            </div>

        </form>

    </div>

</div>

<script>

    document.getElementsByName('professor_gender')[0].value = "{{ $professor->professor_gender }}";

</script>

 @endsection('content')