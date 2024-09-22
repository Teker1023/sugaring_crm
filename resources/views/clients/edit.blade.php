@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати клієнта</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="first_name" class="form-label">Ім'я</label>
            <input type="text" name="first_name" class="form-control" value="{{ $client->first_name }}" required>
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Прізвище</label>
            <input type="text" name="last_name" class="form-control" value="{{ $client->last_name }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Номер телефону</label>
            <input type="text" name="phone" class="form-control" value="{{ $client->phone }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Зберегти зміни</button>
    </form>
</div>
@endsection
