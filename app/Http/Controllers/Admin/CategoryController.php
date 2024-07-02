<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    // public function index(Request $request)
    // {
    //     $query = Category::query();
    //     if($request->input('q')) {
    //         $query->where('name', 'like', '%' . $request->input('q') . '%');
    //     }
    //     $categories = $query->orderBy('created_at','desc')->paginate(10);
    //     return view('admin.categories.list',['categories' =>$categories]);
    // }
    public function index(Request $request){
        $keyword ="";
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
        }
        $categories = Category::where('name','LIKE',"%{$keyword}%")->paginate(10);

        return view('admin.categories.list',compact('categories'));

    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request){
        DB::beginTransaction();
        try{
            $data = $request->all();
            $category = new Category;
            $category->name = $data['name'];
            $category->description = $data['description'];
            $category->status = Category::DEFAULT_STATUS;
            if($request->hasFile('image')){
                $disk = 'public';
                $path = $request->file('image')->store('category', $disk);
                $category->image = $path;
            }
            $category->save();
            $request->session()->flash('success','Tạo danh mục mới thành công');
            DB::commit();
            return redirect()->route('admin.categories.list');
        } catch (\Exception $exception){
            DB::rollBack();
            Log::error([
                'method' => __METHOD__,
                'line' => __LINE__,
                'message' => $exception->getMessage(),
                'data' => $request->all()
            ]);
            $request->session()->flash('error','Tạo danh mục mới không thành công');
            return redirect()->route('admin.categories.list');
        }
    }
    public function edit($id)
    {
        try{
            $category = Category::findOrFail($id);
            return view('admin.categories.edit',['category' =>$category]);
        } catch (\Exception $exception){
            Log::error([
                'method' => __METHOD__,
                'line' => __LINE__,
                'message' => $exception->getMessage(),
            ]);
        }
    }
    public function update(UpdateCategoryRequest $request, $id)
    {
        DB::beginTransaction();
        try{
            $data = $request->all();
            $category = Category::findOrFail($id);
            $category->name = $data['name'];
            $category->description = $data['description'];
            $category->status = Category::DEFAULT_STATUS;
            if($request->hasFile('image')){
                $disk = 'public';
                $path = $request->file('image')->store('category', $disk);
                $category->image = $path;
            }
            $category->save();
            $request->session()->flash('success','Cập nhật danh mục mới thành công');
            DB::commit();
            return redirect()->route('admin.categories.list');
        } catch (\Exception $exception){
            DB::rollBack();
            // Log::error([
            //     'method' => __METHOD__,
            //     'line' => __LINE__,
            //     'message' => $exception->getMessage(),
            //     'data' => $request->all()
            // ]);
            $request->session()->flash('error','Cập nhật danh mục mới không thành công');
            return redirect()->route('admin.categories.list');
        }
    }

    public function delete($id)
    {
        try {
            $products = Product::where('category_id', $id)->first();
            if($products) {
                return redirect()-> route('admin.categories.list')->with('error','Danh mục đã tn tại sản phẩm, không được xoá');
            } else {
                Category::destroy($id);
                return redirect()-> route('admin.categories.list')->with('success', 'Xoá danh mục thành công');
            }
        }catch (\Exception $exception){
            // Log::error([
            //     'method' => __METHOD__,
            //     'line' => __LINE__,
            //     'message' => $exception->getMessage(),
            //     'data' => $id
            // ]);
            return redirect()-> route('admin.categories.list')->with('success', 'Xoá danh mục không thành công');
        }
    }
}
