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
			<th>Sex</th>
			<th>Date of Birth</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($patients as $key => $patient)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $patient->name }}</td>
		<td>{{ $patient->sex }}</td>
		<td>{{ $patient->date_of_birth }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('patients.show',$patient->id) }}">Show</a>
			@permission('patient-edit')
			<a class="btn btn-primary" href="{{ route('patients.edit',$patient->id) }}">Edit</a>
			@endpermission
			@permission('patient-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['patients.destroy', $patient->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $patients->render() !!}
@endsection