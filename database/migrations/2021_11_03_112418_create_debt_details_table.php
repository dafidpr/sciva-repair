<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debt_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debt_id')->constrained('debts')->onDelete('cascade')->onUpdate('cascade');
            $table->date('payment_date')->nullable();
            $table->decimal('nominal');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('debt_details');
    }
}
