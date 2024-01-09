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
        Schema::table('deliveries', function (Blueprint $table) {
            $table->string('provider')->nullable();
            $table->string('service')->nullable();
            $table->string('etd')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('deliveries', function (Blueprint $table) {
            $table->dropColumn('provider');
            $table->dropColumn('service');
            $table->dropColumn('etd');
        });
    }
};
