<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\LoginController; 
use App\Models\Property;
use App\Models\subscriber;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/contact', function () { return view('contact'); });
//Route::get('/AddOwner',[UserController::class,'create']);

//Registration Pages
Route::get('/AddOwner',function() { return view('PropertyOwnerRegister'); });
Route::get('/AddAgent',function() { return view('AgentRegister'); });
Route::get('/AddConsumer',function() { return view('ConsumerRegister'); });
Route::get('/AddFinancer',function() { return view('FinancerRegister'); });
// User Subscription
Route::get('/Subscribe',function(Request $req){
	    
         $subscriber = new subscriber;
         $subscriber->Id = Session::get('User');
         $subscriber->Amount = $req->get('Schemes');
         $subscriber->Payment_Mode = $req->get('Mode');
         $subscriber->save();
         return redirect('/Properties');
    });
//Controller Resources
Route::resource('Owner', OwnerController::class);
Route::resource('Consumer', App\Http\Controllers\ConsumerController::class);
Route::resource('Agent',App\Http\Controllers\AgentController::class);
Route::resource('Financer',App\Http\Controllers\FinancerController::class);
Route::resource('Property',App\Http\Controllers\PropertyController::class);
//Route::resource('Lead',App\Http\Controllers\LeadController::class);

//Authentication routes
Route::view('/LogIn','UserLogin');
Route::post('/Authenticate',[LoginController::class,'userAuth']);
Route::get('/Logout',[LoginController::class,'SignOut']);

//Profiles routes
Route::view('/OwnerProfile','OwnerSingle');
Route::get('/Admin',function(){
$Property = Property::all(); 
return view('admin.home')->with(['Property'=>$Property]); 
});
Route::get('/AgentProfile',function () { return view('AgentSingle'); });
Route::get('/ConsumerProfile',function () { return view('ConsumerSingle'); });
Route::get('/FinancerProfile',function () { return view('FinancerSingle'); });

//Others
Route::get('/about', function () { return view('about'); });
Route::get('/blogs', function () { return view('blog-grid'); });
Route::get('/blog', function () { return view('blog-single'); });
Route::get('/leads', function () { return view('LeadGrid'); });
Route::get('/Properties',[App\Http\Controllers\PropertyController::class,'index'] ); //Registered properties of Owner.

Route::get('PropertySingle/{id}',[App\Http\Controllers\LeadController::class,'showData']);
Route::get('SelectGrid/{id}',[App\Http\Controllers\LeadController::class,'create']); //Consumer searches properties
Route::get('/SelectedGrid', [App\Http\Controllers\LeadController::class,'retrieve']); // selected properties of consumer
Route::get('DeleteGrid/{id}',[App\Http\Controllers\LeadController::class,'delete']);
Route::get('/SelectedSingle/{id}',[App\Http\Controllers\LeadController::class,'show']); //Detail of each selected properties
Route::get('/AddLoan', function () { return view('LoanSchemeForm'); }); //Adding a loan scheme
//Route::view('Home','welcome');