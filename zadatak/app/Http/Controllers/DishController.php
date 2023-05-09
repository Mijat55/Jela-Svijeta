<?php

namespace App\Http\Controllers;
use App\Services\DishService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DishController extends Controller
{
    private $service;

    public function __construct(DishService $service) {
        $this->service = $service;
    }
    

    public function list(Request $request) {
        $category = $request->query('category');
        $tag = $request->query('tag');

        $dishes = $this->service->getDishesByCategoryAndTag($category, $tag);

        return view('dishes.list', ['dishes' => $dishes]);
    }
    
    public function index(Request $request) {
        $validator = Validator::make($request->all(), [
            'category' => 'nullable|exists:categories,slug',
            'tag' => 'nullable|exists:tags,slug',
            'ingredients' => 'required|array',
            'ingredients.*' => 'exists:ingredients,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        
    $category = $request->input('category');
    $tag = $request->input('tag');
    $ingredients = $request->input('ingredients');

    $dishes = $this->service->getDishesByCategoryTagAndIngredients($category, $tag, $ingredients);

    return view('dishes.index', compact('dishes'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

  
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

   
    public function destroy(string $id)
    {
        //
    }
}