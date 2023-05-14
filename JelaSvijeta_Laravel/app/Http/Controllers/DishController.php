<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class DishController extends Controller
{
    
    public function index()
    {
        $dishes = Dish::with('category')->paginate(10);
        $categories = Category::with('dishes')->get();

        return view ('dishes.index', compact('dishes','categories'));
    

    }
    function search(Request $request){
        if(isset($_GET['query'])){
            $search_text = $_GET['query'];
            $dishes = Dish::with('dishes')->where('name','LIKE', '%'.$search_text.'%')->paginate(2);
            return view('index',['dishes'=>$dishes]);
           
        }else{
            return view('index');
        }
    }


}
