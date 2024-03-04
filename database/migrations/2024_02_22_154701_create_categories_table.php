<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('serial_number');
            $table->string('category_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migratikons.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
