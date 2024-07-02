<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    // public function index(Request $request)
    // {
    //     $query = Brand::query();
    //     if($request->input('q')) {
    //         $query->where('name', 'like', '%' . $request->input('q') . '%');
    //     }
    //     $brands = $query->orderBy('created_at','desc')->paginate(10);
    //     return view('admin.brands.list',['brands' =>$brands]);
    // }
    public function index(Request $request){
        $keyword = "";
        if($request->input('keyword')){ 
            $keyword = $request->input('keyword');
        }
        $brands = Brand::where('name','LIKE',"%{$keyword}%")->paginate(10);
        return view('admin.brands.list', compact('brands'));
    }

    public function create(Request $request)
    {
      
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request){
        DB::beginTransaction();
        try{
            $data = $request->all();
            $brands = new Brand;
            $brands->name = $data['name'];
            $brands->description = $data['description'];
            // $brands->status = Brand::DEFAULT_STATUS;
            if($request->hasFile('image')){
                $disk = 'public';
                $path = $request->file('image')->store('brand', $disk);
                $brands->image = $path;
            }
            $brands->save();
            $request->session()->flash('success','Tạo nhãn hiệu mới thành công');
            DB::commit();
            return redirect()->route('admin.brands.list');
        } catch (\Exception $exception){
            DB::rollBack();
            $request->session()->flash('error','Tạo nhãn hiệu mới không thành công');
            return redirect()->route('admin.brands.list');
        }

    }
   
    public function edit($id)
    {
            $brand = Brand::find($id); 
            return view('admin.brands.edit',['brand' =>$brand]);
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        DB::beginTransaction();
        try{
            $data = $request->all();
            $brand = Brand::findOrFail($id);//findOrFail() được sử dụng để tìm kiếm một bản ghi trong cơ sở dữ liệu theo id.
            $brand->name = $data['name'];
            $brand->description = $data['description'];
            // $brand->status = Brand::DEFAULT_STATUS;
            if($request->hasFile('image')){
                $disk = 'public';
                $path = $request->file('image')->store('category', $disk);
                $brand->image = $path;
            }
            $brand->save();
            $request->session()->flash('success','Cập nhật nhãn hiệu mới thành công');
            DB::commit();
            return redirect()->route('admin.brands.list');
        } catch (\Exception $exception){
            DB::rollBack();
            $request->session()->flash('error','Cập nhật nhãn hiệu mới không thành công');
            return redirect()->route('admin.brands.list');
        }
    }

    public function delete($id)
    {
            $products = Product::where('brand_id', $id)->first();
            Brand::destroy($id);
            return redirect()-> route('admin.brands.list')->with('success', 'Xoá nhãn hiệu thành công');

        // try {
        //     $products = Product::where('brand_id', $id)->first();
        //     if($products) {
        //         return redirect()-> route('admin.brands.list')->with('error', 'Nhãn hiệu đã tồn tại sản phẩm, không được xoá');
        //     }else {
        //         Brand::destroy($id);
        //         return redirect()-> route('admin.brands.list')->with('success', 'Xoá nhãn hiệu thành công');
        //     }
        // }catch (\Exception $exception){
        //     return redirect()-> route('admin.brands.list')->with('success', 'Xoá nhãn hiệu không thành công');
        // }
    }
}
