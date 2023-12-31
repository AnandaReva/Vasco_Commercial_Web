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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();  // Menambahkan kolom id dengan auto-increment dan primary key
            $table->string('customer_name')->unique();  // Menambahkan opsi unique untuk kolom name
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};