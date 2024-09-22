@extends('layouts.app')

@section('content')
<div style="background-color: #ffcccb; height: 100vh; display: flex; justify-content: center; align-items: center; text-align: center; flex-direction: column;">
    <!-- Фото -->
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 150px; height: auto; margin-bottom: 20px;">
    
    <!-- Заголовок сторінки -->
    <h1 style="font-size: 48px; font-weight: bold;">sugar for you</h1>
    <p style="font-size: 24px; margin-bottom: 40px;">Bohdana Riabets</p>

    <!-- Кнопки -->
    <div>
        <a href="{{ route('clients.index') }}" class="btn btn-outline-dark btn-lg" style="margin-right: 10px;">Клієнти</a>
        <a href="{{ route('materials.index') }}" class="btn btn-outline-dark btn-lg" style="margin-right: 10px;">Склад матеріалів</a>
        <a href="{{ route('services.index') }}" class="btn btn-outline-dark btn-lg" style="margin-right: 10px;">Послуги</a>
        <a href="{{ route('appointments.index') }}" class="btn btn-outline-dark btn-lg">Запис Клієнтів</a>
 <!-- Кнопка Вийти -->
 <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Вийти</button>
            </form>

    </div>
</div>
@endsection
