<!-- resources/views/people/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>People List</h1>

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
                           
                        <form action="{{ route('companies.add_people', ['idCompany' => request()->route('idCompany'),'personId' => $person->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger" >AddToCompany</button>
                        </form>
                       
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection