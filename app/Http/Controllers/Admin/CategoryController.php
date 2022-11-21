<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
      $categories = DB::table('categories')->get();

       return view('admin.category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function add()
    {
        $categories = Category::all();

        return view('admin.category_add', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request  $request)
    {
        $categories = new Category;

        $categories->parent_id = $request->parent_id;
        $categories->title = $request->title;
        $categories->keywords = $request->keywords;
        $categories->description = $request->description;
        $categories->image = Storage::putFile('/images/',$request->file('image'));
        $categories->slug = Str::slug($request->title);
        $categories->status = $request->status;
        $categories->created_at = now();

        $categories->save();

        return redirect()->route('admin_category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category , $id)
    {
        $categoryEdit = Category::find($id);
        $categories = DB::table('categories')->get();

        return view('admin.category_edit', ['categoryEdit' =>$categoryEdit ,'categories' => $categories ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category ,$id)
    {
        $update = Category::find($id);

        $update->parent_id = $request->parent_id;
        $update->title = $request->title;
        $update->keywords = $request->keywords;
        $update->description = $request->description;
        if ($request->hasFile('image')) {
            $update->image = $request->image->storeAs('/uploads/', $request->image->getClientOriginalName());
        }
        $update->slug = Str::slug($request->title);
        $update->status = $request->status;
        $update->updated_at = now();

        $update->save();
        return redirect()->route('admin_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category,$id)
    {
        $deletedCategory = DB::table('categories')->delete($id);
        return redirect()->route('admin_category');
    }
}
