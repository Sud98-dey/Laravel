@extends('navigate')
@section('title')
Admin Dashboard
@stop
@section('navigate')
<div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>
     <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/blogs">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> LogOut</a>
          </li>
     </ul>
 </div>
 </div>

@stop
@section('content')
 <section class="intro-single">
   <div class="container">
   	<div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Users</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties Grid 
                </li>
              </ol>
            </nav>
          </div>
   </div>
 </section>

 <section class="property-grid grid">
      <div class="container">
        <div class="row">
          @foreach($Property as $key => $value)
          <div class="col-md-6">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="{{asset('images/'.$value->Profile)}}"  class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">
                        {{ $value->HouseNo}},{{$value->Society_Name}},
                        <br />{{$value->Locality}},{{$value->Landmark}} <br />
                        {{$value->Area}},{{$value->City}} </a>
                      
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">{{$value->Purpose}} | Rs.{{$value->Price}}</span>
                    </div>
                    <a href="{{ route('Property.edit',$value->id) }}" class="link-a">Click here to Edit
                      <span class="ion-ios-arrow-forward"></span>
                    </a><br>
                    <a href="{{ route('Property.show',$value->id) }}" class="link-a">Click here to View
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Size</h4>
                        <span>{{$value->Size}}ft
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Type</h4>
                        <span>{{$value->Type}}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Sub_Type</h4>
                        <span>{{$value->SubType}} </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Price</h4>
                        <span>Rs. {{$value->Price}}</span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Property</h4>
                        <form action="{{ route('Property.destroy',$value->id) }}" method="Post"> 
                        @csrf
                        @method('DELETE')
                        <span> <button class="btn btn-danger">Delete </button>
                      </span>
                      </form>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </div>
</section>
@stop