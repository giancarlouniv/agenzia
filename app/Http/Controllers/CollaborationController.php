<?php

namespace App\Http\Controllers;

use App\Models\Collaboration;
use Illuminate\Http\Request;

class CollaborationController extends Controller
{

    private $columns_searcheable = [
        'name',
        'ref',
    ];

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $collaborators = Collaboration::orderBy('created_at', 'DESC')->paginate(10);
        return view('collaborations.index', compact('collaborators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('collaborations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $new = new Collaboration();
        $new->name = $request->get('name');
        $new->ref = $request->get('ref');
        $new->status = $request->get('status');
        $new->note = $request->get('note');
        if($new->save())
            return redirect(env('APP_URL').'collaborations')->with('success', 'Agenzia caricata correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collaboration  $collaboration
     * @return \Illuminate\Http\Response
     */
    public function show(Collaboration $collaboration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collaboration  $collaboration
     */
    public function edit($id)
    {
        return view('collaborations.edit', ['collaboration'=> Collaboration::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collaboration  $collaboration
     */
    public function update(Request $request, Collaboration $collaboration)
    {
        $new = Collaboration::find($collaboration->id);
        $new->name = $request->get('name');
        $new->ref = $request->get('ref');
        $new->status = $request->get('status');
        $new->note = $request->get('note');
        if($new->save())
            return redirect(env('APP_URL').'collaborations')->with('success', 'Agenzia modificata correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collaboration  $collaboration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaboration $collaboration)
    {
        //
    }

    public function search(Request $request){
        $collaborations = Collaboration::where(function ($query) use ($request) {
            if (strlen($request->get('search'))) {
                $searchs = explode(" ", $request->get('search'));
                foreach ($searchs as $search) {
                    $query->where(function ($query) use ($search) {
                        foreach ($this->columns_searcheable as $column) {
                            $query->orWhere($column, 'LIKE', "%".$search."%");
                        }
                    });
                }
            }
        })
            ->get();

        return view('collaborations/table', compact('collaborations'));
    }
}
