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
        Schema::table('users', function (Blueprint $table) {
            $table->string('kota_kabupaten')->nullable()->after('email_verified_at');
            $table->text('alamat_lengkap')->nullable()->after('kota_kabupaten');
            $table->string('image_path')->after('alamat_lengkap');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['kota_kabupaten', 'alamat_lengkap', 'image_path']);
        });
    }
};
