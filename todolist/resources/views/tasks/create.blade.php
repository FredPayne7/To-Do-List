@extends('master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <br />
        <h3 align="center">Add a Task</h3>
        <br />
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        
        @endif
        @if(\Session::has('success'))
        <div class="alert alert-success">
            <p style="margin-block-end: 0px;">{{\Session::get('success')}}</p>
        </div>
        @endif
        <form method="post" action="{{url('tasks')}}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="task_name" class="form-control" placeholder="Enter Task" />
            </div>
            <div class="form-group">
                <input type="text" name="due_date" class="form-control" placeholder="Enter Due Date" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" />
            </div>
        </form>
        </div>
    </div>
</div>
@endsection