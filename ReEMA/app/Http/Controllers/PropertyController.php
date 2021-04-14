<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Lead;
use App\Models\User;
use App\Models\subscriber;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $activeId=Session::get('User');
     $data=DB::table('subscriber')->join('properties','properties.OwnerId','=','subscriber.Id')->where('subscriber.id',$activeId)->where('properties.Status','Active')->select('properties.*')->get();
        return view('property-grid')->with(['data'=>$data]);   
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
        'Profile'=>'required|image|mimes:jpg,jpeg,png',
        'Type'=>'required','Purpose'=>'required','Price'=>'required'
        ]);
        $imageName=time().'.'.$request->Profile->extension();
        $request->Profile->move(public_path('images'),$imageName);
        
        $addProperty = new Property;
        $addProperty->OwnerId = Session::get('User');
        $addProperty->RegNo = $request->input('RegNo');
        $addProperty->HouseNo = $request->input('HouseNo');
        $addProperty->Society_Name = $request->input('Society');
        $addProperty->Locality = $request->input('Locality');
        $addProperty->Landmark = $request->input('Landmark');
        $area = strtolower($request->input('Area'));
        $city = strtolower($request->input('City')); 
        $addProperty->Area = ucfirst($area);
        $addProperty->City = ucfirst($city); 
        $addProperty->Purpose = $request->input('Purpose');
        $addProperty->Type = $request->get('Type');
        $addProperty->Size = $request->input('Size');
        $addProperty->SubType = $request->input('SubType');
        $addProperty->Profile = $imageName;
        $addProperty->Price = $request->input('Price');
        $addProperty->Status = 'Active';
        $addProperty->C_Status = $request->input('C_Status');
        $addProperty->Desc = $request->input('Desc');
        $addProperty->save();
        
        return redirect('/Properties');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Property=Property::Where('id',$id)->get();
        $Consumer=DB::table('leads')->select('users.*','leads.PropId')->join('users','users.id','=','leads.ConsId')->get();
        return view('PropertySingle')->with(['Property'=>$Property,'Consumer'=>$Consumer]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $Property=Property::find($id);
    return view('EditProperty')->with('data',$Property);
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
        $updateProperty = Property::find($id);
        $image=$updateProperty->Profile;
        if($request->input('Profile')!=null )
        {       
             $image=time().'.'.$request->Profile->extension();
             $request->Profile->move(public_path('images'),$imageName);
        }
        
        $updateProperty->OwnerId = Session::get('User');
        $updateProperty->RegNo = $request->input('RegNo');
        $updateProperty->HouseNo = $request->input('HouseNo');
        $updateProperty->Society_Name = $request->input('Society');
        $updateProperty->Locality = $request->input('Locality');
        $updateProperty->Landmark = $request->input('Landmark');
        $area = strtolower($request->input('Area'));
        $city = strtolower($request->input('City')); 
        $updateProperty->Area = ucwords($area);
        $updateProperty->City = ucwords($city); 
        $updateProperty->Purpose = $request->input('Purpose');
        $updateProperty->Type = $request->get('Type');
        $updateProperty->Size = $request->input('Size');
        $updateProperty->SubType = $request->input('SubType');
        $updateProperty->Profile = $image;
        $updateProperty->Price = $request->input('Price');
        $updateProperty->Status = $request->input('Status');
        $updateProperty->C_Status = $request->input('C_Status');
        $updateProperty->Desc = $request->input('Desc');
        $updateProperty->save();
        
        return redirect()->route('Property.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $child=Lead::Where('PropId',$id)->delete();
       $record=Property::find($id)->delete();
       return redirect()->route('Property.index');
    }
    public function AllProperties()
    {
      $Property = Property::all();
      return view('properties-grid')->with(['Property'=>$Property]);
     }
}
