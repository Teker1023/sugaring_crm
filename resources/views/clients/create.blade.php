@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Додати нового клієнта</h1>

    <!-- Форма для створення клієнта -->
    <form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="first_name">Ім'я</label>
        <input type="text" name="first_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="last_name">Прізвище</label>
        <input type="text" name="last_name" class="form-control">
    </div>

    <div class="form-group">
        <label for="phone">Номер телефону</label>
        <input type="text" name="phone" class="form-control"> <!-- Видаляємо required -->
    </div>

    <button type="submit" class="btn btn-primary">Додати клієнта</button>
</form>

</div>
@endsection
