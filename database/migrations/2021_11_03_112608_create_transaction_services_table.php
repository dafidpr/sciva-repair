<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('repaire_id')->constrained('repaire_services')->onDelete('cascade')->onUpdate('cascade');
            $table->string('transaction_code', 200);
            $table->string('unit', 100);
            $table->string('serial_number', 100);
            $table->text('complient');
            $table->string('completenes', 100);
            $table->string('passcode');
            $table->text('notes');
            $table->date('service_date')->nullable();
            $table->decimal('estimated_cost');
            $table->date('pickup_date')->nullable();
            $table->enum('payment_method', ['cash', 'credit']);
            $table->decimal('payment');
            $table->decimal('cashback');
            $table->enum('status', ['proses', 'waiting sparepart', 'finished']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_services');
    }
}
