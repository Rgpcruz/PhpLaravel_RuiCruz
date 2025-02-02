@extends('layouts.fo_layout')

@section('content')
    <br>
    <h2>Gifts do User</h2>
    <br>

    <table class="table">
        <<thead>
            <tr>
                <th scope="col">ID:</th>
                <th scope="col">Name: {{$gifts->user_name}}</th>
                <th scope="col">Total Predicted Value:</th>
                <th scope="col">Total Money Spent:</th>
                <th scope="col">Current Balance:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $gifts->user_id }}</td>
                <td>{{ $gifts->user_name }}</td>
                <td>{{ number_format($userGifts->total_predicted_value, 2, ',', '.') }} €</td>
                <td>{{ number_format($userGifts->total_money_spent, 2, ',', '.') }} €</td>
                <td>{{ number_format($userGifts->saldo_atual, 2, ',', '.') }} €</td>
            </tr>
        </tbody>
    </table>

    <br>
@endsection
