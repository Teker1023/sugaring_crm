<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::all(); // Отримуємо всі записи з БД
        return view('appointments.index', compact('appointments')); // Відправляємо дані до виду

            // Отримуємо тільки непідтверджені записи
    $appointments = Appointment::where('status', false)->get();

    return view('appointments.index', compact('appointments'));

    }
    


    public function create()
    {
        // Витягаємо всіх клієнтів і послуги для форми
        $clients = Client::all();
        $services = Service::all();
        return view('appointments.create', compact('clients', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'service_id' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Зберігаємо новий запис у базі даних
        Appointment::create($request->all());

        return redirect()->route('appointments.index')
                         ->with('success', 'Клієнт успішно записаний!');
    }

    public function edit(Appointment $appointment)
    {
        $clients = Client::all();
        $services = Service::all();
        return view('appointments.edit', compact('appointment', 'clients', 'services'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'client_id' => 'required',
            'service_id' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Оновлюємо дані про запис
        $appointment->update($request->all());

        return redirect()->route('appointments.index')
                         ->with('success', 'Запис успішно оновлено!');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')
                         ->with('success', 'Запис видалено!');
    }
    public function confirm(Appointment $appointment)
{
    // Оновлюємо статус запису на підтверджений
    $appointment->status = true;
    $appointment->save();

    // Збільшуємо кількість процедур для клієнта
    $client = $appointment->client;
    $client->appointments_count += 1;
    $client->save();

    return redirect()->route('appointments.index')->with('success', 'Процедура підтверджена.');
}

}
