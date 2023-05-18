<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menutype;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listcategory = CategoryModel::with('categorymenu')->orderBy('id', 'DESC')->get();
        return view('admin.category.index')->with(compact('listcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menuid = MenuType::orderBy('id', 'desc')->get();
        return view('admin.category.create')->with(compact('menuid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'category_name' => 'required|unique:category|max:250',
                'slug_category' => 'required|unique:category|max:250',
                'trangthai' => 'required',
            ]
        );
        $category = new CategoryModel();
        $category->category_name = $data['category_name'];
        $category->slug_category = $data['slug_category'];
        $category->trang_thai = $data['trangthai'];
        $category->menu_id = 0;
        $category->save();
        return redirect()->back()->with('message', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editcategory = CategoryModel::find($id);
        $listmenu = Menutype::orderBy('id', 'DESC')->get();
        return view('admin.category.edit')->with(compact('editcategory', 'listmenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate(
            [
                'category_name' => 'required|max:250',
                'slug_category' => 'required|max:250',
                'trangthai' => 'required',
            ]
        );
        $category = CategoryModel::find($id);
        $category->category_name = $data['category_name'];
        $category->slug_category = $data['slug_category'];
        $category->menu_id = 0;
        $category->trang_thai = $data['trangthai'];
        $category->save();
        return redirect()->back()->with('message', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryModel::find($id)->delete();
        return redirect()->back()->with('status', 'Delete Success');
    }
}
