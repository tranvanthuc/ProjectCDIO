@extends('sb-admin.layout')

@section('title','List Logs')

@section('header','List Logs')

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

            @if($list->count() > 0 )
            <?php $stt = 0 ?>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Content</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($list as $report)
                        <tr style="cursor: pointer;">
                            <td>{{$report->id}}</td>
                            <td>{{ App\User::find($report->user_id)->username }}</td>
                            <td>{{ $report->content }}</td>
                            <td>{{ Carbon\Carbon::createFromTimeStamp(strtotime($report->created_at))->diffForHumans() }}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <!-- /.table-responsive -->
                <div>
                    <a onclick="return confirmMsg('Do you want to delete all log ?')" href="{{ route('getDelReport') }}" class="btn btn-info">Delete all log</a>
                </div>
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


@stop