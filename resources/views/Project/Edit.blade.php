<!-- resources/views/projects/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
    <link href="{{ asset('css/project.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Project</div>
                    <div class="card-body">
                        <form action="{{ route('projects.update',$project->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" name="code" id="code" value ='{{$project->code}}'class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value='{{$project->name}}' class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" value='{{$project->description}}' class="form-control" ></textarea>
                            </div>
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                <select name="company_id" id="company_id" class="form-control">
                                    <option value="{{$project->company->id}}">{{$project->company->name}}</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <label for="people">People in project</label>
                            <td>Name:</td>
                            @foreach ($people as $person)
                            <tr>
                                <p>  </p>
                                <td>{{ $person->full_name }}</td>
                                
                            </tr>
                      @endforeach
                      </div>
                            <div class="form-group">
                                <label for="people">People</label>
                                <select name="people[]" id="people" class="form-control" multiple>
                                   @foreach($people as $person)
                                   <option value="{{ $person->id }}">{{ $person->name }}</option>
                                   @endforeach

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/project.js') }}"></script>
</html>

