@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Прихід: {{ $material->name }}</h1>
    <p>Наявна кількість: <strong>{{ $material->quantity }}</strong></p> <!-- Відображаємо наявну кількість -->
    <form action="{{ route('materials.increase', $material->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="quantity">Кількість для приходу</label>
            <input type="number" name="quantity" class="form-control" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Збільшити кількість</button>
    </form>
</div>
@endsection
