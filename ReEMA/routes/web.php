<?php

use Illuminate\Support\Facades\Route; use Illuminate\Support\Facades\DB;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\LoginController; 
use App\Models\Property; use App\Models\User; use App\Models\Feedback;
use App\Models\subscriber;
use App\Models\SoldProperty;
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
Route::get('/AllProperty',[App\Http\Controllers\PropertyController::class,'AllProperties']);
// User Subscription
Route::get('/Subscribe',function(Request $req){
	    
         $subscriber = new subscriber;
         $subscriber->Id = Session::get('User');
         $subscriber->Amount = $req->get('Schemes');
         $subscriber->Payment_Mode = $req->get('Mode');
         $subscriber->save();
         return redirect('/Properties');
    });
Route::get('/Search',function(Request $req){
  $city=$req->input('Search');
   if($city!= null) { $Property= Property::where('City',$city)->orWhere('City','like', $city.'%')->get(); }
   else { $Property = Property::all(); }
   return view('properties-grid')->with(['Property'=>$Property]);
});
//Controller Resources
Route::resource('Owner', OwnerController::class);
Route::resource('Consumer', App\Http\Controllers\ConsumerController::class);
Route::resource('Agent',App\Http\Controllers\AgentController::class);
Route::resource('Financer',App\Http\Controllers\FinancerController::class);
Route::resource('Property',App\Http\Controllers\PropertyController::class);
Route::resource('Loans',App\Http\Controllers\LoanController::class);
//Route::resource('Lead',App\Http\Controllers\LeadController::class);

//Authentication routes
Route::view('/LogIn','UserLogin');
Route::view('/ResetView','ResetPassword');
Route::post('/Authenticate',[LoginController::class,'userAuth']);
Route::post('/Reset',[LoginController::class,'ResetPass']);
Route::get('/Logout',[LoginController::class,'SignOut']);
Route::view('/OwnerProfile','OwnerSingle');
//Admin routes
Route::get('/Admin',function(){   $User = User::all(); 
return view('admin.home')->with(['User'=>$User]); 
});
Route::get('/OwnerView/{id}',function($id){ 
$Owner = User::find($id);
$Property=Property::where('OwnerId',$id)->get(); 
return view('admin.OwnerView')->with(['value'=>$Owner,'Properties'=>$Property]);
});
Route::get('/ConsumerView/{id}',function($id){
$Consumer = User::find($id);
$Feedback = Feedback::where('ConsId',$id)->get();
$Property= DB::table('properties')->join('propertyacquired','properties.id','=','propertyacquired.PropId')->where('Householder',$id)->select('properties.*')->get(); 
return view('admin.ConsumerView')->with(['value'=>$Consumer,'Properties'=>$Property,'Feedback'=>$Feedback]);
});

Route::get('/Acquire/{id}',function($id){
$Cons_Id=Session::get('User');
$Property= Property::find($id);
$SoldProp = new SoldProperty;
$SoldProp->Householder=$Cons_Id;
$SoldProp->Owner=$Property->OwnerId;
$SoldProp->PropId = $Property->id;
$Property->Status = 'Inactive';
$Property->save();
$SoldProp->save();

return redirect()->route('Consumer.index');
});
Route::get('/ApplyLoan/{id}',[App\Http\Controllers\ConsumerController::class,'Apply']);
Route::get('/ApplyingLoan/{id}/{LoanId}',[App\Http\Controllers\ConsumerController::class,'ApplyLoan']);
Route::get('/LoanEach/{id}',[App\Http\Controllers\LoanController::class,'LoanEach']);
Route::get('/AgentProfile',function () { return view('AgentSingle'); });
Route::get('/ConsumerProfile',function () { return view('ConsumerSingle'); });
Route::get('/FinancerProfile',function () { return view('FinancerSingle'); });

//Others
Route::get('/about', function () { return view('about'); });
Route::get('/blogs', function () { return view('blog-grid'); });
Route::get('/blog', function () { return view('blog-single'); });
Route::get('/LoanGrid', function () { return view('LoanGrid'); });
Route::get('/Properties',[App\Http\Controllers\PropertyController::class,'index'] ); 
//Registered properties of Owner.

Route::get('PropertySingle/{id}',[App\Http\Controllers\LeadController::class,'showData']);
Route::get('SelectGrid/{id}',[App\Http\Controllers\LeadController::class,'create']); //Consumer searches properties
Route::get('/SelectedGrid', [App\Http\Controllers\LeadController::class,'retrieve']); // selected properties of consumer
Route::get('DeleteGrid/{id}',[App\Http\Controllers\LeadController::class,'delete']);
Route::get('/SelectedSingle/{id}',[App\Http\Controllers\LeadController::class,'show']); //Detail of each selected properties
Route::post('/Feedback/{id}',[App\Http\Controllers\LeadController::class,'feedback']);
Route::get('/AddLoan', function () { return view('LoanSchemeForm'); }); //Adding a loan scheme
//Route::view('Home','welcome');