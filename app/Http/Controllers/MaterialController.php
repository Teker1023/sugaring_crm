<?php

namespace App\Http\Controllers;

use App\Models\Material; // Імпорт моделі Material, це виправить помилку Class not found
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Метод index() для відображення всіх матеріалів
     */
    public function index()
    {
        // Отримуємо всі матеріали з бази даних
        $materials = Material::all();
        
        // Відображаємо список матеріалів на сторінці 'materials.index'
        return view('materials.index', compact('materials'));
    }

    /**
     * Метод create() для відображення форми створення нового матеріалу
     */
    public function create()
    {
        // Повертаємо вид для створення нового матеріалу
        return view('materials.create');
    }

    /**
     * Метод store() для збереження нового матеріалу
     */
    public function store(Request $request)
    {
        // Валідатор для перевірки вхідних даних
        $request->validate([
            'name' => 'required',              // Назва матеріалу є обов'язковою
            'price' => 'required|numeric',     // Ціна має бути обов'язковою та числовою
            'unit' => 'required',              // Одиниці виміру є обов'язковими
            'quantity' => 'required|numeric',  // Кількість має бути обов'язковою та числовою
            'image' => 'nullable|image',       // Зображення є опціональним і повинно бути формату image
        ]);

        // Збереження зображення, якщо завантажено
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('materials_images', 'public'); // Зберігаємо фото в папку 'public/materials_images'
        }

        // Створюємо новий матеріал і зберігаємо в базі даних
        Material::create([
            'name' => $request->name,
            'price' => $request->price,
            'unit' => $request->unit,
            'quantity' => $request->quantity,
            'image' => $imagePath, // Якщо зображення є, воно буде збережено
        ]);

        // Перенаправляємо користувача на список матеріалів зі сповіщенням про успішне створення
        return redirect()->route('materials.index')->with('success', 'Матеріал успішно створений.');
    }

    /**
     * Метод edit() для відображення форми редагування матеріалу
     */
    public function edit($id)
    {
        // Шукаємо матеріал по ID, якщо матеріал не знайдено, виводимо 404 помилку
        $material = Material::findOrFail($id);

        // Повертаємо вид для редагування матеріалу з даними матеріалу
        return view('materials.edit', compact('material'));
    }

    /**
     * Метод update() для оновлення матеріалу
     */
    public function update(Request $request, $id)
    {
        // Валідатор для перевірки вхідних даних
        $request->validate([
            'name' => 'required',               // Назва є обов'язковою
            'price' => 'required|numeric',      // Ціна має бути числовою і обов'язковою
            'unit' => 'required',               // Одиниці виміру є обов'язковими
            'quantity' => 'required|numeric',   // Кількість є обов'язковою і має бути числовою
            'image' => 'nullable|image',        // Фото опціональне, але має бути у форматі зображення (jpg, png, тощо)
        ]);

        // Знаходимо матеріал по ID, якщо не знайдено - буде 404 помилка
        $material = Material::findOrFail($id);

        // Якщо нове зображення завантажено, зберігаємо його на сервері
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('materials_images', 'public'); // Зберігаємо фото в папку public/materials_images
            $material->image = $imagePath; // Оновлюємо поле image у базі даних
        }

        // Оновлюємо інші поля матеріалу
        $material->name = $request->input('name');       // Оновлюємо назву матеріалу
        $material->price = $request->input('price');     // Оновлюємо ціну
        $material->unit = $request->input('unit');       // Оновлюємо одиниці виміру (грами, штуки, метри)
        $material->quantity = $request->input('quantity'); // Оновлюємо кількість

        // Зберігаємо зміни в базі даних
        $material->save();

        // Перенаправляємо користувача назад на сторінку зі списком матеріалів з повідомленням про успішне оновлення
        return redirect()->route('materials.index')->with('success', 'Матеріал успішно оновлено.');
    }

    /**
     * Метод destroy() для видалення матеріалу
     */
    public function destroy($id)
    {
        // Шукаємо матеріал по ID і видаляємо його
        $material = Material::findOrFail($id);
        $material->delete();

        // Перенаправляємо користувача зі списком матеріалів і повідомленням про успішне видалення
        return redirect()->route('materials.index')->with('success', 'Матеріал успішно видалено.');
    }

    public function increase(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $quantity = $request->input('quantity', 1); // Кількість за замовчуванням 1
    
        // Збільшуємо кількість
        $material->quantity += $quantity;
        $material->save();
    
        return redirect()->route('materials.index')->with('success', 'Кількість збільшена на ' . $quantity);
    }
    
    public function decrease(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $quantity = $request->input('quantity', 1); // Кількість за замовчуванням 1
    
        // Перевіряємо, щоб кількість для списання не перевищувала наявну кількість
        if ($material->quantity >= $quantity) {
            $material->quantity -= $quantity;
            $material->save();
            return redirect()->route('materials.index')->with('success', 'Кількість зменшена на ' . $quantity);
        } else {
            return redirect()->route('materials.index')->with('error', 'Недостатньо товару для списання. Наявна кількість: ' . $material->quantity);
        }
    }
    
public function showIncrease($id)
{
    $material = Material::findOrFail($id);
    return view('materials.increase', compact('material'));
}

public function showDecrease($id)
{
    $material = Material::findOrFail($id);
    return view('materials.decrease', compact('material'));
}


}
