<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Dish extends Model 
{
   
    
   
    use HasFactory;
    

    protected $fillable = ['name', 'description', 'image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    

}
