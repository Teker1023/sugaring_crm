<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'unit', 'quantity', 'image'];

    public function getUnitAttribute($value)
    {
        $units = [
            'm' => 'м',
            'pcs' => 'шт',
            'g' => 'гр',
        ];

        return $units[$value] ?? $value; // Повертає переклад або саме значення, якщо переклад відсутній
    }
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_materials')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
