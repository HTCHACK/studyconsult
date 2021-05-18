<?php

namespace App\Http\Controllers;

use App\ProudMemeber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProudMemeberController  extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'frontPageIndex');
        $this->middleware('can:admin')->except('show', 'frontPageIndex');
    }

    public function index()
    {
        return view('admin.member.index',['proud_memebers'=>ProudMemeber::where('lang', $this->getLang())->orderby('created_at','DESC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProudMemeber::create([
            'name'=>$request->name,
            'job'=>$request->job,
            'description'=>$request->description,
            'lang'=>$request->lang,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/images', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : null,
        ]);

        return redirect()->route('proud_memebers.index')->with('success','Proud Member Created Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ProudMemeber  $proudMemeber
     * @return \Illuminate\Http\Response
     */
    public function show(ProudMemeber $proudMemeber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProudMemeber  $proudMemeber
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.member.edit',['proud_memeber'=>ProudMemeber::findorFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProudMemeber  $proudMemeber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProudMemeber $proud_memeber)
    {
        ProudMemeber::findorFail($proud_memeber->id)->update([
            'name'=>$request->name,
            'job'=>$request->job,
            'description'=>$request->description,
            'lang'=>$request->lang,
            'picture' => $request->hasFile('picture') ? $request->file('picture')->storeAs('public/images', Str::random(20) . '.' . $request->file('picture')->getClientOriginalExtension()) : $proud_memeber->picture,
        ]);

        return redirect()->route('proud_memebers.index')->with('success','Proud Member updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProudMemeber  $proudMemeber
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProudMemeber $proud_memeber)
    {
        ProudMemeber::findorFail($proud_memeber->id)->delete();

        return redirect()->route('proud_memebers.index')->with('success', 'Comp Deleted Successfully');
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
