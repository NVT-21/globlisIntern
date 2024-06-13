<!-- resources/views/tasks/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
@php
    $priorityNames = [
        1 => 'High',
        2 => 'Medium',
        3 => 'Low'
    ];
    $statusNames=[
        1 => 'New',
        2 =>'In Progress',
        3 =>'Completed',
        4 =>'On Hold',
        ]
@endphp

<body>
    <h1>Task List</h1>

    <form action="{{ route('tasks.filter') }}" method="GET" >
       
        <div>
        <label for="person">Projects:</label>
        <select name="project_id" id="project_id" class="form-control">
                    <option></option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
       </select>
        </div>
        <div>
            <label for="person">Person:</label>
            
               <select name="person_id" id="person_id" class="form-control" >
               <option value=""></option>        
                </select>
           
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                  <option value=""></option>
                <option value="1">New</option>
                    <option value="2">In Progress</option>
                    <option value="3">Completed</option>
                    <option value="4">On Hold</option>
            </select>
        </div>
        <div>
            <label for="priority">Priority:</label>
            <select name="priority" id="priority">
                <option value=""></option>
                 <option value="1">High</option>
                    <option value="2">Medium</option>
                    <option value="3">Low</option>
            </select>
        </div>
        <div>
        <label for="name">Task Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter task name">
    </div>
        <button type="submit">Search</button>
    </form>


   
    
    <table>
        <!-- Header table -->
        <thead>
            <tr>
                <th>Project ID</th>
                <th>Person ID</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Priority</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data rows -->
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->person->full_name }}</td>
                    <td>{{ $task->start_time }}</td>
                    <td>{{ $task->end_time }}</td>
                    <td>{{ $priorityNames[$task->priority] ?? 'Unknown' }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $statusNames[$task->status] ?? 'UnKnown' }}</td>
                    <td>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Delete</button>
                     </form>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $tasks->links() }}
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/task.js') }}"></script>
</html>