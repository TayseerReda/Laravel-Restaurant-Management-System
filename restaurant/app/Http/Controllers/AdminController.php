<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $users=User::all();
        return view('admin.user',compact("users"));
    }
    public function deleteuser($id)
    {
        $data=User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenue()
    {
        $foods=Menu::all();
        return view('admin.foodmenu',compact('foods'));

    }
    public function addfood(Request $request)
    {
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $image->move('images/foods',$imagename);
        


        Menu::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'image'=>'images/foods'.'/'.$imagename,
        ]);
        return redirect()->back();

    }

    public function deletefood($id)
    {
        $food=Menu::find($id);
        $food->delete();
        return redirect()->back();

    }
    public function editfood($id)
    {
        $foods=Menu::find($id);
        return view('admin.editfood',compact('foods'));
        
    }
    public function updatefood(Request $request,$id)
    {
        $old_image = $request->old_image;
        $image=$request->file('image');
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $image->move('images/foods',$imagename);
            unlink($old_image);
            Menu::find($id)->update([
                'image'=>'images/foods'.'/'.$imagename,
            ]);

        }
        Menu::find($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);
        return redirect()->back(); 
    }


    public function insert_reservation(Request $request)
    {
        
      
        Reservation::insert([
            'name'=>request()->name,
            'email'=>request()->email,
            'phone'=>request()->phone,
            'date'=>request()->date,
            'time'=>request()->time,
            'guest'=>request()->guest,
            'message'=>request()->message,
        ]);
        return redirect()->back();

    }

    public function view_reservation()
    {
        $data=Reservation::all();
        return view('admin.viewreservation',compact('data'));
    }


    public function chefs()
    {
        $chefs=Chef::all();
        return view("admin.controlchefs",compact('chefs'));
    }

    public function upload_chef(Request $request)
    {
       
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $image->move('images/foods',$imagename);
        


        Chef::insert([
            'name'=>$request->name,
            'speciality'=>$request->speciality,
            'image'=>'images/foods'.'/'.$imagename,
        ]);
        return redirect()->back();

    }
    
    public function deletechef($id)
    {
        $chef=Chef::find($id);
        $chef->delete();
        return redirect()->back();
    }

    public function editchef($id)
    {
        $chef=Chef::find($id);
        return view('admin.editchef',compact('chef'));
    }
    public function updatechef(Request $request,$id)
    {
        $old_img=$request->old_image;
        $new_image=$request->file('image');
        
        if($new_image)
        {

            $imagename=time().'.'.$new_image->getClientOriginalExtension();
            $new_image->move('images/foods',$imagename);
            unlink($old_img);
            Chef::find($id)->update([
                'image'=>'images/foods'.'/'.$imagename,
            ]);
        }
        Chef::find($id)->update([
            'name'=>request()->name,
            'speciality'=>request()->speciality,
        ]);


        return redirect()->back();
    }


    public function view_order()
    {
        $data=Order::all();
        return view('admin.vieworder',compact('data'));
    }

}
