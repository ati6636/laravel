<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $products = Category::all();
        return view('admin.product_create',['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $products = new Product;

        $products->title = $request->title;
        $products->keywords = $request->keywords;
        $products->description = $request->description;
        $products->image = Storage::putFile('/images/',$request->file('image'));
        $products->category_id = $request->category_id;
        $products->user_id = Auth::id();
        $products->price = $request->price;
        $products->quantity = $request->quantity;
        $products->minquantity = $request->minquantity;
        $products->tax = $request->tax;
        $products->detail = $request->detail;
        $products->slug = Str::slug($request->title);
        $products->status = $request->status;
        $products->created_at = now();

        $products->save();

        return redirect()->route('admin_products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response|string
     */

    public function show(Product $product)
    {
        return ('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Product $product , $id)
    {
        $products = Product::find($id);
        $categories = Category::all();

        return view('admin.product_edit', ['products' =>$products ,'categories' => $categories ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product, $id)
    {
        $update = Product::find($id);

        $update->title = $request->title;
        $update->keywords = $request->keywords;
        $update->description = $request->description;
        if ($request->hasFile('image')) {
            $update->image = $request->image->storeAs('/uploads/', $request->image->getClientOriginalName());
        }
        $update->category_id = $request->category_id;
        $update->user_id = Auth::id();
        $update->price = $request->price;
        $update->quantity = $request->quantity;
        $update->minquantity = $request->minquantity;
        $update->tax = $request->tax;
        $update->detail = $request->detail;
        $update->slug = Str::slug($request->title);
        $update->status = $request->status;
        $update->updated_at = now();

        $update->save();
        return redirect()->route('admin_products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product, $id)
    {
        $delete = Product::find($id);
        $delete->delete();
        return redirect()->route('admin_products');
    }
}
