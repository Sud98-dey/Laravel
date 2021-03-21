<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       try {
            $users = User::Where('Role',"Owner")->get();
            return view('OwnerSingle')->with(['data'=>$users]);   
        } 
        catch (Exception $e) { return $e; }
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/AddOwner');
    }

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
        'Fullname'=>'required','HouseNo'=>'required',
        'Societyname'=>'required','Locality'=>'required',
        'Area'=>'required','City'=>'required',
        'email'=>'required','PhoneNo'=>'required',
        'profile'=>'required|image|mimes:jpg,jpeg,png',
        'password'=>'required','pass2'=>'required','UserDOB'=>'required'
        ]);
        $imageName=time().'.'.$request->profile->extension();
        $request->profile->move(public_path('images'),$imageName);
        
        $addUser = new User;
        $addUser->Fullname = $request->input('Fullname');
        $addUser->HouseNo = $request->input('HouseNo');
        $addUser->Societyname = $request->input('Societyname');
        $addUser->Locality = $request->input('Locality');
        $addUser->Landmark = $request->input('Landmark');
        $addUser->Area = $request->input('Area');
        $addUser->City = $request->input('City'); 
        $addUser->UserDOB = $request->input('UserDOB');
        $addUser->Gender = $request->get('Gender');
        $addUser->PhoneNo = $request->input('PhoneNo');
        $addUser->email = $request->input('email');
        $addUser->profile = $imageName;
        $addUser->password = $request->input('password');
        $addUser->Role = 'Owner';
        $addUser->save();

        return redirect('/LogIn');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($emailid)
    {
      try {
            $user = User::Where('email',$emailid)->get();
            return view('OwnerSingle')->with(['data'=>$user]);   
        } 
        catch (Exception $e) { return $e; }
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $owner = User::find($id);
        return view('EditOwner')->with('owner',$owner);        
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
        
        $updateUser=User::find($id);
        $pass=$updateUser->password;
        $imageName = $updateUser->profile;
        if($request->input('profile')!=null)
        {
         $imageName=time().'.'.$request->profile->extension();
         $request->profile->move(public_path('images'),$imageName);
        }
        $updateUser->Fullname = $request->input('Fullname');
        $updateUser->HouseNo = $request->input('HouseNo');
        $updateUser->Societyname = $request->input('Societyname');
        $updateUser->Locality = $request->input('Locality');
        $updateUser->Landmark = $request->input('Landmark');
        $updateUser->Area = $request->input('Area');
        $updateUser->City = $request->input('City'); 
        $updateUser->UserDOB = $request->input('UserDOB');
        $updateUser->Gender = $request->get('Gender');
        $updateUser->PhoneNo = $request->input('PhoneNo');
        $updateUser->email = $request->input('email');
        $updateUser->profile = $imageName;
        $updateUser->password = $pass;
        $updateUser->Role = 'Owner';
        $updateUser->save();        
        return redirect()->route('Owner.index');
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
