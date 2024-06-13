@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Edit Person</h1>

        <form action="{{ route('people.update', $person->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" class="form-control" value="{{ $person->full_name }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" class="form-control" required>
                    <option value="male" {{ $person->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $person->gender === 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $person->gender === 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ $person->birthdate }}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ $person->phone_number }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ $person->address }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    @endsection