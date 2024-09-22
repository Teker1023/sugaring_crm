@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагувати матеріал</h1>

    <!-- Форма для редагування матеріалу -->
    <form action="{{ route('materials.update', $material->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Метод PUT для оновлення матеріалу -->

        <div class="form-group">
            <label for="name">Назва матеріалу</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $material->name }}" required>
        </div>

        <div class="form-group">
            <label for="price">Ціна</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $material->price }}" required>
        </div>

        <div class="form-group">
            <label for="unit">Одиниці виміру</label>
            <select name="unit" id="unit" class="form-control" required>
                <option value="g" {{ $material->unit == 'g' ? 'selected' : '' }}>Грами</option>
                <option value="pcs" {{ $material->unit == 'pcs' ? 'selected' : '' }}>Штуки</option>
                <option value="m" {{ $material->unit == 'm' ? 'selected' : '' }}>Метри</option>
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Кількість</label>
            <input type="number" step="0.01" name="quantity" id="quantity" class="form-control" value="{{ $material->quantity }}" required>
        </div>

        <div class="form-group">
            <label for="image">Фото матеріалу (опціонально)</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @if ($material->image)
                <img src="{{ asset('storage/' . $material->image) }}" alt="Image" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Оновити</button>
    </form>
</div>
@endsection
