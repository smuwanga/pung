@extends('layouts.app')

 

@section('content')

	<div class="row">

	    <div class="col-lg-12 margin-tb">

	        <div class="pull-left">

	            <h2>Create New Patient</h2>

	        </div>

	        <div class="pull-right">

	            <a class="btn btn-primary" href="{{ route('patients.index') }}"> Back</a>

	        </div>

	    </div>

	</div>

	@if (count($errors) > 0)

		<div class="alert alert-danger">

			<strong>Whoops!</strong> There were some problems with your input.<br><br>

			<ul>

				@foreach ($errors->all() as $error)

					<li>{{ $error }}</li>

				@endforeach

			</ul>

		</div>

	@endif

	{!! Form::open(array('route' => 'patients.store','method'=>'POST','id'=>'create_patient')) !!}

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {!! Form::text('name', null, array('placeholder' => 'Name of Patient','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Sex:</strong>
				{!! Form::select('sex', ['---','Female','Male'],['placeholder' => 'Sex','class' => 'form-control']) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ART No:</strong>
                {!! Form::text('art_number', null, array('placeholder' => 'ART No','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="md-form">
                <strong>Date of Birth:</strong>
                {!! Form::date('date', (!empty($entry['date_submit']) ? $entry['date_submit']->format('M j, Y') : null), ['class' =>'date-time form-control datepicker ' . ($errors->has('date_submit') ? ' validate invalid' : '' )]) !!}
    
            </div>
        </div>

         <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>District:</strong>
				{!! Form::select('district', $districts,array('placeholder' => 'District','class' => 'form-control')) !!}

            </div>

        </div>

		<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
           
                <strong>Sub County:</strong>
				{!! Form::select('sub_county', $subCounties, array('placeholder' => 'Sub-County','class' => 'form-control')) !!}
                
            </div>

        </div>
		
		<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Facility:</strong>
				{!! Form::select('health_facility', $subCountyFacilities,array('placeholder' => 'Facility','class' => 'form-control')) !!}

            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Patient Unique Number:</strong>
                {!! Form::text('patient_unique_number', null, array('placeholder' => 'Patient Unique Number','class' => 'form-control', 'id'=>'pun')) !!}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

				<button type="submit" class="btn btn-primary">Save Patient</button>

        </div>

	</div>

	{!! Form::close() !!}

@endsection