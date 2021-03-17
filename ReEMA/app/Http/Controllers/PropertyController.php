<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Property;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { return redirect('/Properties');}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validations
        $request->validate([
        'RegNo'=>'required','HouseNo'=>'required',
        'Society'=>'required','Locality'=>'required','Landmark'=>'required',
        'Area'=>'required','City'=>'required',
        'Size'=>'required','Desc'=>'required',
        'profile'=>'required|image|mimes:jpg,jpeg,png',
        'Type'=>'required','Purpose'=>'required','Price'=>'required'
        ]);
        $imageName=time().'.'.$request->profile->extension();
        $request->profile->move(public_path('images'),$imageName);
        
        $addProperty = new Property;
        $addProperty->OwnerId = Session::get('User');
        $addProperty->RegNo = $request->input('RegNo');
        $addProperty->HouseNo = $request->input('HouseNo');
        $addProperty->Society_Name = $request->input('Society');
        $addProperty->Locality = $request->input('Locality');
        $addProperty->Landmark = $request->input('Landmark');
        $addProperty->Area = $request->input('Area');
        $addProperty->City = $request->input('City'); 
        $addProperty->Purpose = $request->input('Purpose');
        $addProperty->Type = $request->get('Type');
        $addProperty->Size = $request->input('Size');
        $addProperty->SubType = $request->input('SubType');
        $addProperty->Profile = $imageName;
        $addProperty->Price = $request->input('Price');
        $addProperty->Status = $request->input('Status');
        $addProperty->C_Status = $request->input('C_Status');
        $addProperty->Desc = $request->input('Desc');
        $addProperty->save();
        
        return redirect('Property.index');

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
}
