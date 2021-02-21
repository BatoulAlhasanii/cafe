<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->index();
            $table->integer('eta')->nullable();

            $table->text('payment_transaction_id')->nullable();
            $table->string('creditcard_last4digits', 4)->nullable();

            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->string('order_number')->nullable();

            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->string('email');
            $table->string('district')->nullable();
            $table->text('address');


            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->decimal('sub_total', 8, 2);
            $table->decimal('shipping_fees', 8, 2)->default( 0 );
            $table->decimal('total', 8, 2);
            $table->bigInteger('expected_delivery')->default(0); // YmdHis
            $table->bigInteger('actual_delivery')->default(0); // YmdHis



            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons');
            $table->string('coupon_code')->nullable();
            $table->foreign('coupon_code')->references('code')->on('coupons');
            $table->decimal('amount_deducted', 8, 2)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
