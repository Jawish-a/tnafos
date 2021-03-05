<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->string('cr');
            $table->string('vat');
            $table->string('establishment_year');
            $table->string('total_employees');
            $table->string('bio');
            $table->string('telephone');
            $table->string('fax');
            $table->string('email');
            $table->string('website');
            $table->string('country');
            $table->string('city');
            $table->string('po_box');
            $table->string('zip_code');
            $table->string('address');
            $table->string('location');
            $table->string('logo');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('category_id');

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
        Schema::dropIfExists('companies');
    }
}
