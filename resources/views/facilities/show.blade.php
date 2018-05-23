@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2> Show Facility</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('facilities.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $facility->name }}
            </div>
        </div>

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NHPI Code:</strong>
                {{ $facility->nhpi_code }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>District:</strong>
                {{ $facility->district }}
            </div>
        </div>
       
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Region:</strong>
                {{ $facility->region }}
            </div>
        </div>

		

	</div>
@endsection
