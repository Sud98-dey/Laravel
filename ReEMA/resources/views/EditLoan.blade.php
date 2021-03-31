@extends('master')
@section('title')
 Edit Loan
@stop
@section('content')
<body style="background-color:#ccc;">
<div class="title-box-d section-tb85 shadow" style="background-color:#ccac;">
      <h3 class="title" style="text-align: center;">Edit Loan Scheme </h3>
    </div>	
	<div class="form section-tb85 shadow" style="background-color:#ccac;">

      <form class="form-a" action="{{ route('Loans.update',$Loan->id) }}" method="Post">
        @csrf
        @method('PUT')
        <div class="row">
         <div class="col-md-5 mb-2">
            <div class="form-group">
              <label for="Type">Scheme Name</label>
              <input type="text" name="LoanScheme" value="{{$Loan->LoanScheme}}" 
              class="form-control form-control-lg form-control-a">
            </div>
          </div>

          <div class="col-md-5 mb-2">
            <div class="form-group">
              <label for="Type">Institution Name</label>
              <input type="text" name="Institution" value="{{ $Loan->Institution}}" 
              class="form-control form-control-lg form-control-a">
            </div>
          </div>
           <div class="col-md-5 mb-2">
            <div class="form-group">
              <label for="Type">RateOfInterest</label>
              <input type="number" name="ROI"  value="{{ $Loan->ROI}}" class="form-control form-control-lg form-control-a">
            </div>
          </div>
          <div class="col-md-5 mb-2">
            <div class="form-group">
              <label for="Type">Duration(In Months)</label>
              <input type="number" value="{{$Loan->Duration}}" name="Duration" class="form-control form-control-lg form-control-a">
            </div>
          </div>
          
          <br>
      @if ($errors->any())
      <section class="alert alert-danger">
        @foreach ($errors->all() as $error)
              <div>{{ $error }}</div>
            @endforeach
      </section>
         @endif
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Update</button>
            <button type="Reset" class="btn btn-a">Reset </button>
          </div>

        </div>
      </form>
    </div>

</body>
@stop