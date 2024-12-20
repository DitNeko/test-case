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
        Schema::create('foodinfos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company');
            $table->enum('schedule', [
                'senin',
                'selasa',
                'rabu',
                'kamis',
                'jumat',
                'sabtu'
            ]);
            
            $table->enum('food', [
                'ikan bakar',
                'bakso',
                'gado gado',
                'soto ayam',
                'tempe goreng',
                'ayam goreng',
                'mie goreng',
                'tahu isi',
                'ayam panggang',
                'lontong',
                'tumis kangkung'
            ]);

            $table->enum('drink', [
           
                'jus mangga',
                'jus tomat',
                'soda',
                'air mineral'
            ]);

            $table->enum('fruit', [

                'apel',
                'pisang',
                'jeruk',
                'mangga',
                'kiwi',
                'semangka',
                'anggur',
                'nanas'
            ]);

            $table->enum('snack', [
                'tidak pilih',
                'keripik',
                'kue',
                'donat',
                'biskuit',
                'kacang',
                'jajanan pasar',
                'popcorn',
                'sushi snack'
            ]);
            $table->enum('status',['pending','approved','rejected']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foodinfos');
    }
};
