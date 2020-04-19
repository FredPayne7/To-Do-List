@extends('master')

@section('content')
<!--Credit to Webslesson on YouTube (https://www.youtube.com/watch?v=Rsx1xPURdc8&list=PLxl69kCRkiI0rS3u_4hFDA1nyqol4MMZe&index=1) for a very helpful tutorial, Laravel's site for helping me get everything started (https://laravel.com/docs/5.1/quickstart), and this StackOverflow thread:(https://stackoverflow.com/questions/19927813/make-a-checkbox-look-like-a-button-css)-->
<div class="row">
    <div class="col-md-12">
        <h3 align="center" style="margin-top: 15px; margin-bottom: 15px;">To Do List</h3>
        @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p style="margin-block-end: 0px";>{{$message}}</p>
        </div>
        @endif
        <div align="right">
            <a href="{{route('tasks.create')}}" class="btn btn-primary" style="margin-bottom: 25px;">Add Task</a>
        </div>
        <div class="card"> <!--Only makes the corners rounded. Not sure why border-radius wouldn't work. -->
        <table class="table table-bordered table-striped" style="margin-bottom: 0px">
            <tr>
                <th>Task</th>
                <th>Due Date</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Completed</th>
            </tr>
            @foreach($tasks as $row)
            <tr>
                <td>{{$row['task_name']}}</td>
                <td>{{$row['due_date']}}</td>
                <td><a href="{{action('TaskController@edit', $row['id'])}}" class="btn btn-info">Edit</a></td>
                <td>
                    <form method="post" class="delete_form" action="{{action('TaskController@destroy', $row['id'])}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <input type="checkbox" class="btn btn-success complete" name="complete" /><label for="complete">Complete</label>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>            
</div>
<style> 
    input[type=checkbox] + label {
        color: #ccc;
        visibility: hidden;
    } 
    input[type=checkbox]:checked + label {
        color: green;
        font-weight: bold;
        font-size: 18px;
        padding-left: 10px;
        visibility: visible;
    }
</style>
<script>
    $(document).ready(function(){
        $('.delete_form').on('submit', function(){
            if(confirm("Are you sure you want to delete this task?"))
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    });
</script>

@endsection