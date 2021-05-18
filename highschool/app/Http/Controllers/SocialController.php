<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'frontPageIndex');
        $this->middleware('can:admin')->except('show', 'frontPageIndex');
    }

    public function index()
    {
        return view('admin.social.index',['socials'=>Social::orderby('created_at','desc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Social::create($request->all());

        return redirect()->route('socials.index')->with('success','Social Link Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.social.edit',['social'=>Social::findorFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social)
    {
        Social::findorFail($social->id)->update($request->all());

        return redirect()->route('socials.index')->with('success','Social link updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        Social::findorFail($social->id)->delete();

        return redirect()->route('socials.index')->with('success', 'Social Deleted Successfully');
    }

    public function frontPageIndex()
    {
        //
    }
}
