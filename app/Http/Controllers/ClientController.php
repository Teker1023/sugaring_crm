<?php
namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Метод для відображення списку клієнтів
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // Метод для відображення форми створення клієнта
    public function create()
    {
        return view('clients.create');
    }

    // Метод для збереження нового клієнта
    public function store(Request $request)
{
    // Валідація вхідних даних
    $request->validate([
        'first_name' => 'required|string|max:255',  // Ім'я обов'язкове
        'last_name' => 'nullable|string|max:255',   // Прізвище не обов'язкове
        'phone' => 'nullable|string|max:15',        // Номер телефону не обов'язковий
    ]);

    // Створення нового клієнта
    Client::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,  // Може бути null
        'phone' => $request->phone,          // Може бути null
    ]);

    return redirect()->route('clients.index')->with('success', 'Клієнт успішно доданий!');
}

 public function destroy($id)
{
    // Знаходимо клієнта за ID і видаляємо його
    $client = Client::findOrFail($id);
    $client->delete();

    // Перенаправляємо користувача зі списком клієнтів та повідомленням
    return redirect()->route('clients.index')->with('success', 'Клієнта успішно видалено.');
}
public function edit($id)
{
    // Шукаємо клієнта по ID
    $client = Client::findOrFail($id);

    // Повертаємо форму редагування клієнта
    return view('clients.edit', compact('client'));
}
public function update(Request $request, $id)
{
    // Валідація даних
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
    ]);

    // Оновлення клієнта
    $client = Client::findOrFail($id);
    $client->first_name = $request->input('first_name');
    $client->last_name = $request->input('last_name');
    $client->phone = $request->input('phone');
    $client->save();

    // Перенаправлення після успішного оновлення
    return redirect()->route('clients.index')->with('success', 'Клієнт успішно оновлений');
}
//  Метод для виведення процедур клієнта
public function showProcedures(Client $client)
{
    // Отримуємо всі процедури для конкретного клієнта
    $appointments = $client->appointments;

    return view('clients.procedures', compact('client', 'appointments'));
}

}
