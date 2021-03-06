<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Categories::all();
        return view('Backend.Category.category', compact('category'));
    }
    function create(Request $request)
    {
        $category = new Categories();
        $category->cat_name = $request->cat_name;
        $category->cat_slug = Str::slug($request->cat_name, '-');
        $category->cat_parent_id = $request->cat_parent_id;
        // dd($category);
        $category->save();
        return redirect()->route('category.index')->with('thong-bao', 'success');
    }
    function edit($id)
    {
        $data['category'] = Categories::find($id);
        $data['categories'] = Categories::all();
        return view('Backend.Category.editcategory', $data);
    }
    function editPost(Request $request, $id)
    {
        $category = Categories::find($id);
        $category->cat_name = $request->cat_name;
        $category->cat_parent_id = $request->cat_parent_id;
        $category->cat_slug = Str::slug($request->cat_name, '-');
        //    dd($category); 
        $category->save();
        return redirect()->route('category.index')->with('thong-bao-cate-update', 'success');
    }
    function delete(Request $request, $id)
    {
        $data = Categories::where('cat_parent_id', '=', $id)->first();
        //dd($data); 
        $category = Categories::find($id);
        if (isset($data)) {
            return "Thư mục cha đang chứa dữ liệu, điều này có thể gây lỗi cho hệ thống";
        } else {
            $category->delete();
        }
        return redirect()->route('category.index')->with('thong-bao-cate-update', 'success');
    }
}
