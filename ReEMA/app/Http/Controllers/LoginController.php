<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function __invoke(){ }

    function userAuth(Request $req)
    {
       $email=$req->input('email'); $password=$req->input('password');
       try{ 
        $user = DB::select('select * from users where email = ' . $email .'and password ='.$password);
       }catch(exception $e){ echo $e;}
       
       $req->session()->put('email',$email);

       if($user.Role == 'Financer') { return route('Financer.index'); }
    }	

}
