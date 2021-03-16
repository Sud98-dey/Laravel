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
       
 
    	<div class="col-md-10 mb-3">
       <div class="form-group">
        <input type="text" name="Fullname" class="form-control form-control-lg form-control-a" placeholder="Full Name">
      </div>
      </div>
      @error('Fullname')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
      
      <div class="col-md-6 mb-3">
      <div class="form-group">
      <input type="text" name="HouseNo" class="form-control form-control-lg form-control-a" placeholder="HouseNo">
      </div>
      </div>
      @error('HouseNo')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
      <div class="col-md-10 mb-3">
       <div class="form-group">
        <input type="text" name="Societyname" class="form-control form-control-lg form-control-a" placeholder="Society Name" >
      </div>
      </div>
      <div class="col-md-10 mb-3">
       <div class="form-group">
        <input type="text" name="Locality" class="form-control form-control-lg form-control-a" placeholder="Enter your Locality" >
      </div>
      </div>

      <div class="col-md-10 mb-3">
       <div class="form-group">
        <input type="text" name="Landmark" class="form-control form-control-lg form-control-a" placeholder="Enter your Landmark" >
      </div>
      </div>
     <div class="col-md-10 mb-3">
       <div class="form-group">
        <input type="text" name="Area" class="form-control form-control-lg form-control-a" placeholder="Enter your Area" >
      </div>
      </div>
      
      <div class="col-md-10 mb-3">
       <div class="form-group">
        <input type="text" name="City" class="form-control form-control-lg form-control-a" placeholder="Enter your City" >
      </div>
      </div>
     
      @error('City')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
      <div>
        <div class="col-md-10 mb-3">
       <div class="form-group">
        <b class="form-control-lg"> Enter Date Of Birth</b>
        <input type="date" name="UserDOB" class="form-control form-control-lg form-control-a">
      </div>
      </div>

       <div class="col-md-10 mb-3">
       <div class="form-group">
        <input type="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Enter your EmailID" >
      </div>
      </div>
     
      @error('email')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
      <div class="col-md-10 mb-3">
       <div class="form-group">
        <input type="tel" name="PhoneNo" class="form-control form-control-lg form-control-a" placeholder="Enter Mobile Number" >
      </div>
      </div>
     <div class="col-md-10 mb-3">
      <label class="form-control-lg"><b> Select Your Gender</b></label> 
         <select name="Gender" class="form-control"> 
              <option> Male </option> <option> Female </option> 
              </select> 
      </div>
      <div class="col-md-10 mb-3">
        <div class="form-group"> 
        <label class="form-control-lg">Add Your Profile Image </label>
        <input id='profile' type="file" name="profile" class="form-control form-control-lg form-control-a">
      </div></div>  
     <div class="col-md-10 mb-3">
       <div class="form-group">
    <input type="password" name="password" class="form-control form-control-lg form-control-a" placeholder="Enter your password" >
      </div>
      </div>
      @error('password')
      <div class="alert alert-danger"> {{ $message }}</div>
      @enderror
      <div class="col-md-10 mb-3">
       <div class="form-group">
    <input type="password" name="pass2" class="form-control form-control-lg form-control-a" 
    placeholder="ReEnter your password" >
      </div>
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