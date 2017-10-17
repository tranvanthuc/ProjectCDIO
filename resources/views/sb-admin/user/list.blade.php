@extends('sb-admin.layout')

@section('title','List Users')
@section('header','List Users')

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

            @if($listUser->count() > 0 )
            <?php $stt = 0 ?>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th class="text-center">Block</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center" >Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    
                      
                        
                        @foreach($listUser as $user)
                        @if($user->level_id >= Auth::user()->level_id)
                            <tr >
                                <td> <?php echo ++$stt; ?> </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td  class="center">{{ App\Level::find($user->level_id)->name }}</td>
                                @if($user->id == Auth::user()->id)
                                    <td align="center">
                                        <a href="{{ url('admin/user/lock/'. $user->id) }}"
                                        style="pointer-events: none; cursor: default;">
                                        <i class="fa fa-unlock fa-lg" aria-hidden="true" style="filter: opacity(50%);"></i></a>
                                    </td>

                                    <td align="center">
                                        <a href="{{ url('admin/user/edit/'. $user->id) }}"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                                    </td>
                                    
                                    <td  class="center" align="center">
                                        <a href="{{ url('admin/user/delete/'. $user->id)}}" style="pointer-events: none; cursor: default;"><i class="fa fa-trash fa-lg" aria-hidden="true" style="filter: opacity(50%);"></i></a>
                                    </td>
                                @else
                                    <td  align="center">
                                        @if($user->lock == 0)
                                            <a href="{{ url('admin/user/lock/'. $user->id) }}"><i class="fa fa-unlock fa-lg" aria-hidden="true"></i></a>
                                        @else 
                                            <a href="{{ url('admin/user/lock/'. $user->id) }}"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></a>
                                        @endif
                                    </td>
                                    {{-- check level id de tat quyen sua thong tin ca nhan --}}
                                    @if($user->level_id > 2)
                                        <td class="center" align="center">
                                            <a href="{{ url('admin/user/edit/'. $user->id) }}" style="pointer-events: none; cursor: default;"><i class="fa fa-pencil fa-lg" aria-hidden="true" style="filter: opacity(50%);"></i></a>
                                        </td>
                                    @else 
                                        <td class="center" align="center">
                                            <a href="{{ url('admin/user/edit/'. $user->id) }}"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a>
                                        </td>
                                    @endif
                                    
                                    <td class="center" align="center">
                                        <a onclick="return confirmMsg('Do you want to delete {{ $user->username }}')" href="{{ url('admin/user/delete/'. $user->id)}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
                                    </td> 
                                @endif
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
                <div>
                    <a onclick="return confirmMsg('Do you want to delete all users ?')" href="{{ route('getDelAllUsers') }}" class="btn btn-info">Delete all Users</a>
                </div>
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