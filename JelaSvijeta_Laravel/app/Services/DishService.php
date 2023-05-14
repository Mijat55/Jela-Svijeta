<?php

namespace App\Services;

use App\Repositories\DishRepository;
use App\Models\Dish;

class DishService
{
    protected $dishRepository;

    public function __construct(DishRepository $dishRepository)
    {
        $this->dishRepository = $dishRepository;
    }

    public function getDishesByCategoryAndTag($category, $tag,)
    {
        return $this->dishRepository->getDishesByCategoryAndTag($category, $tag,);
    }
    public function getDishesByCategoryTagAndIngredients($category, $tag, $ingredients)
{
    $query = Dish::query();

    if ($category) {
        $query->whereHas('categories', function ($q) use ($category) {
            $q->where('slug', $category);
        });
    }

    if ($tag) {
        $query->whereHas('tags', function ($q) use ($tag) {
            $q->where('slug', $tag);
        });
    }

    if ($ingredients) {
        $query->whereHas('ingredients', function ($q) use ($ingredients) {
            $q->whereIn('id', $ingredients);
        }, '=', count($ingredients));
    }

    return $query->get();
}

}
