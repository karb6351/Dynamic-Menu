<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function index(){
        $menu = Menu::getTree();
        return view('frontend/partial.index')->with([
            'menu' => $menu[0]->children,
            'maxDepth' => Menu::MAX_DEPTH
        ]);
    }

    public function menu(Request $request){
        $menu = Menu::getTree();
        return response()->json($menu[0]->children, $menu? 200 : 500);

    }

    public function update(Request $request){
        $parseTree = ($request->all());
        $root = Menu::whereIsRoot()->get();
        if(Menu::rebuild($parseTree, $root[0]))
            return response()->json(['message' => 'success'],200);
        else
            return response()->json(['message' => 'fail'], 500);
    }
}
