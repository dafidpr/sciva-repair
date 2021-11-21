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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('transaction_code', 200)->nullable();
            $table->string('unit', 100);
            $table->string('serial_number', 100);
            $table->text('complient');
            $table->string('completenes', 100);
            $table->string('passcode')->nullable();
            $table->text('notes')->nullable();
            $table->date('service_date')->nullable();
            $table->decimal('estimated_cost', 10, 2);
            $table->date('pickup_date')->nullable();
            $table->enum('payment_method', ['cash', 'credit'])->nullable();
            $table->decimal('payment')->nullable();
            $table->decimal('cashback')->nullable();
            $table->decimal('total')->nullable();
            $table->enum('status', ['proses', 'waiting sparepart', 'finished', 'cancelled', 'take']);
            $table->timestamps();
            $table->softDeletes();
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
