@extends('layouts.fo_layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Gifts List</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Person's Name</th>
                        <th scope="col">Gift Name</th>
                        <th scope="col">Predicted Value</th>
                        <th scope="col">Money Spent</th>
                        <th scope="col">Value Difference</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allGifts as $gift)
                        <tr>
                            <td>{{ $gift->user_name }}</td>
                            <td>{{ $gift->gift_name }}</td>
                            <td>{{ $gift->predicted_value }}</td>
                            <td>{{ $gift->money_spent }}</td>
                            <td>{{ $gift->money_spent - $gift->predicted_value }}</td>
                            <td>
                                <a href="{{ route('gifts.view', $gift->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-eye"></i> View
                                </a>
                                <a href="{{ route('gifts.edit', $gift->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="{{ route('gifts.delete', $gift->id) }}" class="btn btn-danger btn-sm">
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
