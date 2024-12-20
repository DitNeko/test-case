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
        Schema::create('nibs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nik');
            $table->string('name');
            $table->string('gender');
            $table->string('phone');
            $table->string('id_card_address');
            $table->string('personal_npwp');
            $table->string('company_import_decision');
            $table->string('has_bpjs_employment');
            $table->string('has_bpjs_health');
            $table->string('is_npwp_different');
            $table->string('business_name');
            $table->string('kbli');
            $table->string('business_scala');
            $table->string('business_address');
            $table->string('province');
            $table->string('regency');
            $table->string('subdistrict');
            $table->string('ward');
            $table->string('pos_code');
            $table->decimal('business_capital', 15, 2);
            $table->text('business_description');
            $table->string('indonesian_workers');
            $table->enum('business_status', ['sudah', 'belum']);
            $table->enum('new_building_plan', ['yes', 'no']);
            $table->enum('business_type', ['darat', 'laut', 'hutan']);

            // Kolom untuk Bisnis Darat
            $table->string('land_based_business_location')->nullable();

            // Kolom untuk Bisnis Laut
            $table->decimal('required_area', 10, 2)->nullable();
            $table->decimal('required_length', 10, 2)->nullable();
            $table->decimal('location_depth', 10, 2)->nullable();
            $table->decimal('building_plan_area', 10, 2)->nullable();
            $table->enum('spatial_compatibility', ['yes', 'no'])->nullable();
            $table->enum('reclamation', ['yes', 'no'])->nullable();
            $table->string('water_name')->nullable();
            $table->string('cross_province_location')->nullable();
            $table->string('coordinates')->nullable();

            // Kolom untuk Bisnis Hutan
            $table->string('business_land_area')->nullable();
            $table->enum('forest_approval_status', ['sudah', 'belum'])->nullable();
            $table->enum('required_forest_permit_type', ['Penggunaan Kawasan Hutan', 'Pelepasan Kawasan Hutan', 'Pemanfaatan Hutan', 'Konversi Kawasan'])->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nibs');
    }
};
