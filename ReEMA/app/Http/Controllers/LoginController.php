<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function __invoke(){ }

    function userAuth(Request $request)
    {
       $userInfo=User::where('email',$request->email)->first();
       if (!$userInfo) {return back()->with('fail','Email Address is not recognized');}
       else{
        if($userInfo->password == $request->password){ 
            $request->session()->put('User',$userInfo->id);
            if($userInfo->Role == 'Financer') { return redirect()->route('Financer.index'); }
            else if($userInfo->Role == 'Consumer') { return redirect()->route('Consumer.index'); }
            elseif($userInfo->Role == 'Agent') { return redirect()->route('Agent.index'); }
            elseif($userInfo->Role == 'Owner') { return redirect()->route('Owner.index'); }
          }
         else { return back()->with('fail','Incorrect password'); }
       }
    }//Login Ended
    function SignOut(){
      if(session()->has('User')){
        session()->pull('User'); 
        return redirect('/LogIn');
      }
    }	

}
