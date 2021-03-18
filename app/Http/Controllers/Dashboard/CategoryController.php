<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\CategoryTranslation;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('_parent')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::parent()->select('id', 'parent_id')->get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {

        if ($request->type == 1) //main category
        {
            $request->request->add(['parent_id' => null]);
        }

        $category = Category::create($request->all());
        return redirect()->route('categories.index')->with('success' , 'Category has Created Successfully');
    }

    public function edit(Category $category)
    {
// return $category;
        $categories = Category::parent()->select('id', 'parent_id')->get();
        // return $categories;

        return view('admin.category.edit' , compact('category', 'categories'));
    }

    public function update(UpdateCategoryRequest $request , Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success' , 'Category has Updated Successfully');
    }

    public function destroy($id)
    {
        // $category=Category::where('id',$id)->delete();
        $category->delete();
        $category->translation()->delete();
        return back();

    }
}
