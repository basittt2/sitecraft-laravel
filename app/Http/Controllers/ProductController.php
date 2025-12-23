<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('product-view', compact('product'));
}

public function ajaxSearch(Request $request)
{
    $query = $request->input('query');

    $results = Product::where('name', 'LIKE', "%$query%")
        ->orWhere('category', 'LIKE', "%$query%")
        ->limit(10)
        ->get();

    return response()->json($results);
}

}
