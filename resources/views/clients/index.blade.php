@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- Заголовок з кнопкою для додавання нового клієнта -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1>Список клієнтів</h1>
                    <a href="{{ route('clients.create') }}" class="btn btn-primary">Додати нового клієнта</a>
                </div>

                <div class="card-body">
                    <!-- Кнопка для повернення на головну сторінку -->
                    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Назад на головну</a>

                    <!-- Таблиця зі списком клієнтів -->
                    <table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Ім'я</th>
            <th>Прізвище</th>
            <th>Номер телефону</th>
            <th>Кількість процедур</th>
            <th>Дії</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->phone }}</td>
                <td>{{ $client->appointments_count }}</td>
                <td>
                    <a href="{{ route('clients.procedures', $client->id) }}" class="btn btn-info btn-sm">Дивитись</a>
                    <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Редагувати</a>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

                    <!-- Виведення сповіщень про успішні або невдалі дії -->
                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

