<?php

namespace App\Http\Controllers\People;

use App\Models\JobPosition;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('people.index')
            ->with('people', User::simplePaginate(12));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('people.create')
            ->with('person', new User());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $person = new User();
        $person->first_name = $request->input('first-name');
        $person->last_name = $request->input('last-name');
        $person->email = $request->input('work-email');
        $person->personal_email = $request->input('personal-email');
        $person->password = Hash::make(uniqid());
        $person->address1 = $request->input('address-one');
        $person->address2 = $request->input('address-two');
        $person->zip = $request->input('postcode');
        $person->city = $request->input('city');
        $person->state = $request->input('state');
        $person->country = $request->input('country');
        $person->dob = Carbon::createFromFormat('d/m/Y', $request->input('dob'))->toDateString();
        $person->work_telephone = $request->input('work-telephone');
        $person->personal_telephone = $request->input('personal-telephone');
        $person->gender = $request->input('gender');

        $person->save();

        // Placeholder face until one is submitted
        $path = 'people/'.$person->id.'/face.jpg';
        \Illuminate\Support\Facades\Storage::put($path, file_get_contents('http://api.adorable.io/avatar/400/'.md5($person->id.$person->email.Carbon::now()->getTimestamp()).''));

        $person->save();

        $person->jobPositions()->attach(1);

        return redirect()->intended('/people/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('people.show')
            ->with('person', User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('people.edit')
            ->with('person', User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $person = User::find($id);

        $person->first_name = $request->input('first-name');
        $person->last_name = $request->input('last-name');
        $person->email = $request->input('work-email');
        $person->personal_email = $request->input('personal-email');
        $person->address1 = $request->input('address-one');
        $person->address2 = $request->input('address-two');
        $person->zip = $request->input('postcode');
        $person->city = $request->input('city');
        $person->state = $request->input('state');
        $person->country = $request->input('country');
        $person->dob = Carbon::createFromFormat('d/m/Y', $request->input('dob'))->toDateString();
        $person->work_telephone = $request->input('work-telephone');
        $person->personal_telephone = $request->input('personal-telephone');
        $person->gender = $request->input('gender');

        $person->save();

        return redirect()->intended('/people/'.$person->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getFace($id) {
        $user = User::find($id);
        return response()->file(storage_path('app/').'/people/'.$user->id.'/face.jpg');
    }
}
