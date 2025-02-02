@extends('layouts.fo_layout')

@section('content')
    <div class="container my-4">
        <h2 class="text-center mb-4">User Tasks</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th colspan="2" class="text-center">Task Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-end">Username:</th>
                        <td>{{ $task->user_name }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-end">Task name:</th>
                        <td>{{ $task->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-end">Description:</th>
                        <td>{{ $task->description }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
