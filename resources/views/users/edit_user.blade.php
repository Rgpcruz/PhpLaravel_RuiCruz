@extends('layouts.fo_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit User</h1>

        <fieldset class="border p-4">
            <legend class="w-auto">Edit User Information</legend>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter E-mail" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="text-danger mt-2">Invalid Email</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    @error('password')
                        <div class="text-danger mt-2">Invalid Password</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{ old('address', $user->address) }}">
                    @error('address')
                        <div class="text-danger mt-2">Invalid Address</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nif" class="form-label">NIF:</label>
                    <input type="text" name="nif" class="form-control" placeholder="Enter NIF" value="{{ old('nif', $user->nif) }}">
                    @error('nif')
                        <div class="text-danger mt-2">Invalid NIF</div>
                    @enderror
                </div>

                <button class="btn btn-primary btn-lg w-100" type="submit">Update</button>
            </form>
        </fieldset>
    </div>
@endsection
