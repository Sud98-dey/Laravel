@extends('master')
@section('title')  
Edit Agent Profile
@stop
@section('content')
<body style="background-image:url('assets/img/property-2.jpg')">
<form  method="POST" enctype="multipart/form-data" class="section-tb85 shadow"  
action="{{route('Agent.update',$agent->id) }}" style="text-align: center; background-color:#ccca;">
            @csrf
            @method('PUT')           
       	<h2> Edit Your Details </h2>
       
 
    	<div>
    		<input type="text" name="Fullname" placeholder="Enter Full name" value="{{$agent->Fullname}}"> 
    	</div> 
      @error('Fullname')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>
    	<label> House No </label> <input type="text" name="HouseNo" size="5pt" value="{{$agent->HouseNo}}">
    	</div>
      @error('HouseNo')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>	 
    	    <input type="text" name="Societyname" placeholder="Enter Society Name" value="{{$agent->Societyname}}"> 
    	</div>
    	<div>
    		<input type="text" name="Locality" placeholder="Enter Your Locality" value="{{$agent->Locality}}"> 
    	</div>
    	<div>
    		<input type="text" name="Landmark" placeholder="Enter Your Landmark" value="{{$agent->Landmark}}"> 
    	</div>
    	<div>
    		<input type="text" name="Area" placeholder="Enter Your Area" value="{{$agent->Area}}"> 
    	</div>
    	<div>
    		<input type="text" name="City" placeholder="Enter Your City" value="{{$agent->City}}"> 
    	</div>
      @error('City')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>
    		<div>
    		DOB : <input type="date" name="UserDOB" value="{{$agent->UserDOB}}"> 
    	</div>
    	<div>
    		<input type="Email" name="email" placeholder="Enter Email ID" value="{{$agent->email}}"> 
    	</div>
      @error('email')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>
    		<input type="tel" name="PhoneNo" placeholder="Enter Mobile/Phone number" value="{{$agent->PhoneNo}}"> 
    	</div>
    	<div>
    	 Gender: <select name="Gender" value="{{$agent->Gender}}"> <option> Male </option> <option> Female </option> </select> 
    	</div>
      <div>
        <label>Add Profile Image: </label>
        <input id='profile' type="file" name="profile">
      </div>
    	<div>
    		      
      
      <!--
    	@if ($errors->any())<div class="alert alert-danger">
        <ul>@foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach</ul></div>@endif
    -->
      
      <div><button class="btn btn-b" >Submit </button> <button type="Reset" class="btn btn-a"> Reset </button> </div>
    	
    
        
    	</div>
  </form>
    @stop
  </body>