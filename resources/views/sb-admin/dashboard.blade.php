@extends('sb-admin.layout')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
<div class="row">
	

	


	{{-- get list news --}}
	@if(Auth::user()->level_id < 2)
	<div class="col-lg-3 col-md-6">
	@else 
	<div class="col-lg-4 col-md-6 col-md-offset-3 col-lg-offset-4">
	@endif

		<div class="panel panel-green">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{ $totalNews }}</div>
						<div>Total News</div>
					</div>
				</div>
			</div>
			<a href="{{ route('getListNews') }}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

{{-- get list users --}}

	@if(Auth::user()->level_id < 2)
	<div class="col-lg-3 col-md-6">
	
		<div class="panel panel-red">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-support fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{ $totalSubjects }}</div>
						<div>Total Subjects</div>
					</div>
				</div>
			</div>
			<a href="{{ route('getListSubjects') }}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-futbol-o fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{ $totalMajors }}</div>
						<div>Total Majors</div>
					</div>
				</div>
			</div>
			<a href="{{ route('getListMajors') }}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-users fa-5x" aria-hidden="true"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">{{ $totalUsers }}</div>
						<div>Total Users</div>
					</div>
				</div>
			</div>
			<a href="{{ route('getListUser') }}">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	
	

	
	@endif
	
</div>
@stop