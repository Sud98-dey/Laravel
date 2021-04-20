@extends('master')
@section('title')
 Password Reset Page
 @stop
 <body style="background-image:url('assets/img/property-2.jpg')">
       
       	
       	@section('content')	
    	  <center style="padding-top: 5rem;"> 
    	   
    	   
         <form  method="Post" action="/Reset" class="section-tb85 shadow" style="background-color:#ccca; padding: 5rem;">      	
           <h2> Reset Password </h2>
           @csrf
            <div class="col-md-10 mb-3">
            <div class="form-group">
             <input type="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Enter your EmailID" >
            </div>
            </div>
 
       @if(Session::get('fail'))
       <div class="alert alert-warning">{{ Session::get('fail') }}</div>
       @endif
        <div class="col-md-10 mb-3">
       <div class="form-group">
    <input type="password" name="pass1" class="form-control form-control-lg form-control-a" placeholder="Enter your password" >
      </div>
      </div>
      <div class="col-md-10 mb-3">
       <div class="form-group">
    <input type="password" name="pass2" class="form-control form-control-lg form-control-a" placeholder="ReEnter your password" >
      </div>
      </div>
      @if(Session::get('fail'))
       <div class="alert alert-warning">{{ Session::get('fail') }}</div>
       @endif

         <div>
         <button class="alert btn-success">Submit </button> 
         <button type="Reset" class="alert btn-primary"> Reset </button> 
         </div>
       <div> <a href="/LogIn" class="btn btn-success"> Back To Login </a> </div>  
     
    	</form>
    	 
    	 </center>
       @stop    	
       