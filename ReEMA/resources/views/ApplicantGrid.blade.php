@extends('master')
@section('title')  
Applicant List
@stop
@section('content')


<body> 
<div>
<a class="title-a" href="{{ route('Loans.index') }}">Back</a>
</div>  

<div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">Applicant List</h3>
            </div>

          </div>
          <div class="row property-grid grid">
            @foreach($Applicant as  $A)
            <div class="col-sm-10">
              <div class="card">
                <div>
                  <div>
                    <h2 class="card-title">
                        <a href="#">Applicant Info</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span> Id | {{ $A->id}}</span>
                      </div>
                      
                    
                    <div class="card-footer">
                      <div class="card-footer d-flex justify-content-around">
                         <div>
                          <h4>Name</h4>
                          <span> {{ $A->Fullname }}</span>
                        </div>
                        <div>
                          <h4 class="card-info-title"> Email</h4>
                          <span>{{ $A->email }}</span>
                        </div>
                        <div>
                          <h4 class="card-info-title">PhoneNo</h4>
                          <span>{{ $A->PhoneNo }}</span>
                        </div>
                        <div>
                          <h4 class="card-info-title">Scheme</h4>
                          
                            @if($Loan != null)
                          <span> {{ $Loan }}</span>
                          @endif
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           @endforeach
           <!--
            <div class="col-sm-10">
              <div class="card">
                <div>
                  <div>
                    
                      <h2 class="card-title">
                        <a href="#">Lead  Info</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span>rent | $ 12.000</span>
                      </div>
                      
                    
                    <div class="card-footer">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Area</h4>
                          <span>340m
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span>2</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Baths</h4>
                          <span>4</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Garages</h4>
                          <span>1</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div>
                  <div>
                    <h2 class="card-title">
                        <a href="#">Lead Info</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span>rent | $ 12.000</span>
                      </div>
                      
                    
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Area</h4>
                          <span>340m
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span>2</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Baths</h4>
                          <span>4</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Garages</h4>
                          <span>1</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
                  </div> 
      @stop
      </body>