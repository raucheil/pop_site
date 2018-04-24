<?php

namespace Laravel\Http\Controllers;

use Laravel\Pop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\MessageBag;

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
        // $pops = Pop::all();
        $pops = Pop::where('user_id', '=', Auth::user()->id)->get();
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
        
        $pops = Pop::where('user_id', '=', $request->user()->id)->first();
        if ($pops) {
            // return back()->withErrors(['only one code is available for this account']);
            return response()->json([
                    'Iderr' => 'only one code is available for this account',
                ]);
        }

        $request->validate([
            'title' => 'required|min:3',
            'url' => 'required|unique:pops,url|url',
            'options' => 'required|json',
            'user_id' =>'unique:pops,user_id'
        ]);

        // $id = Auth::user()->id;
       

        $pops = Pop::create(['user_id'=> $request->user()->id,'title' => $request->title,'url'=> $request->url,'options' => $request->options]);

        if ($pops) {
            // return back()->withErrors(['only one code is available for this account']);
            return response()->json([
                    'ok_message' => 'ok create',
                ]);
        }
        // return response()->json([
        //     'message' => 'You are logged in !',
        // ]);
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
        function array_msort($array, $cols)
            {
                $colarr = array();
                foreach ($cols as $col => $order) {
                    $colarr[$col] = array();
                    foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = strtolower($row[$col]); }
                }
                $eval = 'array_multisort(';
                foreach ($cols as $col => $order) {
                    $eval .= '$colarr[\''.$col.'\'],'.$order.',';
                }
                $eval = substr($eval,0,-1).');';
                eval($eval);
                $ret = array();
                foreach ($colarr as $col => $arr) {
                    foreach ($arr as $k => $v) {
                        $k = substr($k,1);
                        if (!isset($ret[$k])) $ret[$k] = $array[$k];
                        $ret[$k][$col] = $array[$k][$col];
                    }
                }
                return $ret;

            }
        $code_popflu=json_decode($pop->options,true);
        $code_popflu_2=array_msort($code_popflu, array('od'=>SORT_ASC));
        // print_r($code_popflu_2);
        $i=0;
        $a="";
        foreach($code_popflu_2 as $code_popflus){
            $a.="'".$code_popflus['sd']."',";
            $i++;
        }
        // echo $a;
        $e="&lt;!-- inserire prima di chiudere il tag body\n in ogni pagina in cui si vuole visualizzare o nel footer del sito --&gt;\n\n";
        $e.="var head = document.getElementsByTagName('head')[0];\n";
        $e.="var script = document.createElement('script');\n";
        $e.="script.type = 'text/javascript';\n";
        $e.="script.onload = function() {\n";
        $e.="var a=[".$a."];\n";
        $e.="var url=\"http://localhost:8000/data/data.csv\";\n";
        $e.="var pos='';\n";
        $e.="em_pp(a,url,pos);\n";
        $e.="}\n";
        $e.="script.src = 'js/bundle.js';\n";
        $e.="head.appendChild(script)\n";

        $code_popflu=$e;
        return view('pops.show', compact('pop',$pop,'code_popflu'));
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
    public function destroy(Request $request, Pop $pop)
    {
        //
        $pop->delete();
        $request->session()->flash('message', 'Successfully deleted the code!');
        return redirect('pops');

    }
}
