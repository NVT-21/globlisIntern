@extends('layouts.app')
@section('content')

@foreach ($countries as $country)
<div>

    <p><strong>Code:</strong> {{ $country->code}}</p>
    <p><strong>Name:</strong> {{ $country->name }}</p>
    <p><strong>Description:</strong> {{ $country->description }}</p>
</div>

<!-- Nút chỉnh sửa -->

<a href="{{ route('countries.edit',$country->id) }}">Edit</a>


<!-- Form xóa -->
<form action="{{ route('countries.destroy',  $country->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@endforeach
@endsection