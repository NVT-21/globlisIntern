<!-- resources/views/people/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>People List</h1>
        <a href="{{ route('people.create') }}" class="btn btn-primary">People Company</a>

        <!-- Add table to display list of people -->
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($people as $person)
                    <tr>
                        <td>{{ $person->full_name }}</td>
                        <td>{{ $person->gender }}</td>
                        <td>{{ $person->birthdate }}</td>
                        <td>{{ $person->phone_number }}</td>
                        <td>{{ $person->address }}</td>
                        <td>
                            <a href="{{ route('people.edit', $person->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('people.destroy', $person->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this person?')">Delete</button>
                        </form>
                        
                       
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    {{ $people->links() }}
    @endsection