<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function index(){
        $menu = Menu::build();
        return view('frontend/partial.index')->with('menu', $menu[0]->children);
    }

    public function menu(Request $request){
        $menu = Menu::build();
        return response()->json($menu[0]->children, $menu? 200 : 404);

    }

    public function update(Request $request){
        return response()->json($request);

    }
}
