@extends('admin.adminhome')
<!DOCTYPE html>
<html lang="en">
<head>
<base href="/public">
</head>
<body>
    
    @section('content')
    
    
        <div style="position:relative; top:80px" >
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                       
    <form action="{{ route('upload.chefs') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    
    <div class="form-group">
        <label for=""> Chef Name </label>
    <input type="text" name="name" class="form-control"  placeholder="Chef Name">
                  
             </div>
    
    
          <div class="form-group" >
            <label for="">Specialiy</label>
            <input type="text" name="speciality" class="form-control"  placeholder="speciality">
        </div>
          <div class="form-group">
            <label for="">Chef Image</label>
    <input type="file" name="image" class="form-control-file" placeholder="Image">
       </div>
        
    
        <button type="submit" class="btn btn-primary btn-default">Submit</button>
        
    </div>
    
    </form>
                </div>
            </div>
        </div>
        </div>
    
    
    
        <div style="position:relative; top:120px" >
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                    
    
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Chef Name</th>
                                <th scope="col">Chef Speciality</th>
                                <th scope="col">Food Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($chefs as $chef )
                                <tr>
                                    
                                    <td>{{ $chef->name }}</td>
                                    <td>{{ $chef->speciality }}</td>
                                    
                                    
                                    <td> <img src="{{ $chef->image}}" alt="" > </td> 
    
                                    <td> <a href="{{ route('chef.edit',$chef->id) }}" class="btn btn-info">Edit</a> </td> 
                                    <td> <a href="{{ route('chef.delete',$chef->id) }}" class="btn btn-danger">Delete</a> </td> 
    
                                </tr>
                                @endforeach
                               
                                
                              
                             
                            </tbody>
                          </table>
    
                    </div>
                </div>
            </div>
    
    
    @endsection
</body>
</html>