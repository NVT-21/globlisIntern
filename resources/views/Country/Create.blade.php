
@extends('layouts.app')

@section('title', 'Create Country')

@section('content')
    <h1>Create Country</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form  action="{{ route('countries.store')}}" method="POST">
    
    @csrf
    @method("POST")
    <div>
        <label for="code">Code:</label>
        <input type="text" id="code" name="code" value="{{ old('code') }}">
    </div>
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ old('description') }}</textarea>
    </div>
    <button type="submit">Create</button>
</form>
@endsection