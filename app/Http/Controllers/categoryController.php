<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        // $categories=Category::withCount('products')->orderBy('products_count','desc')->get();
        return view('Categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        ['category_name'=>'required|unique:categories',
        'description'=>'required|string']);
        $path=$request->file('category_image')->store('public/files');
        Category::create([
            'category_name'=>$request->category_name,
            'description'=>$request->description,
            'category_image'=>$path,
            'slug'=>Str::slug($request->category_name),
        ]);
        Session::put('message','category created successfully');
        return redirect()->route('admin.category.index')->with('message','category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $category=Category::find($id);
        // $category->products;
        // dd($category->description);
        $products=$category->products;
        // dd($products[1]->product_name);
        return view('Categories.show',compact('category','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        // dd($category->category_name);
        return view('Categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->file('image'))
        {
            Storage::delete($image);
            $image=$request->file('image')->store('public/files'));
        }
        return redirect()->Route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id)->delete();
        return redirect()->route('admin.category.index');
    }
}
