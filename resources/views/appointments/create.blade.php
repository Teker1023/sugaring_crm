@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Додати новий запис</h1>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary mb-3">Назад</a>

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="client_id" class="form-label">Клієнт</label>
            <select name="client_id" class="form-control" required>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="service_id" class="form-label">Послуга</label>
            <select name="service_id" class="form-control" required>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Дата</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Час</label>
            <input type="time" name="time" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Зберегти</button>
    </form>
</div>
@endsection
