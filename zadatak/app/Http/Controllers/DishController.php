<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\User;
use Illuminate\Http\Request;



class DishController extends Controller
{
    
    public function index()
    {
        $dishes = Dish::with('category')->paginate(10);
        $categories = Category::with('dishes')->get();

        return view ('dishes.index', compact('dishes','categories'));
    

    }


}
