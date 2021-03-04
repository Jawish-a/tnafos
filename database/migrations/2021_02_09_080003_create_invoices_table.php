<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid');
            $table->date('date');
            $table->date('dueDate'); // due date to pay the invoice
            $table->string('status'); // draft, sent, expired, declined, accepted
            $table->longText('notes');
            $table->longText('terms');
            $table->double('subtotal');
            $table->double('discount');
            $table->double('tax');
            $table->double('total');
            // more to be here
            // foregn keys to be here
            // $table->unsignedInteger('estimate_id'); // to know which order the estimate was created
            $table->unsignedInteger('company_id'); // for the company that created the estimate
            $table->unsignedInteger('user_id'); // for user that created the estimate
            $table->unsignedInteger('client_id'); // for user that created the estimate
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
        Schema::dropIfExists('invoices');
    }
}
