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
            $table->string('kota_kabupaten')->after('email_verified_at');
            $table->text('alamat_lengkap')->after('kota_kabupaten');
            $table->string('photo')->nullable()->after('alamat_lengkap');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['kote_kabupaten', 'alamat_lengkap', 'photo']);
        });
    }
};
