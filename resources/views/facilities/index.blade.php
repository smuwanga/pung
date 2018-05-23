@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Facility Management</h2>
	        </div>
	        
	    </div>
	</div>
	
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>District</th>
			<th>NHPI Code</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($facilities as $key => $facility)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $facility->name }}</td>
		<td>{{ $facility->district }}</td>
		<td>{{ $facility->nhpi_code }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('facilities.show',$facility->id) }}">Show</a>
		</td>
	</tr>
	@endforeach
	</table>
	{!! $facilities->render() !!}
@endsection