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
            elseif ($userInfo->Role == 'Admin') { return redirect('/Admin'); }
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
       function ResetPass(Request $request){
        $userInfo=User::where('email',$request->email)->first();
        if (!$userInfo) {return back()->with('fail','Email Address does not exist');}
        else{
          if($request->pass1 == $request->pass2)
            { $userInfo->password = $request->pass2; $userInfo->save(); return redirect('/LogIn'); }
          else { return back()->with('fail','Password Mismatch'); }
         }
       }
  }
