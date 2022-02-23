<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchases')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('total', 10, 2);
            $table->decimal('payment', 10, 2);
            $table->decimal('remainder', 10, 2);
            $table->date('debt_date')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['paid_off', 'not yet paid']);
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
        Schema::dropIfExists('debts');
    }
}
