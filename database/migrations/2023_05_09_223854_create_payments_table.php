<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('transactionID');
            $table->string('transactionType', 10)->default('CASHOUT');
            $table->string('phoneNumber', 15);
            $table->integer('montant');
            $table->string('service_sigle');
            $table->foreignId('user_id')->constrained();
            $table->timestamp('createdAt')->nullable();
            $table->enum('status', [0, 1, 2, -1])->default(1)->comment("0 => success, 1 => initiate, 2 => pending, -1 => failed");
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
        Schema::dropIfExists('payments');
    }
}
