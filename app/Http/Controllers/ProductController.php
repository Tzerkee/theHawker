<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query();

        if(!empty($_GET['category']))
        {
            $slugs = explode(',', $_GET['category']);
            $cat_ids = Category::select('id')->whereIn('slug', $slugs)->pluck('id')->toArray();
            $products = $products->whereIn('cat_id', $cat_ids);
        }

        if(!empty($_GET['sortBy'])) {

            if($_GET['sortBy'] == 'newest') {
                $products = $products->where(['publish'=>1])->orderBy('created_at', 'DESC')->paginate(9);
            }
            elseif($_GET['sortBy'] == 'priceAsc') {
                $products = $products->where(['publish'=>1])->orderBy('price', 'ASC')->paginate(9);
            }
            elseif($_GET['sortBy'] == 'priceDesc') {
                $products = $products->where(['publish'=>1])->orderBy('price', 'DESC')->paginate(9);
            }
            elseif($_GET['sortBy'] == 'nameAsc') {
                $products = $products->where(['publish'=>1])->orderBy('name', 'ASC')->paginate(9);
                // dd($products);
            }
            elseif($_GET['sortBy'] == 'nameDesc') {
                $products = $products->where(['publish'=>1])->orderBy('name', 'DESC')->paginate(9);
            }
        }
        else {
            $products = $products->where('publish', 1)->paginate(9);
        }
        $categories = Category::with('products')->where(['publish' => 1, 'is_parent' => 1])->orderBy('name', 'ASC')->get();

        return view('product.index', compact('products', 'categories'));
    }

    public function productFilter(Request $request)
    {
        $data = $request->all();

        // Category filter
        $catUrl='';
        if(!empty($data['category'])){
            foreach ( $data['category'] as $category ) {
                if(empty($catUrl)) {
                    $catUrl .='&category='.$category;
                } else {
                    $catUrl .=','.$category;
                }
            }
        }

        // Sort by
        $sortByUrl='';
        if(!empty($data['sortBy'])) {
            $sortByUrl .='&sortBy='.$data['sortBy'];
        }

        return \redirect()->route('product.index', $catUrl.$sortByUrl);
    }

    // public function specific($id)
    // {
    //     $product = Product::with('products')->where('id', $id)->first();

    //     return view('product.specific', compact(['product']));
    // }

    public function productCategory(Request $request, $slug)
    {
        $categories = Category::with(['products'])->where('slug', $slug)->first();
        $cats = Category::where(['publish' => 1, 'is_parent' => 1])->with('products')->orderBy('name', 'ASC')->get();

        $sort = '';

        if($request->sort != null)
        {
            $sort = $request->sort;
        }
        if($categories == null)
        {
            return view('errors.404');
        }
        else
        {
            if($sort == 'newest'){
                $products = Product::where(['publish'=>1, 'cat_id'=>$categories->id])->orderBy('created_at', 'DESC')->paginate(9);
            }
            elseif($sort == 'priceAsc')
            {
                $products = Product::where(['publish'=>1, 'cat_id'=>$categories->id])->orderBy('price', 'ASC')->paginate(9);

            }
            elseif($sort == 'priceDesc') {
                $products = Product::where(['publish'=>1, 'cat_id'=>$categories->id])->orderBy('price', 'DESC')->paginate(9);
            }
            elseif($sort == 'nameAsc') {
                $products = Product::where(['publish'=>1, 'cat_id'=>$categories->id])->orderBy('name', 'ASC')->paginate(9);
            }
            elseif($sort == 'nameDesc') {
                $products = Product::where(['publish'=>1, 'cat_id'=>$categories->id])->orderBy('name', 'DESC')->paginate(9);
            }
            else {
                $products = Product::where(['publish'=>1, 'cat_id'=>$categories->id])->paginate(9);
            }
        }

        $route = 'product-category';

        if($request->ajax())
        {
            $view = view('product.product-single-grid', compact('products'))->render();
            return response()->json(['html' => $view]);
        }

        return view('product.product-category', compact(['categories', 'cats','route', 'products']));
    }

    public function productDetail($slug)
    {
        $product = Product::with('products')->where('slug', $slug)->first();

        if($product)
        {
            return view('product.product-detail', compact('product'));
        }
        else {
            return view('errors.404');
        }
    }

    public function getCategory()
    {
        $categories = Category::where(['publish'=> 1])->inRandomOrder()->get();

        return view('product.category', compact('categories'));
    }
}
