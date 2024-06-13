@extends('layouts.app')


@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{{ old('password', $user->password) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="is_active">Active</label>
            <select id="is_active" name="is_active" class="form-control">
                <option value="1" {{ $user->is_active ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$user->is_active ? 'selected' : '' }}>No</option>
            </select>
        </div>
        
        <!-- Thêm nút button để cập nhật thông tin người dùng -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
