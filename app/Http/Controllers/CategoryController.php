<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index() : View{
        $categories = Category::withCount('articles')->get();

        return view('categories-list',['categories'=>$categories]);
    }
  
  
    //Comptage des articles par catégorie

}

