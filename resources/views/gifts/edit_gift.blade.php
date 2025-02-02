@extends('layouts.fo_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Gift</h1>

        <fieldset class="border p-4">
            <legend class="w-auto">Gift Information</legend>
            <form action="{{ route('gifts.update', $gift->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="gift_name" class="form-label">Gift Name:</label>
                    <input type="text" name="gift_name" class="form-control" value="{{ old('gift_name', $gift->gift_name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="predicted_value" class="form-label">Predicted Value:</label>
                    <input type="number" name="predicted_value" class="form-control" value="{{ old('predicted_value', $gift->predicted_value) }}" required>
                </div>

                <div class="mb-3">
                    <label for="money_spent" class="form-label">Money Spent:</label>
                    <input type="number" name="money_spent" class="form-control" value="{{ old('money_spent', $gift->money_spent) }}" required>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Assigned User:</label>
                    <select name="user_id" class="form-select" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id', $gift->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary btn-lg w-100" type="submit">Update Gift</button>
            </form>
        </fieldset>
    </div>
@endsection
