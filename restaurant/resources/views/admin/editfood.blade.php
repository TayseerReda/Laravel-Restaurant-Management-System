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
                   
    <form action="{{ route('foods.update',$foods->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <input type="hidden" name="old_image" value="{{ $foods->image }}">
    
    <div class="form-group">
    <label for=""> Title </label>
    <input type="text" name="title" class="form-control"  placeholder="Title" value="{{$foods->title}}">
              
         </div>
    
    <div class="form-group" >
      <label for="">Description</label>
      <input type="text" name="description" class="form-control"  placeholder="Description" value="{{$foods->description}}">
    
      {{-- <textarea class="form-control"  rows="3" name="description" placeholder="Description" value="{{$foods->description}}"></textarea>   --}}
      </div>
    
      <div class="form-group" >
        <label for="">Price</label>
        <input type="num" name="price" class="form-control"  placeholder="Price" value="{{$foods->price}}">
    </div>
    
    <div class="form-group">
        <label for="">Old Food Image</label>
        
        <img src="{{ $foods->image }}" alt="" width="70" height="70">
    </div>
    
      <div class="form-group">
        <label for="">Upload New Food Image</label>
    <input type="file" name="image" class="form-control-file" placeholder="Upload Image" value="{{ $foods->image }}">
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
