@extends('layouts.app')

@section('content')
<div class="container" style="min-height: 100vh;"> <!-- Мінімальна висота для сторінки -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1>Запис Клієнтів</h1>
                </div>
                <div class="card-body">
                    <!-- Кнопки для дій -->
                    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Запис клієнта</a>
                    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Назад на головну</a>

                    <!-- Таблиця -->
                    <table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Клієнт</th>
            <th>Послуга</th>
            <th>Дата</th>
            <th>Час</th>
            <th>Дії</th>
        </tr>
    </thead>
    <tbody>
        @foreach($appointments as $appointment)
            @if(!$appointment->status)
                <tr>
                    <td>{{ $appointment->client->first_name }} {{ $appointment->client->last_name }}</td>
                    <td>{{ $appointment->service->name }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>
                        <form action="{{ route('appointments.confirm', $appointment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Підтвердити</button>
                        </form>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
