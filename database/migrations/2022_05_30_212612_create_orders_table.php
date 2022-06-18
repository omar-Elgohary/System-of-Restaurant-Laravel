<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('meal_id');
            $table->string('phone');

            $table->integer('small_meal')->default(0);
            $table->integer('medium_meal')->default(0);
            $table->integer('large_meal')->default(0);

            $table->text('body');
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
