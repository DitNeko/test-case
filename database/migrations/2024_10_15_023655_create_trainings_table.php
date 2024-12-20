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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('poto');
            $table->string('title');
            $table->string('sub');
            $table->enum('status',['online','offline']);
            $table->string('price');
            $table->string('quota');
            $table->string('cource');
            $table->string('pemateri');
            $table->string('deskripsi');
            $table->string('zoom')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
