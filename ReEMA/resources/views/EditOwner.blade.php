@extends('master')
@section('title')  
Edit Owner Profile
@stop
@section('content')
<body>
<form  method="POST" enctype="multipart/form-data" class="section-tb85 shadow"  
action="{{route('Owner.update',$owner->id) }}" style="text-align: center; background-color:#ccca;">
            @csrf
            @method('PUT')           
       	<h2> Edit Your Details </h2>
       
 
    	<div class="col-md-10 mb-3">
       <div class="form-group">
    		<input type="text" name="Fullname" class="form-control form-control-lg form-control-a" 
        placeholder="Enter Full name" value="{{$owner->Fullname}}"> 
    	</div> </div>
      @error('Fullname')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div class="col-md-6 mb-3">
       <div class="form-group">
    	<input type="text" name="HouseNo" class="form-control form-control-lg form-control-a"  
      size="5pt" value="{{$owner->HouseNo}}">
    	</div></div>
      @error('HouseNo')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div class="col-md-10 mb-3">	 
    	    <input type="text" name="Societyname" class="form-control form-control-lg form-control-a"   
          placeholder="Enter Society Name" value="{{$owner->Societyname}}"> 
    	</div>
    	<div class="col-md-10 mb-3">
    		<input type="text" name="Locality" class="form-control form-control-lg form-control-a" 
        placeholder="Enter Your Locality" value="{{$owner->Locality}}"> 
    	</div>
    	<div class="col-md-10 mb-3">
    		<input type="text" name="Landmark" class="form-control form-control-lg form-control-a"
        placeholder="Enter Your Landmark" value="{{$owner->Landmark}}"> 
    	</div>
    	<div class="col-md-10 mb-3"> 
    		<input type="text" name="Area"class="form-control form-control-lg form-control-a" 
        placeholder="Enter Your Area" value="{{$owner->Area}}"> 
    	</div>
    	<div class="col-md-10 mb-3">
    		<input type="text" name="City" class="form-control form-control-lg form-control-a"
        placeholder="Enter Your City" value="{{$owner->City}}"> 
    	</div>
      @error('City')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>
    		<div class="col-md-10">
    		DOB : <input type="date" name="UserDOB"class="form-control form-control-lg form-control-a"
         value="{{$owner->UserDOB}}"> 
    	</div>
    	<div class="col-md-10">
    		<input type="Email" name="email"class="form-control form-control-lg form-control-a"
         placeholder="Enter Email ID" value="{{$owner->email}}"> 
    	</div>
      @error('email')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div class="col-md-10">
    		<input type="tel" name="PhoneNo"  class="form-control form-control-lg form-control-a"
        placeholder="Enter Mobile/Phone number" value="{{$owner->PhoneNo}}"> 
    	</div>
    	<div class="col-md-10 mb-3">
    	 <label class="form-control-lg"> Gender </label>  <select name="Gender" class="form-control" 
       value="{{$owner->Gender}}"> <option> Male </option> <option> Female </option> </select> 
    	</div>
      <div class="col-md-10 mb-3">
        <label>Add Profile Image: </label>
        <input id='profile' type="file"  class="form-control form-control-lg form-control-a" name="profile">
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