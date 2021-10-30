<?php

    namespace App\Http\Controllers;

    use App\Models\Contract;
    use App\Models\Customer;
    use App\Models\House;
    use App\Models\HouseCustomer;
    use App\Models\HousePerson;
    use App\Models\HousePhoto;
    use App\Models\HouseType;
    use App\Models\Person;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Spatie\Permission\Models\Permission;

    class HouseController extends Controller
    {
        function __construct()
        {
            $this->middleware('role:Amministratore')->except('index', 'edit');;
        }

        public function index(Request $request)
        {
            $houses = House::orderBy('created_at', 'DESC')->where('is_archiviato', 0)->paginate(10);
            return view('houses.index', compact('houses'));
        }

        static function getInitialsAttribute($name)
        {
            $name_array = explode(' ', trim($name));
            $firstWord = $name_array[0];
            $lastWord = $name_array[count($name_array) - 1];
            return strtoupper($firstWord[0])."".strtoupper($lastWord[0]);
        }

        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            $persons = Person::orderBy('surname', 'ASC')->get();
            return view('houses.create', [
                'persons'     => $persons,
                'contracts'   => Contract::all(),
                'house_types' => HouseType::all()
            ]);
        }

        public function store(Request $request)
        {
            $house = new House();
            $house->contract_id = $request->get('contract_id');
            $house->house_type_id = $request->get('house_type_id');
            $house->user_id = \Auth::user()->id;
            $house->city = $request->get('city');
            $house->address = $request->get('address');
            $house->piano = $request->get('piano');
            $house->vani = $request->get('vani');
            $house->mq = $request->get('mq');
            $house->link = $request->get('link');
            $house->is_ascensore = $request->get('is_ascensore');
            $house->prezzo = str_replace(',', '', $request->get('prezzo'));
            if ($house->save()) {
                HousePerson::create([
                    'house_id'  => $house->id,
                    'person_id' => $request->get('person_id')
                ]);
            }
            return redirect(url('/houses/'.$house->id.'/edit'));
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         */
        public function show($id)
        {
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         */
        public function edit($id)
        {
            $house = House::with(['user', 'contract', 'houseType', 'customers', 'photos'])->find($id);
            //return $house;
            $persons = Person::orderBy('surname', 'ASC')->get();
            return view('houses.edit', [
                'house'       => $house,
                'persons'     => $persons,
                'contracts'   => Contract::all(),
                'house_types' => HouseType::all()
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         */
        public function update(Request $request, $id)
        {
            $house = House::find($id);
            $house->contract_id = $request->get('contract_id');
            $house->house_type_id = $request->get('house_type_id');
            $house->city = $request->get('city');
            $house->address = $request->get('address');
            $house->piano = $request->get('piano');
            $house->vani = $request->get('vani');
            $house->mq = $request->get('mq');
            $house->link = $request->get('link');
            $house->is_ascensore = $request->get('is_ascensore');
            $house->prezzo = str_replace(',', '', $request->get('prezzo'));
            if ($house->save()) {
                HousePerson::where('house_id', $house->id)->delete();
                HousePerson::create([
                    'house_id'  => $house->id,
                    'person_id' => $request->get('person_id')
                ]);
            }
            return redirect(url('/houses'));
        }

        /**
         * Remove the specified resource from storage.
         * @param  int  $id
         */
        public function destroy($id)
        {
            if(House::find($id)->delete()){
                HousePhoto::where('house_id', $id)->delete();
                HousePerson::where('house_id', $id)->delete();
                HouseCustomer::where('house_id', $id)->delete();
            }
            return back();
        }

        public function uploadphoto(Request $request, $house_id)
        {
            if ($request->hasFile('image')) {
                $nome = \Hash::make($house_id.time());
                $fileNameToStore = str_replace('/', '__', $nome).'.'.$request->file('image')->getClientOriginalExtension();

                if ($request->file('image')->storeAs(
                    'houses_images/'.$house_id, $fileNameToStore, 'public'
                )) {
                    $new = new HousePhoto();
                    $new->house_id = $house_id;
                    $new->path_photo = '/houses_images/'.$house_id.'/'.$fileNameToStore;
                    $new->save();
                }
            } else {
                return 'error';
            }
        }

        function uploadphoto_planimetria(Request $request, $house_id)
        {
            if ($request->hasFile('image_plan')) {
                $nome = \Hash::make($house_id.time());
                $fileNameToStore = str_replace('/', '__', $nome).'.'.$request->file('image_plan')->getClientOriginalExtension();


                if ($request->file('image_plan')->storeAs(
                    'houses_planimetria_images/'.$house_id, $fileNameToStore, 'public'
                )) {
                    $new = new HousePhoto();
                    $new->house_id = $house_id;
                    $new->is_planimetria = 1;
                    $new->path_photo = '/houses_planimetria_images/'.$house_id.'/'.$fileNameToStore;
                    $new->save();
                }
            } else {
                return 'error';
            }
        }

        function deletePhoto($house_photo_id)
        {
            if (HousePhoto::find($house_photo_id)->delete()) {
                return 'ok';
            } else {
                return 'ko';
            }
        }
    }
