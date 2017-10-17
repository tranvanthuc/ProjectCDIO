@extends('sb-admin.layout')

@section('title','List Subjects')
@section('header','List Subjects')

<!-- in thong bao  -->

@section('content')


@if(isset($listSubjects))

<div class="row " >
    <div class="col-md-4 col-md-offset-8 col-sm-4  form-group">
        <div>
            <label for="Filter">Filter : </label>
            <a class="btn btn-primary" href="{{url()->current()}}/?filter=asc">A-Z</a>
            <a class="btn btn-info" href="{{url()->current()}}/?filter=desc">Z-A</a>
        </div>
    </div>
</div>
<br>
<div class="row">

    <div class="col-lg-10 col-md-10 col-md-offset-1">

        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listSubjects as $Subject)
                <tr>
                    <td style="line-height: 200%" class="col-md-1">{{ $Subject->id }}</td>
                    <td style="line-height: 200%" class="col-md-9">{{ $Subject->name }}</td>
                    <td class="col-md-2" align="center">
                        
                        <a class="btn btn-primary btn-sm"  href="{{ url('admin/subject/edit/'. $Subject->id)}}"><i class="fa fa-pencil fa-sm" aria-hidden="true"></i></a> 
                        &nbsp;&nbsp;
                        <a class="btn btn-success btn-sm "onclick="return confirmMsg('Do you want to delete {{ $Subject->name }}')" href="{{ url('admin/subject/delete/'. $Subject->id)}}"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <label for="">
                    Showing {{$listSubjects->firstItem()}} to {{ $listSubjects->lastItem()}} of {{ $listSubjects->total()}} entries
                </label>
            </div>

            <div class="col-md-6" >
                <div style="float: right;">
                    {{ $listSubjects->links() }}
                </div>
                
            </div>
        </div>
        <!-- /.panel -->
    </div>
    
    

    
    <!-- /.col-lg-12 -->
</div>
@endif
@endsection