<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\roles;
use App\Models\category;
use App\Models\detail_roles;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function list_category()
    {
        $list_category = category::orderby('id_category', 'asc')->get();
        return view('admin.category.list_category')->with('list_category', $list_category);
    }
    public function edit_category($id_category)
    {
        $category_info = category::where('id_category', $id_category)->first();
        return view('admin.category.edit_category')->with('category_info', $category_info);
    }
    public function update_category($id_category, Request $request)
    {
        $data = $request->all();
        $category = category::where('id_category', $id_category)->first();
        if ($category) {
            $category->category_name = $data['category_name'];
            $category->category_desc = $data['category_desc'];
            if ($data['category_status'] == 'Kích hoạt') {
                $category->category_status = 1;
            } else {
                $category->category_status = 0;
            }
            $category->save();
        }
        return Redirect::to('/list_category');
    }
    public function delete_category($id_category){
        $category = category::where('id_category',$id_category)->first();
        if($category){
            $category->delete();
        }
        return Redirect::to('/list_category');
    }
    public function new_category_page(){
        return view('admin.category.add_category');
    }
    public function add_category(Request $request)
    {
        $data = $request->all();
        $category = new category();
        if ($category) {
            $category->category_name = $data['category_name'];
            $category->category_desc = $data['category_desc'];
            if ($data['category_status'] == 'Kích hoạt') {
                $category->category_status = 1;
            } else {
                $category->category_status = 0;
            }
            $category->save();
        }
        return Redirect::to('/list_category');
    }
}
