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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->date('date')->index();
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->string('activity', 255);
            $table->string('time_spent', 50)->nullable();
            $table->string('distance', 50)->nullable();
            $table->integer('set_count')->default(0);
            $table->integer('reps')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};

