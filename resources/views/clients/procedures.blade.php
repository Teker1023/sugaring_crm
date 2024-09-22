@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1>Процедури для {{ $client->first_name }} {{ $client->last_name }}</h1>
                    <a href="{{ url('/clients') }}" class="btn btn-secondary">Назад до клієнтів</a>
                </div>
                <div class="card-body">
                    @if($appointments->count() > 0)
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Назва процедури</th>
                                <th>Дата</th>
                                <th>Час</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->service->name }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->time }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Цей клієнт ще не має процедур.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
