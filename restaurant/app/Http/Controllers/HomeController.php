<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data=Menu::all();
        $chefs=Chef::all();
        return view('home',compact('data','chefs'));
    }
    public function redirects()
    {
        $usertype=Auth::user()->usertype;
        if($usertype==1)
        {
            return view('admin.adminhome');

        }
        else 
        {
            $data=Menu::all();
            $chefs=Chef::all();
            $count=0;
            if(Auth::id())
            {
                $user_id=Auth::id();
                $count=Card::where('user_id',$user_id)->count();
            }
            return view('home',compact('data','chefs','count'));
        }
    }

    public function addtocard(Request $request,$id)
    {
        if(Auth::id())
        {
            $user_id=Auth::id();
            Card::insert([
                'user_id'=>$user_id,
                'menu_id'=>$id,
                'quantity'=>$request->quantity,

            ]);
            return redirect()->back();

           

        }
        else
        {
            return redirect('/login');
        }
    

    }
    public function showcard($id)
    {
        $count=Card::where('user_id',$id)->count();
        $data=Card::where('user_id',$id)->join('menus','cards.menu_id','=','menus.id')->select('cards.id as card_id','cards.quantity as cq','menus.title as mt','menus.price as mp') ->get();
        return view('showcard',compact('count','data'));

    }
    public function deletecard($id)
    {
        Card::find($id)->delete();
        return redirect()->back();

    }
    public function order(Request $request,$id)
    {
        foreach ($request->foodname as $key => $foodname) {
            Order::insert([
                'foodname'=>$foodname,
                'user_id'=>$id,
                'price'=>$request->price[$key],
                'quantity'=>$request->quantity[$key],
                'name'=>$request->name,
                'phone'=>$request->phone,
                'address'=>$request->address,

            ]);

        }
        return redirect()->back();
    }
}

