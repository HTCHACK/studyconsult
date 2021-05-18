<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'frontPageIndex');
        $this->middleware('can:admin')->except('show', 'frontPageIndex');
    }

    public function index()
    {
        return view('admin.banner.index',['banners'=>Banner::where('lang', $this->getLang())->orderby('created_at','DESC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Banner::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'lang'=>$request->lang,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/images', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : null,
        ]);

        return redirect()->route('banners.index')->with('success','Banner Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.banner.edit',['banner'=>Banner::findorFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        Banner::findorFail($banner->id)->update([
            'title'=>$request->title,
            'lang'=>$request->lang,
            'content'=>$request->content,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/images', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : $banner->picture,
        ]);

        return redirect()->route('banners.index')->with('success','Banner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        Banner::findorFail($banner->id)->delete();

        return redirect()->route('banners.index')->with('success','Banner Deleted Successfully');
    }

    public function frontPageIndex(){
        return view('banner.index');
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
