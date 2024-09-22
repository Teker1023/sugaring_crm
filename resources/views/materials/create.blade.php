@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Додати новий матеріал</h1>
    <form action="{{ route('materials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Назва матеріалу</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Ціна</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit">Одиниці виміру</label>
            <select name="unit" id="unit" class="form-control">
                <option value="g">Грами</option>
                <option value="pcs">Штуки</option>
                <option value="m">Метри</option>
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Кількість</label>
            <input type="number" step="0.01" name="quantity" id="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Фото матеріалу (опціонально)</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-success">Зберегти</button>
    </form>
</div>
@endsection
