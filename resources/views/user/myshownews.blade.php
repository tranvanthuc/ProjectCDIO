	@if(url()->current() != "http://booksharing.com/home/addNews")
	<div class="container" >
		<div class="row">
			
			{{-- shownew leftaside --}}
			
			@include('user.news.showNewsLeftAside')

			<!-- end div left aside -->

			<!-- start div container_news -->
			<div class="container-fluid marginbot50">
				<div class="row" >
					<div class="col-md-9">
						
						@yield('title_container')
						@include('user.news.showNewsOption')
						
					</div>

					<br/>

				</div>
			</div>
		</div>
	</div>
	@endif
		<!-- end div container_news -->