@extends('layouts.fo_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add Task</h1>

        <fieldset class="border p-4">
            <legend class="w-auto">Task Information</legend>
            <form method="POST" action="{{ route('tasks.create') }}">
                @csrf

                <div class="mb-3">
                    <label for="taskName" class="form-label">Task Name</label>
                    <input type="text" name="name" class="form-control" id="taskName" required>
                </div>

                <div class="mb-3">
                    <label for="taskDescription" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="taskDescription" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="responsavelSelect" class="form-label">User</label>
                    <select class="form-select" id="responsavelSelect" name="user_id" required>
                        <option value="">Assign User</option>
                        @foreach ($userIds as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="check" value="1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
            </form>
        </fieldset>
    </div>
@endsection
