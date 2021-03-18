@extends('master')
@section('title')
Edit Property
@stop
@section('content')
<div class="box-collapse-wrap form">
      <form class="form-a" method="Post" enctype="multipart/form-data" 
      action="{{ route('Property.update',$data->id) }}" >
        @csrf
        @method('Put')
        <div class="row">
           <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Registration No</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Enter Registration No" name="RegNo" value="{{$data->RegNo}}">
            </div>
          </div>
          <div class="col-md-5 mb-2">
            <div class="form-group">
              <label for="Type">House/Property No</label>
              <input type="text" class="form-control form-control-lg form-control-a" placeholder="Enter Property No" name="HouseNo" value="{{$data->HouseNo}}">
            </div>
          </div>
           <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Society/Complex Name</label>
              <input type="text" class="form-control form-control-lg form-control-a" 
              name="Society" value="{{ $data->Society_Name}}">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Locality</label>
              <input type="text" class="form-control form-control-lg form-control-a" 
              name="Locality" value="{{ $data->Locality}}">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Enter Landmark</label>
              <input type="text" class="form-control form-control-lg form-control-a" 
              name="Landmark" value="{{$data->Landmark}}">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Enter Area</label>
        <input type="text" class="form-control form-control-lg form-control-a" 
         name="Area" value="{{$data->Area}}">
            </div>
          </div>
          
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Enter City</label>
              <input type="text" class="form-control form-control-lg form-control-a" name="City" 
              value="{{$data->City}}" >
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Size(in SqFt) </label>
              <input type="number" 
  class="form-control form-control-lg form-control-a" name="Size" value="{{$data->Size}}">
            </div>
          </div>
          <div class="col-md-12">
        <label> Add Profile Image:</label>
        <input type="file" name="Profile" src="{{$data->Profile}}">
      </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="Type">Description</label>
              <textarea class="form-control form-control-lg form-control-a" 
              name="Desc" cols="45" rows="5">{{$data->Desc}} </textarea> 
            </div>
          </div>   
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type">Type</label>
              <select class="form-control form-control-lg form-control-a" 
              name="Type" value="{{$data->Type}}">
                <option>Commercial</option>
                <option>Residential</option>
                <option> Both </option>
                
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="city">Purpose</label>
              <select class="form-control form-control-lg form-control-a" 
              name="Purpose" value="{{$data->Purpose}}">
                <option>Rent </option>
                <option> Sell </option>
                <option> Lease </option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bedrooms">Sub Type</label>
              <select class="form-control form-control-lg form-control-a" 
              name="SubType" value="{{$data->SubType}}">
                <option>1BHK</option>
                <option>2BHK</option>
                <option>3BHK</option>
                <option>4BHK</option>
                <option>5BHK</option>
                <option>Villa</option><option>Office</option><option>Shop</option>
                <option>Warehouse</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="Type"> Expected Price</label>
              <input type="number" class="form-control form-control-lg form-control-a" 
              name="Price" value="{{$data->Price}}">
            </div>
          </div>
           
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bathrooms">Status</label>
              <select class="form-control form-control-lg form-control-a" 
              name="Status" value="{{$data->Status}}">
                <option>Active</option>
                <option>Sold</option>
                <option>Rented</option>
                
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Construction Status</label>
              <select class="form-control form-control-lg form-control-a" name="C_Status" value="{{$data->C_Status}}">
                <option>Developed</option>
                <option>Resale</option>
                <option>Developing</option>

              </select>
            </div>
          </div>
          @if ($errors->any())
      
        <template class="alert alert-danger"> 
            @foreach ($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
        </template>
      @endif
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Edit Property</button>
          </div>
        </div>
      </form>
    </div>
    @stop