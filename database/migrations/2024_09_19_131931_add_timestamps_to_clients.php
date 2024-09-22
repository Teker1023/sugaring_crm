<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToClients extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('clients', function (Blueprint $table) {
        if (!Schema::hasColumn('clients', 'created_at') && !Schema::hasColumn('clients', 'updated_at')) {
            $table->timestamps();
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropTimestamps();  // Видаляє стовпці created_at і updated_at
        });
    }
}
