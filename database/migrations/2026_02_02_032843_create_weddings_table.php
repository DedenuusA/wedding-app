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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();

            $table->string('bride_name')->nullable();
            $table->string('groom_name')->nullable();

            $table->string('bride_parent')->nullable();
            $table->string('groom_parent')->nullable();

            $table->date('date')->nullable();
            $table->time('time')->nullable();

            $table->string('location')->nullable();
            $table->text('maps_link')->nullable();
            $table->text('story')->nullable();

            $table->string('theme')->default('wedding-classic');
            $table->string('music_url')->nullable();

            $table->string('slug')->unique();
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
        Schema::dropIfExists('weddings');
    }
};
