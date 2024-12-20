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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company_name'); // Nama Perusahaan
            $table->string('address'); // Alamat Perusahaan
            $table->string('city'); // Kota
            $table->string('country'); // Negara
            $table->string('zip_code'); // Kode Pos
            $table->string('phone'); // Nomor Telp
            $table->string('fax')->nullable(); // Nomor Fax
            $table->string('company_email'); // Alamat Email Perusahaan

            // PIC Information
            $table->string('pic_name'); // Nama PIC
            $table->string('pic_title'); // Jabatan PIC
            $table->string('pic_phone'); // Nomor Telp PIC
            $table->string('pic_mobile_phone'); // Nomor HP PIC
            $table->string('pic_email'); // Email PIC

            // CP Information
            $table->string('cp_name')->nullable(); // Nama CP
            $table->string('cp_title')->nullable(); // Jabatan CP
            $table->string('cp_phone')->nullable(); // Nomor Telp CP
            $table->string('cp_mobile_phone')->nullable(); // Nomor HP CP
            $table->string('cp_email')->nullable(); // Email CP

            // Other fields
            $table->string('registration_type'); // Jenis Registrasi
            $table->string('application_type'); // Tipe Aplikasi
            $table->string('registration_status'); // Status Registrasi
            $table->string('product_type'); // Jenis Produk
            $table->string('product_marketing_type'); // Tipe pemasaran produk
            $table->integer('total_employee'); // Jumlah karyawan
            $table->string('production_capacity'); // Kapasitas produksi
            $table->string('npwp_number')->nullable(); // Nomor NPWP (Only for Indonesia Company)

            // Facility Data
            $table->string('facility_manufacturer_name')->nullable(); // Nama Pabrik
            $table->string('facility_manufacturer_address')->nullable(); // Alamat Pabrik
            $table->string('facility_city')->nullable(); // Kota Pabrik
            $table->string('facility_country')->nullable(); // Negara Pabrik
            $table->string('facility_zip_code')->nullable(); // Kode Pos Pabrik
            $table->string('facility_phone')->nullable(); // Nomor Telp Pabrik
            $table->string('facility_fax')->nullable(); // Nomor Fax Pabrik
            $table->string('facility_email')->nullable(); // Alamat Email Pabrik

            // PIC for Facility
            $table->string('facility_pic_name')->nullable(); // Nama PIC Pabrik
            $table->string('facility_pic_title')->nullable(); // Jabatan PIC Pabrik
            $table->string('facility_pic_phone')->nullable(); // Nomor Telp PIC Pabrik
            $table->string('facility_pic_mobile_phone')->nullable(); // Nomor HP PIC Pabrik
            $table->string('facility_pic_email')->nullable(); // Email PIC Pabrik

            // CP for Facility
            $table->string('facility_cp_name')->nullable(); // Nama CP Pabrik
            $table->string('facility_cp_title')->nullable(); // Jabatan CP Pabrik
            $table->string('facility_cp_phone')->nullable(); // Nomor Telp CP Pabrik
            $table->string('facility_cp_mobile_phone')->nullable(); // Nomor HP CP Pabrik
            $table->string('facility_cp_email')->nullable(); // Email CP Pabrik

            // Other Facility
            $table->text('other_facility_name_and_address')->nullable(); // Nama dan alamat fasilitas lain (bila ada)

            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
