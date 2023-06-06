<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    // public function showCategories()
    // {
    //     $categories = Category::all();
    //     $categoryTree = $this->buildCategoryTree($categories);

    //     return view('your-view-name', compact('categoryTree'));
    // }

    // private function buildCategoryTree($categories, $parentId = null)
    // {
    //     $categoryTree = [];

    //     foreach ($categories as $category) {
    //         if ($category->parent_category_id === $parentId) {
    //             $subcategory = $this->buildCategoryTree($categories, $category->id);
    //             $category->subcategories = $subcategory;
    //             $categoryTree[] = $category;
    //         }
    //     }

    //     return $categoryTree;
    // }
}
