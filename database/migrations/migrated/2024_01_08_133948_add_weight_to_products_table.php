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
        Schema::table('available_sizes', function (Blueprint $table) {
            $table->unsignedBigInteger('weight')->nullable();
        });
    }

    public function down()
    {
        Schema::table('available_sizea', function (Blueprint $table) {
            $table->dropColumn('weight');
        });
    }
};
