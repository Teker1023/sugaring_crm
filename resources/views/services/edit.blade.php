@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Редагувати послугу</div>

                <div class="card-body">
                    <form action="{{ route('services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Назва Послуги</label>
                            <input type="text" name="name" value="{{ $service->name }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Ціна</label>
                            <input type="number" step="0.01" name="price" value="{{ $service->price }}" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Оновити послугу</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
