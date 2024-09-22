<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Додаємо поля для масового призначення
    protected $fillable = [
        'first_name',  // Ім'я
        'last_name',   // Прізвище
        'phone',       // Номер телефону
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    

}
