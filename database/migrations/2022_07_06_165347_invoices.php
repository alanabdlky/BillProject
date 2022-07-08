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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->references('id')->on('managers')->onDelete('cascade');
            $table->foreignId('accountant_id')->references('id')->on('accountants')->onDelete('cascade');
            $table->foreignId('type_id')->references('id')->on('invoice_type')->onDelete('cascade');
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->float('discount');
            $table->float('tax');
            $table->string('payment_status');
            $table->rememberToken();
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
};
