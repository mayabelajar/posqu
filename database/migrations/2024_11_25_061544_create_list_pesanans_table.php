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
        Schema::create('list_pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanans_id')->constrained()->onDelete('cascade');
            $table->foreignId('produks_id')->constrained()->onDelete('cascade');
            $table->integer('qty')->nullable();
            $table->float('total')->nullable();
            $table->timestamps();
        });
        // Schema::table('list_pesanans', function (Blueprint $table) {
        //     $table->foreignId('pemesanans_id')->constrained('pemesanans');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_pesanans');
    }
};
