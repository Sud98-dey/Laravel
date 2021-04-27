<?php

namespace App\Http\Controllers;
use App\Models\Lead;    use App\Models\Feedback;
use App\Models\Property;    use App\Models\User;    use App\Models\subscriber;
use Illuminate\Http\Request;    use Session;
use Illuminate\Support\Facades\DB;
	
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
    	//$lead=Lead::all()->first();
        //$Property=Property::Where('id',$lead->PropId)->get();
        $Property=DB::table('properties')->join('leads','properties.id','=','leads.PropId')->where('properties.status','active')->select('properties.*','leads.ConsId')->get();
        $subscriber=subscriber::all();
    	return view('SelectedGrid')->with(['data'=>$Property,'subs'=>$subscriber]);
    }
    public function delete($id){
    	$rec=Lead::Where('PropId',$id)->delete();
        return redirect('/SelectedGrid');	 
    }
    public function show($id){
        //$Property=Property::Where('id',$id)->get();
        $Property=Property::find($id);
        $Owner=DB::table('users')->join('properties','properties.OwnerId','=','users.id')->where('properties.id',$id)->select('users.*')->get();
        return view('SelectSingle')->with(['prp'=>$Property,'Owner'=>$Owner]);
    }
    public function feedback(Request $req,$id){
     
     $Feedback = new Feedback;
     $Feedback->ConsId = Session::get('User');
     $Feedback->PropId = $id;
     $Feedback->Message= $req->input('Message');
     $Feedback->save();
      return redirect()->route('Consumer.index');
    }
    public function showData($id)
    {
    $Property=Property::Where('id',$id)->get();
    $Consumer=DB::table('leads')->select('users.*','leads.PropId')->join('users','users.id','=','leads.ConsId')->get();
    $Owner=DB::table('users')->join('properties','properties.OwnerId','=','users.id')->where('properties.id',$id)->select('users.*')->get();
        return view('admin.Property')->with(['Property'=>$Property,'Consumer'=>$Consumer,'Owner'=>$Owner]);
    }
}
