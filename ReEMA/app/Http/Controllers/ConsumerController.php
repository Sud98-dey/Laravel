<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Property;
use App\Models\Loan;
use App\Models\Applicant; 
use App\Models\SoldProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Session;
class ConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $users = User::Where('Role',"Consumer")->get();
            $Properties=DB::table('subscriber')->join('properties','properties.OwnerId','=','subscriber.Id')->where('properties.Status','Active')->select('properties.*')->get();
            return view('ConsumerSingle')->with(['data'=>$users,'Properties'=>$Properties]);   
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
        return redirect('/AddConsumer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $area = strtolower($request->input('Area'));
        $city = strtolower($request->input('City')); 
        $addUser->Area = ucwords($area);
        $addUser->City = ucwords($city); 
        $addUser->UserDOB = $request->input('UserDOB');
        $addUser->Gender = $request->get('Gender');
        $addUser->PhoneNo = $request->input('PhoneNo');
        $addUser->email = $request->input('email');
        $addUser->profile = $imageName;
        $addUser->password = $request->input('password');
        $addUser->Role = 'Consumer';
        $addUser->save();

        return redirect('/LogIn');

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
        $consumer = User::find($id);
        return view('EditConsumer')->with('consumer',$consumer);
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
        $imageName=time().'.'.$request->profile->extension();
        $request->profile->move(public_path('images'),$imageName);
        
        $updateUser=User::find($id);
        $pass=$updateUser->password;
        $image=$request->file('profile');        
        $updateUser->Fullname = $request->input('Fullname');
        $updateUser->HouseNo = $request->input('HouseNo');
        $updateUser->Societyname = $request->input('Societyname');
        $updateUser->Locality = $request->input('Locality');
        $updateUser->Landmark = $request->input('Landmark');
        $area = strtolower($request->input('Area'));
        $city = strtolower($request->input('City')); 
        $updateUser->Area = ucwords($area);
        $updateUser->City = ucwords($city); 
        $updateUser->UserDOB = $request->input('UserDOB');
        $updateUser->Gender = $request->get('Gender');
        $updateUser->PhoneNo = $request->input('PhoneNo');
        $updateUser->email = $request->input('email');
        $updateUser->profile = $imageName;
        $updateUser->password = $pass;
        $updateUser->Role = 'Consumer';
        $updateUser->save();        
        return redirect()->route('Consumer.index');
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
    public function Apply($id)
    {
        $Loan=Loan::all();
        return view('ApplyLoan')->with(['Loan'=>$Loan,'id'=>$id ]);
    }
    public function ApplyLoan($id,$LoanId)
    {
      $Applicant = new Applicant;
      $SoldProp = new SoldProperty;
      $Prop = Property::find($id);
      $Applicant->Id = Session::get('User');
      $Applicant->PropId = $id;
      $Applicant->LoanId = $LoanId;
      
      $SoldProp->Householder = Session::get('User');
      $SoldProp->Owner = $Prop->OwnerId; 
      $SoldProp->PropId = $id;
      $Prop->Status = 'Inactive'; 
     $Prop->save();  $SoldProp->save(); $Applicant->save();
            return redirect()->route('Consumer.index');
    }
    
}
