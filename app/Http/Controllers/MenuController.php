<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function welcome(){
        $menus=menu::all();
        return view('welcome',compact('menus'));
    }

    public function store(Request $request){
    menu::create([
        'menuName' => $request->menuname,
        'menuDesc'=>$request->menudesc,
        'menuPrice'=> $request->menuprice,
        'menuDateAdded'=> $request->menudate,
        'category_id'=> $request->categoryname
    ]);
    return redirect(route('welcome'));
    }


    public function createMenu(){
        $categories=category::all();
        return view('createMenu',compact('categories'));
    }
}
