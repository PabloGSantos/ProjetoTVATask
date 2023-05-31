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
                 <div class="col col-md-6"><b>Venda Data</b></div>
                 <div class="col col-md-6">
                    <a href="{{ route('vendas.create') }}" class="btn btn-success btn-sm float-end">Add</a>
                 </div>
            </div>
       </div>
      <div class="card-body">
               <table class="table table-bordered">
         <tr>
             <th>Image</th>
             <th>Name</th>
             <th>inf</th>
             <th>tipo</th>
             <th>Action</th>
       </tr>
@if(count($data) > 0)
@foreach($data as $row)
<tr>
         <td><img src="{{ asset('images/' . $row->venda_image) }}" width="75" /></td>
         <td>{{ $row->venda_name }}</td>
          <td>{{ $row->venda_inf }}</td>
          <td>{{ $row->venda_tipo }}</td>
          <td>
        <form method="post" action="{{ route('vendas.destroy', $row->id) }}">
         @csrf
         @method('DELETE')
              <a href="{{ route('vendas.show', $row->id) }}" class="btn btn-primary btn-sm">View</a>
              <a href="{{ route('vendas.edit', $row->id) }}"   class="btn btn-warning btn-sm">Edit</a>
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