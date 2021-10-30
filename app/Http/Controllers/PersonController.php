<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\HousePerson;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    private $columns_searcheable = [
        'name',
        'surname',
        'email',
        'phone',
        'phone2',
        'note_phone',
        'note_phone2',
    ];

    public function index(Request $request)
    {
        $persons = Person::orderBy('surname')->paginate(10);
        return view('persons.index',compact('persons'));
    }

    public function create()
    {
        return view('persons.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:persons,email',
            'phone' => 'required'
        ]);

        $input = $request->all();
        $person = Person::create($input);

        return redirect()->route('persons.index')
            ->with('success','Nominativo aggiunto correttamente');
    }

    public function edit($id)
    {
        $person = Person::find($id);
        return view('persons.edit', [
            'person'       => $person,
        ]);
    }

    public function update(Person $person, Request $request)
    {
        $person->update([
           'name' => $request->name,
           'surname' => $request->surname,
           'email' => $request->email,
           'phone' => $request->phone,
           'note_phone' => $request->note_phone,
           'phone2' => $request->phone2,
           'note_phone2' => $request->note_phone2,
        ]);
        return redirect()->route('persons.index')
            ->with('success', 'Nominativo aggiornato correttamente');
    }

    public function destroy($id)
    {
        foreach (HousePerson::where('person_id', $id)->get() as $housePerson)
            House::find($housePerson->house_id)->delete();

        Person::find($id)->delete();
        return back()->with('success', 'Nominativo eliminato correttamente');
    }

    public function search(Request $request)
    {
        $persons = Person::where(function ($query) use ($request) {
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

        return view('persons/table', compact('persons'));
    }

}
