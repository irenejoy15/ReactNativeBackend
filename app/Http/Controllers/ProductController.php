<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductionResource;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductionResource::collection($products);
    }
}
