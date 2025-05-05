<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::Paginate(6);
        return view('index', compact('products'));
    }

    public function detail($productId){
        $product = Product::with('seasons')->find($productId);
        return view('products', compact('product'));
    }

    public function register(){
        return view('register');
    }
}
