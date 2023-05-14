<?php
namespace App\Services;
use App\Models\Dish;
use Illuminate\Support\Facades\DB;

class EloquentDishRepository implements DishService {
    public function getDishesByCategoryAndTag($category, $tag) {
        $query = Dish::select('dishes.id', 'dishes.name', 'dishes.description', 'categories.name as category_name')
            ->leftJoin('categories', 'dishes.category_id', '=', 'categories.id')
            ->where(function($query) use ($category) {
                if ($category) {
                    $query->where('categories.slug', '=', $category);
                } else {
                    $query->whereNull('categories.id');
                }
            })
            ->whereHas('tags', function($query) use ($tag) {
                $query->where('tags.slug', '=', $tag);
            })
            ->with(['translations', 'ingredients', 'tags']);

        return $query->get();
    }
    public function getDishesByCategoryTagAndIngredients($category, $tag, $ingredients) {
        $query = DB::table('dishes')
            ->join('dish_translations', 'dishes.id', '=', 'dish_translations.dish_id')
            ->join('category_dish', 'dishes.id', '=', 'category_dish.dish_id')
            ->join('categories', 'category_dish.category_id', '=', 'categories.id')
            ->join('dish_tag', 'dishes.id', '=', 'dish_tag.dish_id')
            ->join('tags', 'dish_tag.tag_id', '=', 'tags.id')
            ->join('dish_ingredient', 'dishes.id', '=', 'dish_ingredient.dish_id')
            ->join('ingredients', 'dish_ingredient.ingredient_id', '=', 'ingredients.id');

        $query->where('dish_translations.locale', app()->getLocale());

        if (!empty($category)) {
            $query->where('categories.slug', $category);
        }

        if (!empty($tag)) {
            $query->where('tags.slug', $tag);
        }

        $query->whereIn('ingredients.id', $ingredients);

        $dishes = $query->get();

        return $dishes;
    }
}