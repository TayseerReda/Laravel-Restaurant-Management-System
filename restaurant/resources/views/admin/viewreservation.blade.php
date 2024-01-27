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
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Number Of Guests</th>
                <th scope="col">Message</th>
    
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                <tr>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->phone }}</td>
                  <td>{{ $data->date }}</td>
                  <td>{{ $data->time }}</td>
                  <td>{{ $data->guest }}</td>
                  <td>{{ $data->message }}</td>
                </tr>
                    
                @endforeach
           
            </tbody>
          </table>
    </div>
    
    
    
    @endsection
</body>
</html>
