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

	{!! Form::open(array('route' => 'patients.store','method'=>'POST')) !!}

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Sex:</strong>
				{!! Form::select('sex', ['---','Female','Male'],array('placeholder' => 'Sex','class' => 'form-control')) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date of Birth:</strong>
                {!! Form::text('date_of_birth', null, array('placeholder' => 'Date of Birth','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="md-form">
                <strong>Date of Birth:</strong>
                {!! Form::date('date', (!empty($entry['date_submit']) ? $entry['date_submit']->format('M j, Y') : null), ['class' =>'date-time form-control datepicker ' . ($errors->has('date_submit') ? ' validate invalid' : '' )]) !!}
    
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

				<button type="submit" class="btn btn-primary">Submit</button>

        </div>

	</div>

	{!! Form::close() !!}

@endsection