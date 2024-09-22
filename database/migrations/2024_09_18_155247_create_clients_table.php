<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Запустіть міграцію.
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');  // Ім'я
            $table->string('last_name');   // Прізвище
            $table->string('phone')->unique();  // Номер телефону
            $table->timestamps();
        });
    }
    
}
