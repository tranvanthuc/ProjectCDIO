	@extends('user.myhome')

	@section('content')
	@include('user.blocks.errors')

	<div class="col-md-8 col-md-offset-2" style="margin-top: 10px;margin-bottom: 10px">
		


		<div id="createNewGUI">
			<div class="panel panel-info" id="headDangTin" >
				<div class="panel-heading" id="postNews">
					<label><h1>SỬA TIN</h1></label>
				</div>		
			</div>
			<div class="row">
			<div id="errors" style="display: none;"></div>
				<form method="post" enctype="multipart/form-data" name="formEditNews" onsubmit="return checkTypeImage();">
					<div class="form-group col-md-4 col-md-offset-1">
						<label>Thông tin liên hệ</label><br><br>
						<span>Tên người đăng: {{Auth::user()->name}}</span><br><br>
						<span>Email: {{Auth::user()->email}}</span><br><br>
						<span>Số điện thoại: {{Auth::user()->phone}}</span><br><br>
						<div class="form-group" id="delImg">
							<a style="position: absolute;" class="btn btn-danger btn-sm" id="btnDelImg"><i style="color: white;" class="fa fa-times" aria-hidden="true"></i></a>
							<img class="" src="{{ '../../../fitImgNews/'. $news->image.'/145/195' }}" alt="{{ $news->image }}" idImg="{{ $news->id }}">
							
							
						</div>

						<div class="form-group" id="insertChooseImage"></div>
					</div>

					{{ csrf_field() }}
					<div class="col-md-offset-1 col-md-5">

						<div class="form-group" >
							<label>Tiêu đề sản phẩm:</label>
							@if(old('title') != null)
							<input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Nhập tiêu đề  ">
							@else 
							<input type="text" class="form-control" name="title" value="{{ $news->title }}" placeholder="Nhập tiêu đề  ">
							@endif
						</div>
						
						<div class="form-group" >
							<label>Giá trị quy đổi (VND):</label>
							@if(old('price') != null)
							<input type="text" id="price" class="form-control" name="price" placeholder="Nhập giá tiền (đơn vị VND) " value="{{ old('price')}}">
							@else 
							<input type="text" id="price" class="form-control" name="price" placeholder="Nhập giá tiền (đơn vị VND) " value="{{ $news->price }}">
							@endif
						</div>
						<div class="form-group">
							<label for="sltMajors">Chuyên Ngành:</label>
							<select class="form-control" name="sltMajors">
								<option value="">Chọn chuyên ngành</option>
								@foreach($listMajors as $major)
								@if(old('sltMajors') != null)
								<option value="{{ $major->id }}" {{ (old('sltMajors') == $major->id) ? "selected" : ""}}> {{ $major->name }}</option>
								@else 
								<option value="{{ $major->id }}" {{ ($news->major_id == $major->id) ? "selected" : ""}}> {{ $major->name }}</option>
								@endif
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="sltSubjects">Môn học</label>
							<select class="form-control" name="sltSubjects">
								<option value="">Chọn chuyên ngành</option>
								@foreach($listSubjects as $subject)
								@if(old('sltSubjects') != null)
								<option value="{{ $subject->id }}" {{ (old('sltSubjects') == $subject->id) ? "selected" : ""}}> {{ $subject->name }}</option>
								@else 
								<option value="{{ $subject->id }}" {{ ($news->subject_id == $subject->id) ? "selected" : ""}}> {{ $subject->name }}</option>
								@endif
								@endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label >Description</label>
							@if(old('desc') != null)
							<textarea class="form-control" name="desc" cols="10" rows="5">{{ old('desc') }}</textarea>
							@else 
							<textarea class="form-control" name="desc" cols="10" rows="5">{{ $news->desc }}</textarea>
							@endif
							{{-- <script type="text/javascript">ckfinder("desc"); </script> --}}
						</div>

						<div class=" form-group" >
							<input type="hidden"  idNews="{{$news->id}}">
							<input id="btnEdit" class="btn btn-info" type="submit" value="Sửa Tin">
							<a href="{{ url('home/?option=personal')}}" class="btn btn-default col-md-offset-1">Hủy</a>
						</div>
					</div>

				</form>
			</div>
		</div>

	</div>
	@stop
