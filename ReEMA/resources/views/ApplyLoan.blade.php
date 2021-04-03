@extends('master')
@section('title')  
Loan Schemes
@stop
@section('content')


<body> 
<div>
<a class="title-a" href="{{ route('Consumer.index') }}">Back</a>
</div>  

<div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">Loan Schemes</h3>
            </div>

          </div>
          <div class="row property-grid grid">
            @foreach($Loan as  $L)
            <div class="col-sm-10">
              <div class="card">
                <div>
                  <div>
                    <h2 class="card-title">
                        <a href="#">Loan Info</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span> Id | {{ $L->id}}</span>
                      </div>
                      
                    
                    <div class="card-footer">
                      <div class="card-footer d-flex justify-content-around">
                         <div>
                          <h4>Scheme</h4>
                          <span> {{ $L->LoanScheme }}</span>
                        </div>
                        <div>
                          <h4 class="card-info-title"> Institution</h4>
                          <span>{{ $L->Institution }}</span>
                        </div>
                        <div>
                          <h4 class="card-info-title">Interest</h4>
                          <span>{{ $L->ROI }}%</span>
                        </div>
                        <div>
                          <h4 class="card-info-title">Duration</h4>
                          <span>{{ $L->Duration }} months</span>
                        </div>
                        <div>
                          <span> 
                            <a class="btn btn-primary" href="/ApplyingLoan/{{$id}}/{{$L->id}}">Apply</a>
                            </span>
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