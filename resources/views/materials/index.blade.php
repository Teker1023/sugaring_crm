@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Склад матеріалів</h1>
                </div>

                <div class="card-body">
                    <!-- Кнопка для додавання нового матеріалу тепер під заголовком -->
                    <a href="{{ route('materials.create') }}" class="btn btn-primary mb-3">Додати новий матеріал</a>
                    


                <div class="card-body">
                    <!-- Кнопка для повернення на головну сторінку -->
                    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Назад на головну</a>

                    <!-- Таблиця з матеріалами -->
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Назва</th>
                                <th>Ціна</th>
                                <th>Одиниці</th>
                                <th>Кількість</th>
                                <th>Фото</th>
                                <th>Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materials as $material)
                                <tr>
                                    <td>{{ $material->name }}</td>
                                    <td>{{ $material->price }} грн</td>
                                    <td>{{ $material->unit }}</td>
                                    <td>{{ $material->quantity }}</td>
                                    <td>
                                        @if ($material->image)
                                            <img src="{{ asset('storage/' . $material->image) }}" alt="Image" width="100">
                                        @else
                                            Немає
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <!-- Кнопки для редагування та видалення -->
                                        <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-warning btn-sm me-2">Редагувати</a>
                                        <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm me-2">Видалити</button>
                                        </form>

                                        <!-- Кнопки для приходу та списання -->
                                        <a href="{{ route('materials.showIncrease', $material->id) }}" class="btn btn-success btn-sm me-2">Прихід</a>
                                        <a href="{{ route('materials.showDecrease', $material->id) }}" class="btn btn-secondary btn-sm">Списання</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
