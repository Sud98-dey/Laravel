@extends('master')
@section('title') Properties Grid @stop
@section('content')
 <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"> Properties Grid</h1>
             </div>
          </div>
        </div>  
    </div>
    <div class="row property-grid">
            <div class="col-md-11">
              <div class="grid-option">
                <form class="form-group" method="get" action="/Search">
                <input type="text" name="Search" placeholder="Enter City" class="form-control-lg">  
                 
                </form>
              </div>
            </div>
          </div>
      </div>
  </section>  

 <section class="property-grid grid">
      <div class="container">
        <div class="row">
          @foreach($Property as $value)
          <div class="col-md-5">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="{{asset('images/'.$value->Profile)}}"  class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="{{ route('Property.show',$value->id) }}">
                        {{ $value->HouseNo}},{{$value->Society_Name}},
                        <br />{{$value->Locality}},{{$value->Landmark}} <br />
                        {{$value->Area}},{{$value->City}} </a>
                      
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">{{$value->Purpose}} | Rs.{{$value->Price}}</span>
                    </div>
                    <a href="{{ route('Consumer.create') }}" class="link-a">Click here 
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