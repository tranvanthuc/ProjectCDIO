@if(isset($listSuggestNews))
<div class="widget">
	<h5 class="widgetheading">Bài đăng gợi ý</h5>
	<div class="recent">
		
		@foreach($listSuggestNews as $news)
		<div>

			<img src="{{ '/fitImgNews/'. $news->image.'/90/105' }}" alt="{{ $news->image }}" class="pull-left" alt="" id="latestNews" />

			<a href="{{ url('home/newsDetail/' . $news->id) }}"><strong>{{ str_limit($news->title,30) }}</strong></a>
			<p>
				<i class="fa fa-user" aria-hidden="true"></i> {{ App\User::find($news->user_id)->name }}<br/>
				<i class="fa fa-tags" aria-hidden="true"></i> {{ $news->price }} VNĐ <br/>
				<i class="fa fa-clock-o" aria-hidden="true"></i> {{ Carbon\Carbon::createFromTimeStamp(strtotime( $news->created_at ))->diffForHumans() }} 
			</p>
			
		</div><br/>
		@endforeach
		
	</div>
</div>
@endif