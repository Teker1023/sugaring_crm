@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h1>Список послуг</h1>
                    <a href="{{ route('services.create') }}" class="btn btn-primary">Додати нову послугу</a>
                </div>
                <div class="card-body">
                    <!-- Кнопка для повернення на головну сторінку -->
                    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Назад на головну</a>

                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Назва</th>
                                <th>Ціна</th>
                                <th>Дії</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->price }} грн</td>
                                    <td>
                                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Редагувати</a>
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Видалити</button>
                                        </form>
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
