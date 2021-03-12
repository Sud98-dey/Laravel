@extends('master')
@section('title')  
Registration
@stop
@section('content')
<body style="background-image:url('assets/img/property-1.jpg')">
     
     
    <form method="post" 
    enctype="multipart/form-data" 
    class="section-tb85 shadow" action="{{ route('Owner.store') }}" 
    style="text-align: center; background-color:#ccca;">
            @csrf
            
       	<h2> Property Owner Registration </h2>
       
 
    	<div>
    		<input type="text" name="Fullname" placeholder="Enter Full name"> 
    	</div> 
      @error('Fullname')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>
    	<label> House No </label> <input type="text" name="HouseNo" size="5pt">
    	</div>
      @error('HouseNo')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>	 
    	    <input type="text" name="Societyname" placeholder="Enter Society Name"> 
    	</div>
    	<div>
    		<input type="text" name="Locality" placeholder="Enter Your Locality"> 
    	</div>
    	<div>
    		<input type="text" name="Landmark" placeholder="Enter Your Landmark"> 
    	</div>
    	<div>
    		<input type="text" name="Area" placeholder="Enter Your Area"> 
    	</div>
    	<div>
    		<input type="text" name="City" placeholder="Enter Your City"> 
    	</div>
      @error('City')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>
    		<div>
    		DOB : <input type="date" name="UserDOB"> 
    	</div>
    	<div>
    		<input type="Email" name="email" placeholder="Enter Email ID"> 
    	</div>
      @error('email')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>
    		<input type="tel" name="PhoneNo" placeholder="Enter Mobile/Phone number"> 
    	</div>
    	<div>
    	 Gender: <select name="Gender"> <option> Male </option> <option> Female </option> </select> 
    	</div>
      <div>
        <label>Add Profile Image: </label>
        <input id='profile' type="file" name="profile">
      </div>
    	<div>
    		<input type="password" name="password" placeholder="Enter your password"> 
    	</div>
      @error('password')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
    	<div>
    		<input type="password" name="pass2" placeholder="Re Enter password"> 
    	</div>
      
      
      
    	@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      @else
      <div>
    		<button class="btn btn-b" >Submit </button> 
    		<button type="Reset" class="btn btn-a"> Reset </button> 
    	</div>
    	@endif
      <div> 
        <ol class="navbar nav">
        <li class="nav-item"><a href="{{ route('Consumer.create') }}" class="link b"> Consumer SignIn </a></li>
    		<li class="nav-item"> <a href="{{ route('Agent.create') }}" > EstateAgent SignIn </a></li>
    		<li class="nav-item"> <a href="{{ route('Financer.create')}}"> Financer SignIn </a></li>
    		<li class="nav-item"> <a href="/"> Back  </a></li>
    	</ol>
    	</div>
  </form>
     
@stop