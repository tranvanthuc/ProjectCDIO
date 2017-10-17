@section('button')
<ul class="nav navbar-nav navbar-right">
 <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Thông báo</a></li>
 <li class="dropdown">
  <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">
    @if(Auth::user()->image == 'default.jpg')
    <img src="{{ asset('uploads/avatars/default.jpg') }}" alt="default.jpg" style=" border-radius: 50%;width:32px; height:32px;"/>
    @elseif(App\SocialProvider::where('user_id',Auth::user()->id)->get()->count() > 0) 
    <img src="{{ Auth::user()->image}}" alt="" style="border-radius: 50%;width:32px; height:32px;"/>
    @else
    <img src="{{ '/fitAvatar/'. Auth::user()->image.'/32/32' }}" alt="{{ Auth::user()->image }}" style="border-radius: 50%;width:32px; height:32px;" />
    @endif
    &nbsp; {{ Auth::user()->name }}</a>
    <ul class="dropdown-menu">
      <li><a href="{{ url('home/editInfo/'. Auth::user()->id) }}"><span class="glyphicon glyphicon-cog"></span> Sửa thông tin cá nhân</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-globe"></span> Tùy chọn thông báo</a></li> 
      <li><a href="#"><span class="glyphicon glyphicon-briefcase"></span> Hỗ trợ</a></li>
      <li><a href="{{ route('getLogout') }}"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>

    </ul>
  </li>    
</ul>
@stop