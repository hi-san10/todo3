<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('category',compact('categories'));
    }

    public function store(Request $request){
        $category=$request->only(['name']);
        Category::create($category);
        return redirect('/categories')->with('message','カテゴリを作成しました');
    }

    public function update(Request $request){
        $category=$request->only(['name']);
        Category::find($request->id)->update($category);
        return redirect('/categories')->with('message','カテゴリを更新しました');
    }

    public function destroy(Request $request){
        Category::find($request->id)->delete();
        return redirect('/categories')->with('message','カテゴリを削除しました');
    }
    //
}
