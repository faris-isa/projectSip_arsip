<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('offer_id')->unsigned();
            $table->integer('purchase_id')->unsigned();
            $table->enum('status',['penawaran', 'pembelian','selesai']);
            $table->timestamps();

            $tbale->foreign('offer_id')->reference('id')->on('offers');
            $tbale->foreign('puchase_id')->reference('id')->on('purchases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offer_purchases');
    }
}
