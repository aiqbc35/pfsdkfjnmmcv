@extends('Admin.layout')
@section('title')
    {{$name}}
@stop
@section('content')

    <div class="col-md-12">
        @if (Session::has('success'))
            <div class="callout callout-info">
                <h4>提交成功</h4>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="callout callout-danger">
                <h4>提交失败</h4>
            </div>
    @endif
    <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="/admin/link/addHalt" >
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">title</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="inputEmail3" value="{{isset($info->title) ? $info->title : ''}}" placeholder="title">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Link</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{isset($info->link) ? $info->link : ''}}" name="link" placeholder="link">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{ csrf_field() }}
                    <button type="Reset" class="btn btn-default">Reset</button>
                    @if (isset($info->id))
                        <input type="hidden" name="id" value="{{$info->id}}">
                    @endif
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
                <!-- /.box-footer -->
            </form>
        </div>
        <!-- /.box -->

    </div>
@stop