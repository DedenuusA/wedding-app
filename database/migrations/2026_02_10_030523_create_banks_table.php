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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedding_id')->constrained()->cascadeOnDelete()->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('kolom1')->nullable();
            $table->string('kolom2')->nullable();
            $table->string('kolom3')->nullable();
            $table->string('kolom4')->nullable();
            $table->string('kolom5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
