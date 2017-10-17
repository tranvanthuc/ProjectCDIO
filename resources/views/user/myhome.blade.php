@extends('user.mylayout')

@section('title', "Home page")

@section('button')
<ul class="nav navbar-nav navbar-right">
 {{-- <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Thông báo</a></li> --}}
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
      <!-- <li><a href="#"><span class="glyphicon glyphicon-globe"></span> Tùy chọn thông báo</a></li> 
      <li><a href="#"><span class="glyphicon glyphicon-briefcase"></span> Hỗ trợ</a></li> -->
      <li><a href="{{ route('getLogout') }}"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>

    </ul>
  </li>    
</ul>
@stop


@if(!isset($checkNewsDetail))
@section('title_container')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="nav navbar-nav navbar-left">
        <div class="active"><h3>Danh sách bài đăng</h3></div>
      </div>
      <div class="nav navbar-nav navbar-right">   
        <div class="nav navbar-nav">
          <div class="nav navbar-nav" >
           <select class="form-control"  id="sltFilterNews" >
            <option class="opt-slt" value="new" {{ (request()->option=="new") ? "selected" : ""}} >Mới nhất</option>
            <option class="opt-slt" value="old" {{ (request()->option=="old") ? "selected" : ""}}>Cũ nhất</option>
            <option class="opt-slt" value="cheap" {{ (request()->option=="cheap") ? "selected" : ""}}>Giá thấp tới cao</option> 
            <option class="opt-slt" value="expensive" {{ (request()->option=="expensive") ? "selected" : ""}}>Giá cao xuống thấp</option> 
            <option class="opt-slt" value="littleViewed" {{ (request()->option=="littleViewed") ? "selected" : ""}}>Ít lượt xem nhất</option>
            <option class="opt-slt" value="personal" {{ (request()->option=="personal") ? "selected" : ""}}>Cá nhân</option>
          </select>
        </div>   
      </div>   
    </div>     
  </div>
</div>
</nav>
<style type="text/css">
  .loading 
  {
    background: lightgoldenrodyellow url('{{asset('uploads/images/loading.gif')}}') no-repeat center 50%;
    height: 80px;
    width: 100px;
    position: fixed;
    border-radius: 5px;
    top: 45%;
    left: 54%;
    margin: 0 auto;
    z-index: 2000;
    display: none;

  }

</style>
<div class="loading"></div>



<script src="{{ asset('templates/js/jquery.min.js') }}"></script>
<script type="text/javascript">
  $('#sltFilterNews').on('change', function(){
    $('.loading').fadeIn();
    var root = location.href.substring(0,location.href.lastIndexOf('/'));
    var currentUrl = window.location.href;
    if(currentUrl == root + '/home'){
      root = currentUrl;
    }
    
    switch($('#sltFilterNews').val())
    {
      case "new": window.location.href= root + "/"; break;
      case "old": window.location.href= root+ "/?option=old"; break;
      case "cheap": window.location.href=root+ "/?option=cheap"; break;
      case "expensive": window.location.href=root+ "/?option=expensive"; break;
      case "littleViewed": window.location.href=root +"/?option=littleViewed"; break;
      case "personal": window.location.href=root +"/?option=personal"; break;
    }
  });
</script>
@stop
@endif


@section('content')

<section id="content">
  
  @include('user.myshownews')

</section>
@stop

