@extends('master')

 @section('title')
 Login Page
 @stop
 <body style="background-image:url('assets/img/property-1.jpg')">
       
       	
       	@section('content')	
    	  <center> 
    	  <div class="card-body container section-tb85"> <h2> Sign UP </h2>
    	   
         <form  method="Post" action="Authenticate" class="form-vertical col-md-7 col-md-offset-2" >      	
           @csrf
           <div class="row"> 
    	  		<div class="col-sm-7 ">
                <div class="form-group">
                 <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" data-rule="email">
                 <div class="validate"></div>
             </div>
           </div>
       </div><!-- Row 1-->
       @if(Session::get('fail'))
       <div class="alert-alert-danger">{{ Session::get('fail') }}</div>
       @endif
         <div class="row"> <div class="col-sm-7 ">
                <div class="form-group">
                 <input name="password" type="password" class="form-control form-control-lg form-control-a" placeholder="Enter your password">
                 <div class="validate"></div>
             </div>
           </div>
      @if(Session::get('fail'))
       <div class="alert-alert-danger">{{ Session::get('fail') }}</div>
       @endif
         </div>
         <div class="row">
         <div class="col-md-4">
         <button type="submit" class="btn btn-a">LogIn</button><br>
        </div>
         <div class="col-md-4 text-center">
         <button type="reset" class="btn btn-a">Reset</button><br>
        </div>
       </div>
         
     </div>
    	</form>
    	 </div> 
    	 </center>
       @stop    	
       