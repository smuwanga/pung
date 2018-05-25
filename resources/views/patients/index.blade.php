@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Patient Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission('patient-create')
	            <a class="btn btn-success" href="{{ route('patients.create') }}"> Create New Patient</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>

			<th>Name</th>
			<th>Patient Unique Number</th>
			<th>Sex</th>
			<th>Date of Birth</th>

			<th>Health Facility</th>
			<th>District</th>
		</tr>
	@foreach ($patients as $key => $patient)
	<tr>
		<td>{{ ++$i }}</td>

		<td>{{ $patient->patient }}</td>
		<td>{{ $patient->patient_unique_number }}</td>
		<td>{{ $patient->gender }}</td>
		<td>{{ $patient->date_of_birth }}</td>

		<td>{{ $patient->facility }}</td>
		<td>{{ $patient->district }}</td>
		

		
	</tr>
	@endforeach
	</table>
	
@endsection