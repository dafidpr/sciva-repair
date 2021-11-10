<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_service_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transaction_services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('sparepart_id')->constrained('products')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('total');
            $table->decimal('discount');
            $table->decimal('sub_total');
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
        Schema::dropIfExists('transaction_service_details');
    }
}
