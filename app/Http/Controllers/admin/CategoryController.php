<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'categoryname' => 'required',
                'catimage' => 'required|image|mimes:jpeg,png,jpg,gif,avif|max:2048',
            ],
            [
                'categoryname.required' => 'Category Name is Required',
                'catimage.required' => 'Category Image is Required'
            ]
        );
        $imageName = time().'.'.$request->catimage->extension();
        $request->catimage->move(public_path('images'),$imageName);
        $categoryname = $request->categoryname;
        
        $category = new category();
        $category->categoryname = $categoryname;
        
        $category->save();
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request)

    {
        $request->validate(
            [
                'categoryname' => 'required',
                'catimage' => 'required|image|mimes:jpeg,png,jpg,gif,avif|max:2048',

            ],
            [
                'categoryname.required' => 'Category Name is Required',
                'catimage' => 'Category Image is Required',
            ]
        );
        $id = $request->id;
        $categoryname = $request->categoryname;
        $catimage = $request->catimage;
        $category = Category::find($id);
        $category->id = $id;
        if(isset($request->catimage)){
            $imageName = time().'.'.$request->catimage->extension();
        $request->catimage->move(public_path('images'),$imageName);
        $category->catimage = $imageName;
        }
        $category->categoryname = $categoryname;
        
        $category->save();
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
