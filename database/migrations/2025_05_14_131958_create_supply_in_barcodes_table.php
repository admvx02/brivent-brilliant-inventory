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
        Schema::create('supply_in_barcodes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supply_in_id')->constrained()->onDelete('cascade');
            $table->string('code')->unique(); // barcode string
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_in_barcodes');
    }
};
