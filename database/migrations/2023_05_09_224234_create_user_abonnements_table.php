<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAbonnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_abonnements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('abonnementType_id');
            $table->string('transactionID');
            $table->string('buyerPhoneNumber');
            $table->foreignId('level_id');
            $table->foreignId('speciality_id');
            $table->timestamps();
            $table->string('expireAt');
            $table->string('createdAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_abonnements');
    }
}
