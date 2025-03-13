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
        Schema::create('members', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id');
            $table->integer('bid');
            $table->string('name');
            $table->string('email');
            $table->string('phone', 15);
            $table->string('altphone', 15);
            $table->string('address');
            $table->string('city');
            $table->string('pincode', 10);
            $table->string('username');
            $table->string('password');
            $table->string('loginpin', 4);
            $table->string('apikey', 50);
            $table->text('last_login');
            $table->integer('unblock')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('isdemo')->default(0);
            $table->index(['id', 'user_id', 'bid', 'apikey'], 'inx_id_apikey');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('members');
    }
};