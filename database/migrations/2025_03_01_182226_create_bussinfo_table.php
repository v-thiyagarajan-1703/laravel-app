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
        Schema::create('bussinfo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('mid');
            $table->string('name', 150);
            $table->string('cname', 75);
            $table->string('phone', 15);
            $table->string('altphone', 15);
            $table->string('email', 75);
            // loc_id,time_zone,location  and add location_info table
            $table->text('address');
            $table->string('city', 75);
            $table->tinyInteger('province');
            $table->string('apt_suite', 100)->nullable();
            $table->string('pincode', 10);
            $table->tinyInteger('country');
            $table->timestamps();
            $table->index(['mid', 'email'], 'inx_mid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('bussinfo');
    }
};