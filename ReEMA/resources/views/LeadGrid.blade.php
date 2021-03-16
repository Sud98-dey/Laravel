@extends('navigate')
@section('title')  
Property Leads
@stop
@section('navigate')
<div class="navbar-collapse collapse justify-content" id="navbarDefault">
         <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="/">Back</a>
          </li>
       </ul>
    </div>  
@stop
@section('content')
<body> 
<div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">My Leads</h3>
            </div>
          </div>
          <div class="row property-grid grid">
            <div class="col-sm-12">
              <div class="grid-option">
                <form>
                  <select class="custom-select">
                    <option selected>All</option>
                    <option value="1">New to Old</option>
                    <option value="2">For Rent</option>
                    <option value="3">For Sale</option>
                  </select>
                </form>
              </div>
            </div>
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
                      <div class="card-footer d-flex justify-content-around">
                         <div>
                          <h4>Area</h4>
                          <span>340m
                            <sup>2</sup>
                          </span>
                        </div>
                        <div>
                          <h4 class="card-info-title">Beds</h4>
                          <span>2</span>
                        </div>
                        <div>
                          <h4 class="card-info-title">Baths</h4>
                          <span>4</span>
                        </div>
                        <div>
                          <h4 class="card-info-title">Garages</h4>
                          <span>1</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

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
            </div>
                  </div>
      @stop
      </body>