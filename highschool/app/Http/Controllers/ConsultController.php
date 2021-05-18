<?php

namespace App\Http\Controllers;

use App\Consult;
use Illuminate\Http\Request;

class ConsultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'frontPageIndex', 'store');
        $this->middleware('can:admin')->except('show', 'frontPageIndex', 'store');
    }
    public function index()
    {
        return view('admin.consult.index', ['consults' => Consult::orderby('created_at','DESC')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Consult::create($request->all());

        return back()->with('success','Successfully Send');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function show(Consult $consult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function edit(Consult $consult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consult $consult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consult $consult)
    {
        //
    }

    public function frontPageIndex()
    {
        return view('consult.index');
    }
}
