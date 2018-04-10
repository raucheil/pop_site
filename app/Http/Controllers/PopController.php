<?php

namespace Laravel\Http\Controllers;

use Laravel\Pop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->user =  \Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pops = Pop::all();
        return view('pops.index', compact('pops',$pops));
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
     * @param  \Laravel\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function show(Pop $pop)
    {
        //
        return view('pops.show', compact('pop',$pop));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Laravel\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function edit(Pop $pop)
    {
        //
        return view('pops.edit',compact('pop',$pop));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Laravel\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pop $pop)
    {
        //Validate
        $request->validate([
        'title' => 'required|min:3',
        'url' => 'required|url',
        ]);
        $pop->title = $request->title;
        $pop->url = $request->url;
        $pop->save();
        $request->session()->flash('message', 'Successfully modified the pop!');
        return redirect('pops');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Laravel\Pop  $pop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pop $pop)
    {
        //
        $pop->delete();
        $request->session()->flash('message', 'Successfully deleted the code!');
        return redirect('pops');

    }
}
