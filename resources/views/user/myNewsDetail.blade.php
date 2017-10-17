@extends("user.myHome")

@section('title', "Detail News page")


@section('content')
<section id="content">
	<div class="container">
		<div class="row">
			
			{{-- shownew leftaside --}}
			@include('user.news.showNewsLeftAside')
			<!-- end div left aside -->

			<!-- start div container_news -->
			<div class="container marginbot50">
				<div class="row" >
					<div class="col-md-9" >
						<div id="img-news" class="col-md-5 imgNewsDetail"><img src="{{ '/fitImgNews/'. $news->image.'/345/430' }}" alt="{{ $news->image }}" /></div>

						<div class="col-md-6" >
							<center><h1> {{ $news->title }}</h1></center>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th><b> Thông tin người đăng</b></th>
										<th><b> Thông tin bài đăng</b></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td> Người đăng: {{ App\User::find($news->user_id)->name }}</td>
										<td> Giá sách: {{ $news->price }} VNĐ</td>
									</tr>
									<tr>
										<td> Số điện thoại: {{ App\User::find($news->user_id)->phone }}</td>
										<td> Lượt view: {{ $news->viewed }}  </td>
									</tr>
									<tr>
										<td> Email: {{ App\User::find($news->user_id)->email }}</td>
										<td> Thời gian đăng: {{ $news->created_at }}</td>
									</tr>
								</tbody>
							</table>
							<div> <b>Mô tả: </b><br/>&nbsp;&nbsp; {{ $news->desc }} </div>
						</div>
						<div class="col-md-9" >
							{{-- <div class="fb-comments" data-href="http://booksharing.com/home/newsDetail/". {{$news->id}} data-numposts="5"></div> --}}

							<div
							class="fb-like"
							data-share="true"
							data-width="450"
							data-show-faces="true">
						</div>
						<div>
							<hr>
							<h4> Các nhóm bài đăng khác: </h4>
							<div class="footerNewsDetail">
								<a href="{{ url('/home') }}"><span class="glyphicon glyphicon-folder-open"></span>  &nbsp;Mới nhất </a>&nbsp;&nbsp;
								<a href="{{ url('home/?option=cheap')}}"><span class="glyphicon glyphicon-folder-open"></span>  &nbsp;Giá thấp nhất </a>&nbsp;&nbsp;
								<a href="{{ url('home/?option=personal')}}"><span class="glyphicon glyphicon-folder-open"></span>  &nbsp;Cá nhân </a>
							</div>
							<hr>
							<div>
								<h4>Các bài đăng cùng chuyên ngành: Công nghệ phần mềm</h4>
								<div id="grid-container" class="cbp-l-grid-projects  cbp-chrome cbp-caption-overlayBottomReveal cbp-animation-flipOutDelay cbp-ready cbp">

									<ul >
										{{-- show news same major --}}
										@if(isset($listNewsSameMajor) && count($listNewsSameMajor) > 0)

										@foreach($listNewsSameMajor as $news)

										<li class="cbp-item randomNews" style="width: 145px; height: 340px;" >
											<div class="cbp-caption">
												<div class="cbp-caption-defaultWrap">
													<img src="{{ '/fitImgNews/'. $news->image.'/152/202' }}" alt="{{ $news->image }}" id="mainNews" />
												</div>
												<div class="cbp-caption-activeWrap">
													<div class="cbp-l-caption-alignCenter">
														<div class="cbp-l-caption-body">
															<a href="{{ url('home/newsDetail/' . $news->id) }}" class=" cbp-l-caption-buttonRight">xem thêm</a>
														</div>
													</div>
												</div>
											</div>
											<div class="cbp-l-grid-projects-title"> {{ $news->title }}
											</div>
											<div class="cbp-l-grid-projects-desc"> <i class="fa fa-user" aria-hidden="true"></i> {{ App\User::find($news->user_id)->name }}
											</div>
											<div class="cbp-l-grid-projects-desc"> <i class="fa fa-tags" aria-hidden="true"></i> {{ $news->price }} VNĐ <br/>
												<i class="fa fa-clock-o" aria-hidden="true"></i> {{ Carbon\Carbon::createFromTimeStamp(strtotime( $news->created_at ))->diffForHumans() }} 
											</div> 
										</li>

										@endforeach

										@endif
									</ul>
								</div>
								<hr>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
</div>
</div>	
</section>
@stop