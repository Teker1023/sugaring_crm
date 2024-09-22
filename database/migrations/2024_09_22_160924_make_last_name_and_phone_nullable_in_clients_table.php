<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('clients', function (Blueprint $table) {
        $table->string('last_name')->nullable()->change();  // Робимо поле "Прізвище" необов'язковим
        $table->string('phone')->nullable()->change();      // Робимо поле "Номер телефону" необов'язковим
    });
}

public function down()
{
    Schema::table('clients', function (Blueprint $table) {
        $table->string('last_name')->nullable(false)->change(); // Повертаємо як обов'язкове
        $table->string('phone')->nullable(false)->change();     // Повертаємо як обов'язкове
    });
}

};
