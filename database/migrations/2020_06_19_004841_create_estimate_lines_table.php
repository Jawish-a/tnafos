<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimate_lines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('estimate_id');
            $table->unsignedBigInteger('service_id');
            $table->string('unit');
            $table->string('type');
            $table->double('rate');
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
        Schema::dropIfExists('estimate_lines');
    }
}
