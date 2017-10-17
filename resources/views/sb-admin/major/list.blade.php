@extends('sb-admin.layout')

@section('title','List Majors')
@section('header','List Majors')

<!-- in thong bao  -->

@section('content')


@if(isset($listMajors))

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
                @foreach($listMajors as $major)
                <tr>
                    <td style="line-height: 200%" class="col-md-1">{{ $major->id }}</td>
                    <td style="line-height: 200%" class="col-md-9">{{ $major->name }}</td>
                    <td class="col-md-2" align="center">
                    <a class="btn btn-primary btn-sm" href="{{ url('admin/major/edit/'. $major->id)}}"><i class="fa fa-pencil fa-sm" aria-hidden="true"></i></a> 
                    &nbsp;&nbsp;
                    <a class="btn btn-success btn-sm " onclick="return confirmMsg('Do you want to delete {{ $major->name }}')" href="{{ url('admin/major/delete/'. $major->id)}}"><i class="fa fa-trash fa-sm" aria-hidden="true"></i></a>
                        

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <label for="">
                    Showing {{$listMajors->firstItem()}} to {{ $listMajors->lastItem()}} of {{ $listMajors->total()}} entries
                </label>
            </div>

            <div class="col-md-6" >
                <div style="float: right;">
                    {{ $listMajors->links() }}
                </div>
                
            </div>
        </div>
        <!-- /.panel -->
    </div>
    
    

    
    <!-- /.col-lg-12 -->
</div>
@endif
@endsection