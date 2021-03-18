<?php

namespace App\Http\Controllers;
use App\Models\Lead;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Session;	
class LeadController extends Controller
{
    public function create($id){
    	$Obj1=Property::Where('id',$id)->first(); 

    	$Obj2=User::Where('id',$Obj1->OwnerId)->first();

        $lead = new Lead;
        $lead->PropId=$id;
        $lead->ConsId=Session::get('User');
    	$lead->OwnerId=$Obj2->id;
    	$lead->Price=$Obj1->Price;
    	$lead->Purpose=$Obj1->Purpose;
    	$lead->Assigned='No';
    	$lead->save();
       return redirect('/SelectedGrid');	
    } 
    public function retrieve(){
    	$lead=Lead::all();
           $id=$lead->PropId; 
        $Property=Property::Where('id',$id)->get();
    	return view('SelectedGrid')->with(['data'=>$Property]);
    }
    public function delete($id){
    	$rec=Lead::Where('PropId',$id)->delete();
        return redirect('/SelectedGrid');	 
    }
}
