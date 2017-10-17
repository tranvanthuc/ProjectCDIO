	@extends('user.myhome')

	@include('user.blocks.errors')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>


	@section('content')
	<div class="body"></div>
	<div class="grad"></div>
	<div class="col-md-8 col-md-offset-2" style="margin-top: 10px;margin-bottom: 10px">
		<div style="box-shadow: 0px 0px 2px grey;background-color: rgba(255,255,255,0.2);border-radius: 5px ;" id="headDangTin" >
			<div class="panel-heading" id="postNews">
				<label><span style="color:#d9534f !important;font-size: 60px">ĐĂNG &nbsp;</span><span style="color:#d9534f !important; font-size: 60px">TIN</span></label>
			</div>		
		</div>
		<br>
		<div id="createNewGUI">
			<div class="row">
			<div class="form-group col-md-4 col-md-offset-1" style="margin-left: 10% ; margin-top: 2%">
				<div id="ttlienhe" style="margin: 0px 0px 15px 0px; " >
					<label style="margin-top:15px ;color: #5379fa !important;font-size: 20">Thông tin liên hệ</label><br>
					<div style="margin-bottom: 15px ;margin-left: 20px	 " >
						<span> {{Auth::user()->name}}</span><br><br>
						<span> {{Auth::user()->email}}</span><br><br>
						<span> {{Auth::user()->phone}}</span>
					</div>
				</div>
			</div>
				<form method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="col-md-offset-1 col-md-5" style="margin-top: 30px">
						<div class="form-group" >
							<label>Tiêu đề sản phẩm:</label>
							<input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Nhập tiêu đề  ">
						</div>
						
						<div class="form-group" >
							<label>Giá trị quy đổi (VND):</label>
							<input type="text" id="price" class="form-control" name="price" placeholder="Nhập giá tiền (đơn vị VND) " value="{{ old('price') }}">
						</div>
						<div class="form-group">
							<label for="sltMajors">Chuyên Ngành:</label>
							<select class="form-control" name="sltMajors">
								<option value="">Chọn chuyên ngành</option>
								@foreach($listMajors as $major)
								<option value="{{ $major->id }}" {{ (old('sltMajors') == $major->id) ? "selected" : ""}}> {{ $major->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
						<label for="sltSubjects">Môn học</label>
							<select class="form-control" name="sltSubjects">
								<option value="">Chọn môn học</option>
								@foreach($listSubjects as $subject)
								<option value="{{ $subject->id }}" {{ (old('sltSubjects') == $subject->id) ? "selected" : ""}}> {{ $subject->name }}</option>
								@endforeach
							</select>
						</div>
						
						<div class="form-group">
							<label >Mô tả</label>
							<textarea class="form-control" name="desc" cols="10" rows="5" placeholder="Bạn vui lòng nhập mô tả về cuốn sách ">{{ old('desc') }}</textarea>
							{{-- <script type="text/javascript">ckfinder("desc"); </script> --}}
						</div>
						<div  id="Postimage">
							<div class="image-upload form-group"  id="btChonAnh">
								<input id="fImage" name="fImage" type="file" onchange='openFile1(event)' accept="image/*" style="display: none;">
								<div id="btChooseI" class="row">
									<input type="button" id="browse1" class="btn btn-defaut col-md-offset-4 col-xs-offset-4" value="Chọn ảnh" >
								</div>
								<img  id="myImageUp" class="thumbnail"  src="{{asset('uploads/images/bg.png')}}" alt="Cinque Terre" width="100%" height= "45%" >
									{{-- <input type="button" id="browse1" class="btn btn-defaut ChooseI" value="Chọn ảnh" style="margin-left:35%"><br>
									<img  id="myImageUp" class="thumbnail" style="margin: 0 auto;"  src="{{asset('uploads/images/no_image.jpg')}}" alt="Cinque Terre" width="200px" height= "200px" > --}}
							</div>
						</div>
						<br><div class="row">
						<input class="btn btn-primary col-xs-10 col-md-10 col-xs-offset-1 form-group" type="submit" value="Đăng Tin">
					</div>
				</div>
			</form>
		</div>
	</div>

	</div>
	@stop
