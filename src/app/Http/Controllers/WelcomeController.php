<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = ProductCategory::all();

        return view('welcome', compact('categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $categories = ProductCategory::all();

        $attributes = $request->validate([
           'title'  => ['required_without:category', 'nullable', 'min:3'],
           'category' => ['required_without:title', 'nullable', 'integer']
        ]);

        $products = Product::search($attributes);

        return view('welcome', compact('products', 'categories'));
    }
}
