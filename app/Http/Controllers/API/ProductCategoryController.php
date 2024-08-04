<?php

namespace App\Http\Controllers\API;

use App\models\ProductCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function all(Request $request)
    {
        
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('id');
        $showProduct = $request->input('showProduct');

        if($id){
            $category = ProductCategory::with(['products'])->find($id);

            if($category){
                return ResponseFormatter::success(
                    $category,
                    'Data kategori berhasil diambil'
                );
            }else {
                return ResponseFormatter::error(
                    null,
                    'Data kategori tidak ada',
                    404
                );
            }
        }
        $category = ProductCategory::query();

        if($name){
            $category->where('name', 'like', '%' . $name . '%'); 
        }
        if($showProduct){
            $category->with('products'); 
        }
        return ResponseFormatter::success(
            $category->paginate($limit),
            'Data kategori berhasil diambil'
        );
    }
}
