@extends('master')
@section('title')
 Login Page
 @stop
 <body style="background-image:url('assets/img/property-1.jpg')">
       
       	
       	@section('content')	
    	  <center style="padding-top: 5rem;"> 
    	   
    	   
         <form  method="Post" action="Authenticate" class="section-tb85 shadow" style="background-color:#ccca; padding: 5rem;">      	
           <h2> Sign UP </h2>
           @csrf
            <div class="col-md-10 mb-3">
            <div class="form-group">
             <input type="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Enter your EmailID" >
            </div>
            </div>
 
       @if(Session::get('fail'))
       <div class="alert-alert-danger">{{ Session::get('fail') }}</div>
       @endif
         <div class="col-md-10 mb-3">
       <div class="form-group">
    <input type="password" name="password" class="form-control form-control-lg form-control-a" placeholder="Enter your password" >
      </div>
      </div>
      @if(Session::get('fail'))
       <div class="alert-alert-danger">{{ Session::get('fail') }}</div>
       @endif
         <div>
         <button class="alert btn-success">Submit </button> 
         <button type="Reset" class="alert btn-primary"> Reset </button> 
         </div>
         
     
    	</form>
    	 
    	 </center>
       @stop    	
       