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
        Schema::create('master_banks', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable(); // BCA, BRI, MANDIRI
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->string('kolom1')->nullable();
            $table->string('kolom2')->nullable();
            $table->string('kolom3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_banks');
    }
};
