<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
        $this->middleware('can:admin')->except('show');
    }


    public function index()
    {
        return view('admin.category.index', ['categories' => Category::where('lang', $this->getLang())->orderby('created_at','DESC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'lang' => $request->lang,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.category.edit', ['category' => Category::findorFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        Category::findorFail($category->id)->update([
            'name' => $request->name,
            'lang' => $request->lang,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findorFail($id)->delete();

        return redirect()->route('categories.index')->with('success', 'Category Successfully Deleted');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    private function getLang()
    {
        if (!isset($_COOKIE['language'])) {
            return 'uz';
        }
        if (isset($_COOKIE['language'])) {
            return $_COOKIE['language'];
        }
    }
}
