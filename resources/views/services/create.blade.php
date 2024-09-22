@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Додати нову послугу</div>

                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Назва Послуги</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Ціна</label>
                            <input type="number" step="0.01" name="price" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Додати послугу</button>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
