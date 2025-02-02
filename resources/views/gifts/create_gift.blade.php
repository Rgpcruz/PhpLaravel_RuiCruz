@extends('layouts.fo_layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add Gift</h1>

        <fieldset class="border p-4">
            <legend class="w-auto">Gift Information</legend>
            <form method="POST" action="{{ route('gifts.create') }}">
                @csrf

                <div class="mb-3">
                    <label for="giftName" class="form-label">Gift Name</label>
                    <input type="text" name="gift_name" class="form-control" id="giftName" required>
                    @error('gift_name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="predictedValue" class="form-label">Predicted Value</label>
                    <input type="number" name="predicted_value" class="form-control" id="predictedValue" required>
                    @error('predicted_value')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="moneySpent" class="form-label">Money Spent</label>
                    <input type="number" name="money_spent" class="form-control" id="moneySpent" required>
                    @error('money_spent')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="responsavelSelect" class="form-label">Assigned User</label>
                    <select class="form-select" id="responsavelSelect" name="user_id" required>
                        <option value="">Select User</option>
                        @foreach ($userIds as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
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
