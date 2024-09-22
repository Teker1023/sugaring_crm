<?php

// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Конструктор для застосування middleware Auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Головна функція для повернення вигляду (view)
    public function index()
    {
        return view('home');  // Повертає вигляд "home"
    }
}
