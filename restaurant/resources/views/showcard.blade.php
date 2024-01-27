
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
        @include('head')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
<body>
    @include('header')
    
<div style="position:relative; top:150px">
<form action="{{ route("confirm.order",Auth::id()) }}" method="POST">
@csrf
<table class="table" align="center" style="width: 50%" >
    <thead>
      <tr>
        <th scope="col">Item</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $data)
        <tr>
          
         <input type="text" hidden name="foodname[]" value="{{ $data->mt }}">
          <td>{{ $data->mt }}</td>

          <input type="integer" hidden name="quantity[]" value="{{ $data->cq }}">
          <td>{{ $data->cq }}</td>

          <input type="string" hidden name="price[]" value="{{ $data->mp }}">
          <td>{{ $data->mp }}</td>
          <td> <a href="{{ route('card.delete',$data->card_id) }}" class="btn btn-danger">Delete</a> </td> 
          
        </tr>
        @endforeach
      
    </tbody>
  </table>
<div align="center" style="padding: 10px">
<button type="button" class="btn btn-primary" id="order">Oder Now</button>
</div>





  <div align="center" style="padding: 10px; display:none" id="appear">
      
      
      <div class="form-group col-md-6">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name">
      </div>
      
      <div class="form-group col-md-6">
        <label for="">Email</label>
        <input type="email" class="form-control"  name="email">
      </div>
      
      <div class="form-group col-md-6">
        <label for="">Phone Number</label>
        <input type="text" class="form-control"  name="phone">
      </div>
      
      <div class="form-group col-md-6">
        <label for="">Address</label>
        <input type="text" class="form-control"  name="address">
      </div>
      
      
      
      <button type="submit" class="btn btn-success">confirm Order</button>
        <button  class="btn btn-danger" id="close">cancel Order</button>

      </form>



      <script>
        $("#order").click(
            function()
            {
                $("#appear").show();
            }
        )

        $("#close").click(
            function()
            {
                $("#appear").hide();
            }
        )



      </script>
</body>
</html>