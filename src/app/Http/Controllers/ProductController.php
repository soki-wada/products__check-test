<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(Request $request){
        if ($request->has('sort')) {
            $sort = $request->input('sort');
            $products = Product::orderBy('price', $sort)->Paginate(6);
        } else {
            $products = Product::orderBy('id', 'asc')->Paginate(6);
        }
        $keyword = '';
        return view('index', compact('products', 'keyword'));
    }

    public function detail($productId){
        $product = Product::with('seasons')->find($productId);
        $seasons = Season::all();
        return view('products', compact('product', 'seasons'));
    }

    public function register(){
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }

    public function store(ProductRequest $request){
        $data = $request->all();
        $fileName = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/images', $fileName);
        $data['image'] = basename($fileName);

        $product = Product::create($data);
        $product->seasons()->attach($request->seasons);
        return redirect('/products');
    }

    public function search(Request $request){
        $products = Product::KeywordSearch($request->keyword)->Paginate(6);
        $keyword = '"' . $request->keyword . '"' . 'の';
        return view('index', compact('products', 'keyword'));
    }

    public function update(UpdateRequest $request){
        $product = Product::find($request->id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $fileName);
            $data['image'] = basename($fileName);
        }

        $product->update($data);
        $product->seasons()->sync($request->seasons);
        return redirect('/products');
    }

    public function destroy(Request $request){
        Product::find($request->id)->delete();
        return redirect('/products');
    }
}
