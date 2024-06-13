
@extends('layouts.app')
@section('content')
<h1>All Companies</h1>
<a href="{{ route('companies.create') }}" class="btn btn-primary">Create Company</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Code</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->code }}</td>
                <td>{{ $company->address }}</td>
                <td>
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('people.info_people', $company->id) }}" class="btn btn-warning">AddPeople</a>
                    <form action="{{ route('companies.destroy',  $company->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                         <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

       
    </tbody>
</table>
{{ $companies->links() }}
@endsection