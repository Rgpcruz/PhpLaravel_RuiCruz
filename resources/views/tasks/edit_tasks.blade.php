@extends('layouts.fo_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Task</h1>

        <fieldset class="border p-4">
            <legend class="w-auto">Task Information</legend>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Task Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Task Name" value="{{ old('name', $task->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" class="form-control" placeholder="Description" required>{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Assigned User:</label>
                    <select name="user_id" class="form-select" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $task->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary btn-lg w-100" type="submit">Update Task</button>
            </form>
        </fieldset>
    </div>
@endsection
