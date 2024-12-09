<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\menu;
use Illuminate\Http\Request;

class MenuApiController extends Controller
{
    public function index(){
        $menus = menu::all();
        return response()->json([
        'success'=>true,
        'menu_data'=>$menus],200);
    }
    public function save(Request $request){
        $Menu = new Menu;

        try{
            $Menu->menuName = $request->menuName;
            $Menu->menuDesc = $request->menuDesc;
            $Menu->menuPrice = $request->menuPrice;
            $Menu->menuDateAdded = $request->menuDateAdded;
            $Menu->category_id = $request->category_id;
            $Menu->image = "this is file dummy";
            $Menu->save();
        }catch(\Exception $e){
            return response()->json(['error'=>$e->getMessage()],500);
        }
        return response()->json([
            'success'=>true,
            'menu_data'=>$Menu
        ]);
    }

    public function update($id,Request $request){
        $MenuToUpdate = menu::find($id);

        $MenuToUpdate->menuDesc = $request->menuDesc;
        $MenuToUpdate->menuPrice = $request->menuPrice;

        $MenuToUpdate->save();

        return response()->json([
            'success'=>true,
            'message'=>'Menu has been updated successfully',
            'new_menu_data'=>$MenuToUpdate
        ],200);
    }
    public function delete($id){
        $Menu = Menu::find($id);
        $Menu->delete();
        return response()->json([
            'success'=>true,
            'message'=> 'Menu Has been deleted successfully'
        ],200);
    }
}
