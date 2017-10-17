
@if(isset($listNewsOption) && count($listNewsOption) > 0)


@if(!isset($checkNewsDetail))


<div id="grid-container" class="cbp-l-grid-projects  cbp-chrome cbp-caption-overlayBottomReveal cbp-animation-flipOutDelay cbp-ready cbp">
	<ul >
		@foreach($listNewsOption as $news)
		{{-- show news voi status == 1 or news cua tg user dang login --}}
		@if( ($news->status == 1 && $news->user_lock == 0 )|| (Auth::check() &&  $news->user_id == Auth::user()->id && $news->user_lock == 0))
		<li class="cbp-item randomNews" style="width: 160px; height: 350px;" >
			<div class="cbp-caption">
				<div class="cbp-caption-defaultWrap">
					<img src="{{ '/fitImgNews/'. $news->image.'/145/195' }}" alt="{{ $news->image }}" id="mainNews" />
				</div>
				<div class="cbp-caption-activeWrap">
					<div class="cbp-l-caption-alignCenter">
						<div class="cbp-l-caption-body">
							
							{{-- show edit news with personal news --}}
							@if(request()->option ==='personal')
							<a href="{{ url('home/editNews/' . $news->id) }}" class=" cbp-l-caption-buttonRight">Sửa bài</a>
							@else 
							<a href="{{ url('home/newsDetail/' . $news->id) }}" class=" cbp-l-caption-buttonRight">xem thêm</a>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="cbp-l-grid-projects-title" > {{ $news->title }}
			</div>
			{{-- Auth::check() && $news->user_id == Auth::user()->id --}}
			{{-- kiem tra co phai o tab personsal ko  --}}
			@if( request()->option ==='personal')
			<div class="cbp-l-grid-projects-desc"><i class="fa fa-telegram" aria-hidden="true"></i> {{ ($news->status==1) ? " Đã được duyệt" : " Đang chờ duyệt" }}
			</div>
			@else 
			<div class="cbp-l-grid-projects-desc"><i class="fa fa-user" aria-hidden="true"></i> {{ App\User::find($news->user_id)->name }}
			</div>
			@endif

			<div class="cbp-l-grid-projects-desc"><i class="fa fa-tags" aria-hidden="true"></i> {{ $news->price }} VNĐ <br/>
				<i class="fa fa-clock-o" aria-hidden="true"></i> {{ Carbon\Carbon::createFromTimeStamp(strtotime( $news->created_at ))->diffForHumans() }} 
			</div>
			@if(request()->option ==='personal')
			<div class="form-group">
				<a href="{{ url('home/lockMyNews/'. $news->id) }}" onclick="return confirmMsg('Bạn có muốn khóa bài đăng này không ?')" class="btn btn-danger btn-sm" id="btnDelNews"><i style="color: white;" class="fa fa-times" aria-hidden="true"></i></a>
				
			</div>
			@endif
		</li>
		@endif
		@endforeach
		{{-- end random news --}}
		{{-- </ul> --}}
	</ul>
</div>



<br/>
<div class="col-md-12">
	{{ $listNewsOption->links() }}
</div>

@endif
@else 
<div class="alert alert-success">
	<strong>Không có bài đăng !</strong> 
</div>
@endif


