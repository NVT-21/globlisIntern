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
                            <x-molecules.text-input-field id="code" name="code" label="code" value="{{ $project->code }}" />
                            <x-molecules.text-input-field id="name" name="name" label=" Name" value="{{ $project->name }}" />
                            <x-molecules.text-input-field id="description" name="description" label="description" value="{{$project->description }}" />
                            <x-molecules.select-field id="company_id" name="company_id" label="Company">
                            <option value="{{ $project->company->id }}">{{ $project->company->name }}</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                           </x-molecules.select-field>
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

