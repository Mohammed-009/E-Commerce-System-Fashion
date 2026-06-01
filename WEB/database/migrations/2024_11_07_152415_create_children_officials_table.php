<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_officials', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('categoryName');
            $table->string('productName');
            $table->string('productImage');
            $table->mediumText('productDescription');
            $table->string('productPrice');
            $table->string('productSize');
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
        Schema::dropIfExists('children_officials');
    }
};
