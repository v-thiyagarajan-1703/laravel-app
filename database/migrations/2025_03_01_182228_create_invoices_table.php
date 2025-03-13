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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mid');
            $table->unsignedBigInteger('customer_id');
            $table->string('invoice_number', 50)->unique();
            $table->date('issue_date');
            $table->date('due_date');
            
            $table->enum('status', ['draft', 'sent', 'paid', 'void', 'overdue', 'outstanding', 'scheduled', 'refunded'])->default('draft');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount_amount', 10, 2)->default(0.00);
            $table->decimal('tax_amount', 10, 2);
            $table->decimal('total', 10, 2);
            $table->text('notes')->nullable();
            $table->text('terms')->nullable();
            $table->enum('invoice_type', ['standard', 'recurring'])->default('standard');
            $table->date('refund_date')->nullable();
            $table->decimal('refund_amount', 10, 2)->default(0.00);

            $table->text('reason')->nullable();
            $table->date('scheduled_date')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('mid')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};