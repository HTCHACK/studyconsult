<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'frontPageIndex');
        $this->middleware('can:admin')->except('show', 'frontPageIndex');
    }
    
    public function index()
    {
        return view('admin.gallery.index',['galleries'=>Gallery::where('lang', $this->getLang())->orderby('created_at', 'desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gallery::create([
            'lang' => $request->lang,
            'name' => $request->name,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/images', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : null,
        ]);

        return redirect()->route('galleries.index')->with('success','Gallery creared successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        Gallery::findorFail($gallery->id)->delete();

        return redirect()->route('galleries.index')->with('success','Gallery Deleted successfully');
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
