<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor', function (Blueprint $table) {
            $table->id('visitor_id');
            $table->string('visitor_name', 50);
            $table->string('visitor_phone', 50);
            $table->string('visitor_email', 50);
            $table->string('visitor_age', 50);
            $table->string('visitor_address');
            $table->string('visitor_occupation');
            $table->string('visitor_image')->nullable();
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
        Schema::dropIfExists('visitor');
    }
}
