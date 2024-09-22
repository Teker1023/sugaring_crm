@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Списання: {{ $material->name }}</h1>
    <p>Наявна кількість: <strong>{{ $material->quantity }}</strong></p> <!-- Відображаємо наявну кількість -->
    <form action="{{ route('materials.decrease', $material->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="quantity">Кількість для списання</label>
            <input type="number" name="quantity" class="form-control" min="1" max="{{ $material->quantity }}" required> <!-- Додаємо обмеження по кількості -->
        </div>
        <button type="submit" class="btn btn-danger mt-3">Списати кількість</button>
    </form>
</div>
@endsection
