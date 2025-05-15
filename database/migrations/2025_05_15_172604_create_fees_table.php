<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            
            // Sumbangan Fasilitas Pendidikan
            $table->unsignedBigInteger('sfp_option_1')->default(1000000);
            $table->unsignedBigInteger('sfp_option_2')->default(2000000);
            $table->unsignedBigInteger('sfp_option_3')->default(3000000);
            $table->unsignedBigInteger('sfp_option_4')->default(4000000);
            $table->unsignedBigInteger('sfp_option_5')->default(5000000);
            
            // Dana Pengembangan Pendidikan (DPP)
            $table->unsignedBigInteger('dpp_amount')->default(4000000);
            $table->text('dpp_items')->nullable(); // JSON array of included items
            
            // SPP
            $table->unsignedBigInteger('spp_amount')->default(400000);
            
            // Payment information
            $table->string('payment_phone')->nullable();
            $table->string('payment_email')->nullable();
            
            $table->timestamps();
        });
        
        // Insert default record with DPP items
        DB::table('fees')->insert([
            'dpp_items' => json_encode([
                'Seragam Olahraga',
                'Atribut dan kartu pelajar',
                'Asuransi dan psikotest',
                'Pendampingan siswa',
                'Buku rapor',
                'Outing class',
                'Tes & ujian',
                'Kegiatan kesiswaan',
                'Kerohanian',
                'Ekstrakurikuler'
            ]),
            'payment_phone' => '(0274) 123456',
            'payment_email' => 'keuangan@sekolah.ac.id',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
