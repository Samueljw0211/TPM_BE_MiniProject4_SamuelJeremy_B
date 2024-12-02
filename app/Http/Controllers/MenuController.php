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

        $request->validate([
            'menuname'=>'required|min:5',
            'menudesc'=>'required|min:10',
            'menuprice'=> 'required|numeric',
            'menudate'=> 'required|date',
            'image'=> 'required|mimes:png,jpg'
        ]);

        $filePath = public_path('storage/images');
        $file = $request->file('image');
        $fileName = $request->menuname.'.'.$file->getClientOriginalName();
        $file->move($filePath,$fileName);

        menu::create([
        'menuName' => $request->menuname,
        'menuDesc'=>$request->menudesc,
        'menuPrice'=> $request->menuprice,
        'menuDateAdded'=> $request->menudate,
        'category_id'=> $request->categoryname,
        'image'=> $fileName
    ]);
    return redirect(route('welcome'));
    }


    public function createMenu(){
        $categories=category::all();
        return view('createMenu',compact('categories'));
    }

    public function editMenu($id){
        $menu =menu::findOrFail($id);
        return view('editMenu',compact('menu'));
    }
    public function updateMenu($id, Request $request){
        $menu =menu::findOrFail($id);

            $request->validate([
                'menuname'=>'required|min:5',
                'menudesc'=>'required|min:10',
                'menuprice'=> 'required|numeric',
                'menudate'=> 'required|date',
                'image'=> 'nullable|mimes:png,jpg'
            ]);

            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if ($menu->image) {
                    $oldImagePath = public_path('storage/images/' . $menu->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath); // Remove the old image file
                    }
                }

                // Handle the new image upload
                $file = $request->file('image');
                $fileName = $request->menuname . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage/images'), $fileName);
            }else{
                $fileName = $menu->image;
            }

            //

        $menu->update([
        'menuName' => $request->menuname,
        'menuDesc'=>$request->menudesc,
        'menuPrice'=> $request->menuprice,
        'menuDateAdded'=> $request->menudate,
        'image'=> $fileName
        ]);


        return redirect(route('welcome'));
    }

    public function deleteMenu($id){
        menu::destroy($id);

        return redirect(route('welcome'));
    }
}
