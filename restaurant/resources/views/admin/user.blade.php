@extends('admin.adminhome')
@section('content')


<div style="position:relative; top:80px">
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              @if ($user->usertype==0)
              <td> <a href="{{ route('delete', $user->id) }}" class="btn btn-danger">Delete</a> </td> 
              @else
              <td>Not Allowed</td>
              @endif
              
            </tr>
                
            @endforeach
       
        </tbody>
      </table>
</div>



@endsection