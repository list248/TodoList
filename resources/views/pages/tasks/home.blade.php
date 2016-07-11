@extends('layouts.app')

@section('content')

<div class="container">
    <button class="btn btn-primary pull-right" name="refresh"><span class="glyphicon glyphicon-refresh" ></span> Refresh page</button>
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Task


            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->


            <!-- New Task Form -->
                <form action="{{ url('task')}}" method="POST"  data-toggle="validator" role="form" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Task Name -->

                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}" placeholder="Task name" required><br>
                        </div>
                            <label for="task-name" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-8">
                            <textarea name="area2" id="task-description" class="form-control" placeholder="Task description"></textarea><br>
                            </div>
                    <!-- Add Task Button -->
                    <div class="form-group">

                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Task
                            </button>
                        </div>
                    </div>
                        </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Status</th>
                        <th>Task</th>
                        <th>Action</th>
                        </thead>
                        <tbody>

                        @foreach ($tasks as $task)
                            <tr>
                                <td>

                                    {{Form::open()}}
                                    <input type = "checkbox" name="my-checkbox" class="checkbox-status" value="{{ $task->status }}" data-taskstatus="{{ $task->status }}" data-taskid="{{ $task->id }}" {{ $task->status ? 'checked' : '' }}/>
                                    {{Form::close()}}
                                </td>
                                <td class="table-text" ><div><a href="#" class="edit" data-taskid="{{ $task->id }}" data-taskdesc="{{ $task->description }}" data-taskstatus="{{ $task->status }}">{{ $task->name }} </a></div></td>

                                <!-- Task Delete Button -->
                                <td class="table-btn">

                                    <button type="submit" class="btn btn-danger" data-taskid="{{ $task->id }}" data-toggle="confirmation-popout" data-placement="right" >
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>


                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <script>
                    var token = '{{ Session::token() }}';
                    var urlEdit = '{{ route('edit') }}';
                    var urlDelete = '{{ route('delete') }}';
                    var urlStatus = '{{ route('status') }}';
                </script>
            </div>
        @endif
        @include('pages.tasks.modals.edit.task_edit')
        @include('pages.tasks.modals.delete.delete_confirm')

        </div>
</div>

@endsection
