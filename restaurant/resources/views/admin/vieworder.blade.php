@extends('admin.adminhome')
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
    </head>
    <body>
    @section('content')
    
    <div style="position:relative; top:80px">
        <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Food Name</th>
                <th scope="col">Food Price</th>
                <th scope="col">Food Quantity</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->phone }}</td>
                  <td>{{ $data->address }}</td>
                  <td>{{ $data->foodname }}</td>
                  <td>{{ $data->price }}</td>
                  <td>{{ $data->quantity }}</td>
                 
                </tr>
                    
            @endforeach
           
            </tbody>
          </table>
    </div>
    
    
    
    @endsection
</body>
</html>
