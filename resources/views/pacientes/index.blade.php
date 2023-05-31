@extends('adminlte::page')
@section('content')
@if($message = Session::get('success'))
          <div class="alert alert-success">
               {{ $message }}
           </div>
@endif
<div class="card">
      <div class="card-header">
            <div class="row">
                 <div class="col col-md-6"><b>Paciente Data</b></div>
                 <div class="col col-md-6">
                    <a href="{{ route('paciente.create') }}" class="btn btn-success btn-sm float-end">Add</a>
                 </div>
            </div>
       </div>
      <div class="card-body">
               <table class="table table-bordered">
         <tr>
             <th>Image</th>
             <th>Name</th>
             <th>Email</th>
             <th>Gender</th>
             <th>Action</th>
       </tr>
@if(count($data) > 0)

@foreach($data as $row)

<tr>
         <td><img src="{{ asset('images/' . $row->paciente_image) }}" width="75" /></td>
         <td>{{ $row->paciente_name }}</td>
          <td>{{ $row->paciente_email }}</td>
          <td>{{ $row->paciente_gender }}</td>
          <td>
        <form method="post" action="{{ route('pacientes.destroy', $row->id) }}">
         @csrf
         @method('DELETE')
              <a href="{{ route('paciente.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
              <a href="{{ route('paciente.edit', $row->id) }}"   class="btn btn-warning btn-sm">Edit</a>
               <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
         </form>
      </td>
</tr>

@endforeach

@else
     <tr>
         <td colspan="5" class="text-center">No Data Found</td>
     </tr>
@endif
   </table>
        {!! $data->links() !!}
    </div>
</div>

@endsection