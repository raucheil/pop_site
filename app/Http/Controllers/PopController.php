<?php

namespace App\Http\Controllers;

use App\Pop;
use Illuminate\Http\Request;

class PopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pops = Pop::all();
        return view('pops.index',compact('pops',$pops));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'title' => 'required|min:3',
            'url' => 'required|url',
        ]);
        
        $pops = Pop::create(['title' => $request->title,'description' => $request->description]);
        return redirect('/pops/'.$pops->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function show(Pop $pop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function edit(Pop $pop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pop $pop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pop $pop)
    {
        //
    }
}
