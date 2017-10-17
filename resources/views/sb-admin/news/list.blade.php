@extends('sb-admin.layout')

@section('title','List News')
@section('header','List News')


<!-- in thong bao  -->

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">

            @if($listNews->count() > 0 )
            <?php $stt = 0 ?>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Major</th>
                            <th>Price </th>
                            {{-- <th>Image</th> --}}
                            <th>Post by</th>
                            <th >Status</th>
                            <th >User lock</th>
                            @if(Auth::user()->level_id < 2)
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                      
                         @foreach($listNews as $news)
                        <tr style="cursor: pointer;">
                            <td> {{$news->id}} </td>
                            <td>{{ str_limit($news->title, 100) }}</td>
                            {{-- <td>{{ App\Major::find($news->major_id)->name }}</td> --}}
                            <td>{{ App\Major::find($news->major_id)->name }}</td>
                            <td>{{ $news->price }}</td>
                            {{-- <td>{{ str_limit($news->image, 15) }}</td> --}}
                            <td>{{ App\User::find($news->user_id)->username }}</td>
                            <td align="center">
                                @if($news->status == 1)
                                    <a href="{{ url('admin/news/lock/'. $news->id) }}"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></a>
                                @else 
                                    <a href="{{ url('admin/news/lock/'. $news->id) }}"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a>
                                @endif
                            </td>
                            <td align="center">
                                @if($news->user_lock == 0)
                                    <a href="{{ url('admin/news/userLock/'. $news->id) }}"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></a>
                                @else 
                                    <a href="{{ url('admin/news/userLock/'. $news->id) }}"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a>
                                @endif
                            </td>
                            
                            @if(Auth::user()->level_id < 2)
                            <td align="center">
                                <a href="{{ url('admin/news/edit/'. $news->id)}}"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                            </td>

                            <td align="center">
                                <a onclick="return confirmMsg('Do you want to delete {{ $news->title }}')" href="{{ url('admin/news/delete/'. $news->id)}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                       

                    </tbody>
                </table>

                @if(Auth::user()->level_id < 2)
                <div>
                    <a onclick="return confirmMsg('Do you want to delete all News ?')" href="{{ route('getDelAllNews') }}" class="btn btn-info">Delete all News</a>
                </div>
                @endif
                <!-- /.table-responsive -->
            @else
                <div class="error_msg">Không có dữ liệu </div>
            @endif    
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>


@endsection