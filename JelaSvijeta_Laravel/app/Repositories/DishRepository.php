<?php

namespace App\Repositories;

interface DishRepository {
    public function getDishesByCategoryAndTag($category, $tag);
    public function getDishesByCategoryTagAndIngredients($category, $tag, $ingredients);
}
class DishService {
    private $dishRepository;

    public function __construct(DishRepository $dishRepository) {
        $this->dishRepository = $dishRepository;
    }

    public function getDishesByCategoryAndTag($category, $tag) {
        return $this->dishRepository->getDishesByCategoryAndTag($category, $tag);
    }

    public function getDishesByCategoryTagAndIngredients($category, $tag, $ingredients) {
        return $this->dishRepository->getDishesByCategoryTagAndIngredients($category, $tag, $ingredients);
    }
}