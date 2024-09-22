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
        $table->integer('appointments_count')->default(0); // Відстежуємо кількість процедур
    });
}

public function down()
{
    Schema::table('clients', function (Blueprint $table) {
        $table->dropColumn('appointments_count');
    });
}

};
