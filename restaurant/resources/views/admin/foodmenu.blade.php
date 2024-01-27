@extends('admin.adminhome')
@section('content')


    <div style="position:relative; top:80px" >
        <div class="col-lg-12">
            <div class="card card-dark">
                <div class="card-header card-header-border-bottom">
                   
<form action="{{route('addfood')}}" method="POST" enctype="multipart/form-data">
@csrf


<div class="form-group">
    <label for=""> Title </label>
<input type="text" name="title" class="form-control"  placeholder="Title">
              
         </div>

    <div class="form-group" >
      <label for="">Description</label>
      <textarea class="form-control"  rows="3" name="description" placeholder="Description"></textarea>  
      </div>

      <div class="form-group" >
        <label for="">Price</label>
        <input type="num" name="price" class="form-control"  placeholder="Price">
    </div>
      <div class="form-group">
        <label for="">Upload Food Image</label>
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
                            <th scope="col">Food Tiltle</th>
                            <th scope="col">Food Description</th>
                            <th scope="col">Food Price</th>
                            <th scope="col">Food Image</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($foods as $food )
                            <tr>
                                
                                <td>{{ $food->title }}</td>
                                <td>{{ $food->description }}</td>
                                <td>{{ $food->price }}</td>
                                
                                <td> <img src="{{ $food->image}}" alt="" > </td> 

                                <td> <a href="{{ route('foods.edit',$food->id) }}" class="btn btn-info">Edit</a> </td> 

                                <td> <a href="{{ route('foods.delete',$food->id) }}" class="btn btn-danger">Delete</a> </td> 

                            </tr>
                            @endforeach
                           
                            
                          
                         
                        </tbody>
                      </table>

                </div>
            </div>
        </div>


@endsection