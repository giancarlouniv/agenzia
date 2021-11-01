<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\HouseType;
use App\Models\Person;
use App\Models\Richieste;
use App\Models\Source;
use App\Models\Zone;
use Illuminate\Http\Request;

class RichiesteController extends Controller
{
    function __construct()
    {
        $this->middleware('role:Amministratore')->except('index', 'edit');;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $richieste = Richieste::orderBy('created_at', 'DESC')->paginate(10);
        return view('richieste.index', compact('richieste'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('richieste.create', [
            'persons'     =>  Person::orderBy('surname', 'ASC')->get(),
            'contracts'   => Contract::all(),
            'house_types' => HouseType::all(),
            'sources' => Source::all(),
            'zones' => Zone::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $richiesta = new Richieste();
        $richiesta->contract_id = $request->get('contract_id');
        $richiesta->house_type_id = $request->get('house_type_id');
        $richiesta->person_id = $request->get('person_id');
        $richiesta->vani = $request->get('vani');
        $richiesta->mutuo = $request->get('mutuo');
        $richiesta->note = $request->get('note');
        $richiesta->source_id = $request->get('source_id');
        $richiesta->max_price = $request->get('max_price');
        if($richiesta->save())
            return redirect(url('/richieste'))->with('success', 'Richiesta salvata correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Richieste  $richieste
     * @return \Illuminate\Http\Response
     */
    public function show(Richieste $richieste)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Richieste  $richieste
     * @return \Illuminate\Http\Response
     */
    public function edit(Richieste $richieste)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Richieste  $richieste
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Richieste $richieste)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Richieste  $richieste
     * @return \Illuminate\Http\Response
     */
    public function destroy(Richieste $richieste)
    {
        //
    }
}
