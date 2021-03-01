<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('AUD');
            $table->string('GBP');
            $table->string('BYN');
            $table->string('DKK');
            $table->string('USD');
            $table->string('EUR');
            $table->string('CAD');
            $table->string('CNY');
            $table->string('UAH');
            $table->string('CZK');
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
        Schema::dropIfExists('currencies');
    }
}
