@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Edit Task</h3>
        <br />
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul style="margin-bottom=10px;">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        
        @endif
        <form method="post" action="{{action('TaskController@update', $id)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH" />
            <div class="form-group">
                <input type="text" name="task_name" class="form-control" value="{{$task->task_name}}" placeholder="Enter Task Name" />
            </div>
            <div class="form-group">
                <input type="text" name="due_date" class="form-control" value="{{$task->due_date}}" placeholder="Enter Due Date" />
            </div>
            <div class="row col-md-12" style="margin-right:0px; margin-left:0px; padding-left:0px; padding-right:0px;">
                <div class="form-group col-md-1" style="margin-bottom:0px; padding-left:0px; padding-right:0px;">
                    <button class="btn btn-primary col-md-12">Edit</button>
                    <!--<input type="submit" class="btn btn-primary col-md-12" value="Edit" />-->
                </div>
                <button type="button" class="btn btn-danger col-md-1 offset-md-10" onClick="location.href='../'">Return</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection