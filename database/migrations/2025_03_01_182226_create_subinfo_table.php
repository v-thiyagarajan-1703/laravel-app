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
        Schema::create('subinfo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('mid');
            $table->integer('restype');
            $table->integer('reseller');
            $table->integer('agent');
            $table->text('plans');
            $table->integer('card');
            $table->tinyInteger('isbdd')->default(0);
            $table->string('next_billing', 15);
            $table->tinyInteger('billing_type')->default(0);
            $table->tinyInteger('cpos_billing')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('subinfo');
    }
};