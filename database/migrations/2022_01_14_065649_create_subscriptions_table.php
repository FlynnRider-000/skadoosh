<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('reference user id');
            $table->string('email')->comment('subscriber email');
            $table->integer('frequency')->comment('decide if it is daily or weekly notification');
            $table->dateTime('verified_at')->nullable()->comment('email verification time');
            $table->string('token')->comment('verification token');
            $table->tinyInteger('active')->default(1)->comment('check if subscription is valid or not');
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
        Schema::dropIfExists('subscriptions');
    }
}
