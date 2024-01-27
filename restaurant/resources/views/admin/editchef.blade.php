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
                   
    <form action="{{ route('chef.update',$chef->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <input type="hidden" name="old_image" value="{{ $chef->image }}">
    
    <div class="form-group">
    <label for=""> Name </label>
    <input type="text" name="name" class="form-control"  placeholder="Chef Name" value="{{$chef->name}}">
              
         </div>
    
    <div class="form-group" >
      <label for="">Speciality</label>
      <input type="text" name="speciality" class="form-control"  placeholder="Description" value="{{$chef->speciality}}">
    
      {{-- <textarea class="form-control"  rows="3" name="description" placeholder="Description" value="{{$foods->description}}"></textarea>   --}}
      </div>
    
    
    <div class="form-group">
        <label for="">Old Food Image</label>
        
        <img src="{{ $chef->image }}" alt="" width="70" height="70">
    </div>
    
      <div class="form-group">
        <label for="">Upload New chef Image</label>
    <input type="file" name="image" class="form-control-file" placeholder="Upload Image" value="{{ $chef->image }}">
    </div>
    
    
    <button type="submit" class="btn btn-primary btn-default">Submit</button>
    
    </div>
    
    </form>
            </div>
        </div>
    </div>
    </div>
    @endsection
</body>
</html>
