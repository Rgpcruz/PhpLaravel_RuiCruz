@extends('layouts.fo_layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Task List</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allTasks as $task)
                        <tr>
                            <th scope="row">{{ $task->id }}</th>
                            <td>{{ $task->user_name }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                <a href="{{ route('tasks.view', $task->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
