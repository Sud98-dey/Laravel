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
            <a class="nav-link" href="/blogs">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Logout"> LogOut</a>
          </li>
     </ul>
 </div>
 </div>

@stop
@section('content')
 
 <div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">User List</h3>
            </div>

          </div>
          <div class="row property-grid grid">
            
            @foreach($User as  $U)
            @if($U->Role != 'Admin')
            <div class="col-sm-10">
              <div class="card">
                <div>
                     <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span> Id | {{ $U->id}}</span>
                      </div>
                      
                    
                    <div class="card-footer">
                      <div class="card-footer d-flex justify-content-around">
                         <div>
                          <h4>Name</h4> <span> {{ $U->Fullname }}</span>
                        </div>
                        <div>
                          <h4 class="card-info-title"> Email</h4> <span>{{ $U->email }}</span>
                        </div>
                        <div>
                          <h4 class="card-info-title">PhoneNo</h4> <span>{{ $U->PhoneNo }}</span>
                        </div>
                        <div>
                          <h4 class="card-info-title">Role</h4> <span> {{ $U->Role }}</span>
                        </div>
            <div> 
            @if($U->Role == 'Owner')
              <span> <br> <a class="btn btn-info" href="/OwnerView/{{$U->id}}"> View </a> </span> 
            @elseif($U->Role == 'Consumer')
            <span> <br> <a class="btn btn-info" href="/ConsumerView/{{$U->id}}"> View </a> </span> 
            @elseif($U->Role == 'Financer')
            <span> <br> <a class="btn btn-info" href="/LoanEach/{{$U->id}}"> View </a> </span>
            @endif
            </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>@endif
           @endforeach
</div>
@stop