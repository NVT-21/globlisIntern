<!-- resources/views/tasks/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control">
                    <option></option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{$project->id==$task->project_id ?'selected':''}}>{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <label for="person">Assigned Person</label>
            <input class="form-control"name="name" id="person" value="{{ $task->person ? $task->person->full_name : 'N/A' }}"  readonly >
            <input type="hidden" name="personId" value="{{ $task->person ? $task->person->id : '' }}">
            </div>
            <div class="form-group">
               <label for="people">Edit People</label>
               <select name="person_id" id="person_id" class="form-control" >
    
                </select>
            </div>

            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="date" name="start_time" id="start_time" value="{{ old('start_time', \Carbon\Carbon::parse($task->start_time)->format('Y-m-d')) }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="date" name="end_time" id="end_time" value="{{ old('end_time', \Carbon\Carbon::parse($task->end_time)->format('Y-m-d')) }}" class="form-control">
            </div>
            <div class="form-group">
    <label for="priority">Priority</label>
    <select name="priority" id="priority" class="form-control">
        <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>High</option>
        <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Medium</option>
        <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Low</option>
    </select>
</div>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Enter task name" value="{{ $task->name }}">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control" placeholder="Enter task description">{{ $task->description }}</textarea>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-control">
        <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>New</option>
        <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>In Progress</option>
        <option value="3" {{ $task->status == 3 ? 'selected' : '' }}>Completed</option>
        <option value="4" {{ $task->status == 4 ? 'selected' : '' }}>On Hold</option>
    </select>
</div>

            <button type="submit" class="btn btn-primary">Edit Task</button>
        </form>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/task.js') }}"></script>
</html>