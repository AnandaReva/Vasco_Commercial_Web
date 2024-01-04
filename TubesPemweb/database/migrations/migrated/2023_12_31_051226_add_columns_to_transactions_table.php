<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {

            $table->unsignedBigInteger('qty')->nullable();
            // Tambahkan kolom product_id sebagai foreign key
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');

            // Tambahkan kolom variant_id sebagai foreign key
            $table->unsignedBigInteger('variant_id')->nullable();
            $table->foreign('variant_id')->references('id')->on('product_variants');

            // Tambahkan kolom availablesize_id sebagai foreign key
            $table->unsignedBigInteger('availablesize_id')->nullable();
            $table->foreign('availablesize_id')->references('id')->on('available_sizes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // Hapus kolom-kolom yang ditambahkan pada metode up()
            $table->dropForeign(['product_id']);
            $table->dropColumn('product_id');

            $table->dropForeign(['variant_id']);
            $table->dropColumn('variant_id');

            $table->dropForeign(['availablesize_id']);
            $table->dropColumn('availablesize_id');
        });
    }
};
