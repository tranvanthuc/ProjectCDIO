@extends('sb-admin.layout')

@section('title','Edit News')
@section('header','Edit News')

@section('content')
<div class="content">
	<form method="post" enctype="multipart/form-data" name="formEditNews" onsubmit="return checkTypeImage();">
		{{ csrf_field() }}
		<div class="col-md-offset-3 col-md-6">
			<div class="form-group" >
				<label>Title</label>
				<input type="text" class="form-control" placeholder="Enter title news" name="title" value="@if(old('title')!=null){{ old('title') }}@else{{ $news->title }}@endif">
			</div>

			<div class="form-group">
				<label >Choose Major</label>
				<select class="form-control" name="sltMajors" >
					<option value="">Choose Major</option>

					@foreach($listMajors as $major)
					@if(old('sltMajors') !=null)
					<option value="{{ $major->id }}" {{ (old('sltMajors') == $major->id) ? "selected" : ""}}> {{ $major->name }}</option>
					@else 
					<option value="{{ $major->id }}" {{ ($news->major_id == $major->id) ? "selected" : ""}}> {{ $major->name }}</option>
					@endif

					
					@endforeach
				</select>
			</div>

			<div class="form-group">
			<label for="sltSubjects">Subject</label>
				<select class="form-control" name="sltSubjects">
					<option value="">Choose subject</option>
					@foreach($listSubjects as $subject)
					@if(old('sltSubjects') != null)
					<option value="{{ $subject->id }}" {{ (old('sltSubjects') == $subject->id) ? "selected" : ""}}> {{ $subject->name }}</option>
					@else 
					<option value="{{ $subject->id }}" {{ ($news->major_id == $subject->id) ? "selected" : ""}}> {{ $subject->name }}</option>
					@endif
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label >Description</label>
				<textarea class="form-control" name="desc" cols="30" rows="10">@if(old('desc')!=null){{ old('desc') }}@else{!! $news->desc!!}@endif</textarea>

				{{-- <script type="text/javascript">ckfinder("desc"); </script> --}}
			</div>
			
			<div class="form-group">
				<label>Price</label>
				<input type="text" class="form-control" placeholder="Enter Price" name="price" value="@if(old('price')!=null){{ old('price') }}@else{{ $news->price }}@endif">
			</div>


			<div class="form-group" id="delImg">
				<a class="btn btn-success" id="btnDelImg"><i class="fa fa-times" aria-hidden="true"></i></a>
				<img class="img-responsive img-thumbnail" src="{{ '../../../fitImgNews/'. $news->image.'/490/310' }}" alt="{{ $news->image }}" idImg="{{ $news->id }}">
				{{-- <input type="hidden" name="oldImg" value="{{ $news->image }}"> --}}
			</div>

			<div class="form-group" id="insertChooseImage"></div>

			<div class="form-group">
				<input type="hidden"  idNews="{{$news->id}}">
				<input id="btnEdit" type="submit" class="btn btn-primary" value="Edit news">
				<a href="{{ route('getListNews')}}" class="btn btn-default col-md-offset-1">Cancel</a>

			</div>

		</div>  

		<div id="errors" style="display: none;">

		</div>
	</form>
</div>
@endsection