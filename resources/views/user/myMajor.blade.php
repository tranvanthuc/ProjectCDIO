@extends('user.myLayout')

@if(Auth::check())
	@include('user.myMenuHome')
@else
	@include('user.myMenuIndex')
@endif

@section('title', "Search Major Result")

@section('title_container')
<nav class="navbar navbar-default">
  	<div class="container-fluid">
    	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        	<div class="active"><h3>Chuyên ngành: {{ $major->name}}</h3></div>
      	</div>
    </div>
</nav>
@stop

@section('content')

<section id="content">
  
  @include('user.myshownews')

</section>
@stop

