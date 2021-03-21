@extends('navigate')
@section('title')
Consumer Profile
@stop

<body>

  <!-- ======= Property Search Section ======= -->

   <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Subscribe for services</h3>
    </div>
    <span class="close-box-collapse right-boxed ion-ios-close"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" method="get" action="/Subscribe">
        @csrf 
        
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label for="Type">Note</label>
              <p> By Subscribing you are allowed to access services like viewing your registered properties ,Manage your Property and other related services. </p>
              </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="bathrooms">Scheme</label>
              <select class="form-control form-control-lg form-control-a" name="Schemes">
                <option>Monthly(Rs.250)</option>
                <option> Quarterly(Rs.600)</option>
                <option> HalfYear(Rs.1100)</option>
                <option> Yearly(Rs.2000)</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group">
              <label for="price">Payment_Mode</label>
              <select class="form-control form-control-lg form-control-a" name="Mode">
                <option> Credit/Debit Card</option>
                <option> Gpay </option>
                <option> PayPal </option>
                <option> Net Banking</option>
                <option> PayTm </option>
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Subscribe</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
  @section('navigate')

      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="index.html">Estate<span class="color-b">Agency</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/Logout">SignOut</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/SelectedGrid">Property</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/blogs">Blog</a>
          </li>
          <!--
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Pages
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="property-single.html">Property Single</a>
              <a class="dropdown-item" href="blog-single.html">Blog Single</a>
              <a class="dropdown-item" href="agents-grid.html">Agents Grid</a>
              <a class="dropdown-item" href="agent-single.html">Agent Single</a>
            </div>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
          </li>
        </ul>
      </div>
      <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
        Subscribe
      </button>
@stop
<!-- End Header/Navbar -->
@section('content')
  <main id="main">
   @if(Session::get('success'))
       <div class="alert-alert-success">{{ Session::get('success') }}</div>
       @endif

    <!-- ======= Intro Single ======= -->
    
    <!-- ======= Agent Single ======= -->
  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      @else
  @foreach($data as $key => $value)
  @iF($value->id == Session::get('User')) 
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
                  <a href="#">Consumers</a>
                </li>
              <li class="breadcrumb-item active" aria-current="page">
                  <A href="{{route('Consumer.edit',$value->id)}}">{{$value->Fullname}}</A>
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
                  </div>@endif
                  @endforeach
                  @endif
                  <div class="socials-footer">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          <div class="col-md-12 section-t8">
            <div class="property-grid">
            <div class="col-sm-12">
              <div class="grid-option">
                <form method="get">
                  <select class="custom-select" name="Value">
                    <option selected>All</option>
                    <option value="1"> Commercial </option>
                    <option value="1"> Residential </option>
                    <option value="2"> Rent</option>
                    <option value="3"> Sale</option>
                  </select>
                </form>
              </div>
            </div>
            @if($Properties != null)    
            <div class="title-box-d">
              <h3 class="title-d"> Properties ({{ $Properties->count() }})</h3>
            </div>
          </div>
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
                      <span class="price-a">{{$value->Purpose}} | Rs.{{ $value->Price}}</span>
                    </div>
                    <a href="SelectGrid/{{ $value->id}}" class="link-a">Click here to Select
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
          </div>
            
          @endforeach
          @else
          </div>
            <div class="col-md-5"> Please Subscribe to View Properties </div>
      @endif
    </section><!-- End Agent Single -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">EstateAgency</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> contact@example.com
                </li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> +54 356 945234
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">The Company</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Site Map</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Legal</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Agent Admin</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Careers</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Affiliate</a>
                  </li>
                  <li class="item-list-a">
                    <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">International sites</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Venezuela</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">China</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Hong Kong</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Argentina</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Singapore</a>
                </li>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#">Philippines</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Blog</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-dribbble" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">EstateAgency</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->
@stop
