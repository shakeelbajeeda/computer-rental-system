<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentedDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rented_devices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('product_id');
            $table->decimal('total_price', 8, 2);
            $table->decimal('per_hour_rate', 8, 2);
            $table->date('booking_date')->nullable();
            $table->date('return_date')->nullable();
            $table->tinyInteger('is_returned')->default(0);
            $table->string('status')->nullable();
            $table->tinyInteger('is_insurance');
            $table->decimal('insurance_amount', 8, 2)->default(0);
            $table->decimal('security', 8, 2)->default(0);
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('damage_amount', 8, 2)->default(0);
            $table->decimal('total_hours', 8, 2)->default(0);
            $table->decimal('late_fee', 8, 2)->default(0);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('rented_devices');
    }
}
