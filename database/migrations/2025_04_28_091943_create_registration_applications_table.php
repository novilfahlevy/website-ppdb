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
        Schema::create('registration_applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->comment('Nama lengkap');
            $table->string('nisn')->unique()->comment('NISN (Nomor Induk Siswa Nasional)');
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->comment('Jenis kelamin');
            $table->string('birth_place')->comment('Tempat lahir');
            $table->date('birth_date')->comment('Tanggal lahir');
            $table->string('religion')->comment('Agama');
            $table->text('full_address')->comment('Alamat lengkap');
            $table->string('personal_phone_number')->nullable()->comment('Nomor telepon/HP pribadi (jika ada)');
            $table->string('email')->nullable()->comment('Email (opsional)');
            $table->string('father_name')->comment('Nama ayah');
            $table->string('mother_name')->comment('Nama ibu');
            $table->string('parents_last_education')->comment('Pendidikan terakhir orang tua');
            $table->string('parents_occupation')->comment('Pekerjaan orang tua');
            $table->text('parents_address')->nullable()->comment('Alamat orang tua (jika berbeda)');
            $table->string('parents_phone_number')->comment('Nomor HP orang tua/wali');
            $table->string('parents_income')->nullable()->comment('Penghasilan orang tua (kadang dibutuhkan untuk jalur afirmasi)');
            $table->string('previous_school_name')->comment('Nama sekolah asal');
            $table->string('previous_school_npsn')->comment('NPSN sekolah asal');
            $table->text('previous_school_address')->comment('Alamat sekolah');
            $table->enum('school_status', ['Negeri', 'Swasta'])->comment('Status sekolah (negeri/swasta)');
            $table->string('exam_participant_number')->nullable()->comment('Nomor peserta ujian (jika sudah ada)');
            $table->string('birth_certificate_filepath')->comment('Scan/foto akta kelahiran');
            $table->string('family_card_filepath')->comment('Scan/foto kartu keluarga (KK)');
            $table->string('report_card_filepath')->comment('Scan rapor (semester tertentu)');
            $table->string('recent_photo_filepath')->comment('Pas foto terbaru');
            $table->string('achievement_certificate_filepath')->nullable()->comment('Sertifikat prestasi (jika ada)');
            $table->string('domicile_certificate_filepath')->nullable()->comment('Surat keterangan domisili (jika diperlukan)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_applications');
    }
};
