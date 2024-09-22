<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Відображення всіх послуг
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    // Форма створення нової послуги
    public function create()
    {
        return view('services.create');
    }

    // Збереження нової послуги
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Послуга додана.');
    }

    // Форма редагування послуги
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    // Оновлення послуги
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $service->update($validated);

        return redirect()->route('services.index')->with('success', 'Послуга оновлена.');
    }

    // Видалення послуги
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Послуга видалена.');
    }
}

