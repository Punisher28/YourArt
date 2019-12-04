<?php

namespace App\Http\Controllers;

use App\Category;
use App\ImgItems;
use App\ImgUsers;
use App\Products;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        $products = Products::with(['category', 'image']);
        $categories = Category::with('childs')->where('parent_id', 0)->get();
        if ($request->has('category')){
            $products->where('category_id', $request->category);
        }
        if ($request->has('min') && $request->min!==null){
            $products->where('price','>',$request->min);
        }
        if ($request->has('max')&& $request->max!==null){
            $products->where('price','<',$request->max);
        }
        if ($request->has('search')){
            $products->where('name','LIKE', '%'.$request->search.'%');
        }
        if ($request->has('priceRadio')&& $request->priceRadio!==null){
            $products->orderBy('price',$request->priceRadio);
        }
        $products=$products->paginate(12);

        return view('Articles', compact(['products','categories']));
    }

    public function view(Request $request, $id)
    {
        $product = Products::with(['category', 'image'])->find($id);
        $category=Category::where('id',$product->category->parent_id)->first();
   //dd($product->category->name);
        return view("Item", compact('product','category'));
    }
}
