@extends('master')
@section('title')
Consumer View
@stop
@section('content')
<section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">{{$value->Fullname}}</h1>
              <span class="color-text-a">{{ $value->Role }} Immobiliari</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#">Owners</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <A href="{{route('Owner.edit',$value->id)}}">{{$value->Fullname}}</A>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single -->

    <section class="agent-single">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              
              <div class="col-md-6">
                <div class="agent-avatar-box">
                 
                <img src="{{ asset('images/'.$value->profile) }}" alt="" class="agent-avatar img-fluid">    
                
                </div>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="agent-info-box">
                  <div class="agent-title">
                    <div class="title-box-d">
                      <h3 class="title-d"> {{$value->Fullname}}
                        </h3>
                    
                    </div>
                  </div>
                  <div class="agent-content mb-3">
                     <p>
                        <strong>DOB: </strong>
                        <span class="color-text-a"> {{$value->UserDOB}}</span>
                      </p>
                    <p class="content-d color-text-a">
                      <strong> Address: </strong>
                      <address>
                      {{$value->HouseNo}},{{$value->Societyname}},<br>
                        {{$value->Locality}},{{$value->Landmark}},
                        {{$value->Area}},{{$value->City}}
                      </address>
                    </p>
                    <div class="info-agents color-a">
                      <p>
                        <strong>Phone: </strong>
                        <span class="color-text-a"> {{$value->PhoneNo}} </span>
                      </p>
                     
                      <p>
                        <strong>Email: </strong>
                        <span class="color-text-a"> {{$value->email}}</span>
                      </p>
                      <p>
                        <strong>skype: </strong>
                        <span class="color-text-a"> sk:01{{$value->Fullname}}.es</span>
                      </p>
                      <p>
                        <strong>SiteEmail: </strong>
                        <span class="color-text-a"> agents@example.com</span>
                      </p>
                    </div>
                  </div>
                </div>  
            </div>
        </div>
    </div>    
</div>
</div>
</section>
<div class="col-md-12 section-t8"></div>
@if($Properties != null)    
 <section class="property-single"> 
 <div class="title-box-d"> <h3 class="title-d"> Acquired Properties ({{ $Properties->count() }})</h3></div>
        <div class="row">
         @foreach($Properties as $key => $value)
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="{{asset('images/'.$value->Profile)}}"  class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">{{ $value->HouseNo}},{{$value->Society_Name}},
                        <br />{{$value->Locality}},{{$value->Landmark}} <br />
                        {{$value->Area}},{{$value->City}} </a>
                      
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                     
                    </div>
                    <a href="#" class="link-a">Click here to View
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
                        <h4 class="card-info-title">Price(Incl. Tax)</h4>
                        <span>Rs. {{$value->Price }}</span>
                      </li>
                   </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>@endforeach
        </div>
</section><hr>
    <div class="col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="title-box-d"><h3 class="title-d"> Feedbacks </h3></div>
            <div class="box-comments">
              <ul class="list-comments">
                @foreach($Feedback as $f)
                <li>
                    <div class="comment-details">
                    <h4 class="comment-author"> {{ strtotime($f->created_at) }} </h4>
                    <span>  Date: {{ $f->created_at }}</span>
                    <p class="comment-description">
                      {{ $f->Message }}
                    </p>
                    <a href="/SelectedSingle/{{$f->PropId }}">View</a>
                  </div>
                </li>
                @endforeach
               </ul>
             </div>
          </div>
         
@endif
@stop
