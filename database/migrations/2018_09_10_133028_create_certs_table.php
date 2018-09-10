<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certs', function (Blueprint $table) {
            $table->increments('id');

            $table->string('url');
            $table->date('expiration_date');
            $table->dateTime('expiration_datetime_verified')->nullable();
            $table->dateTime('last_email_datetime')->nullable();
            $table->string('incident')->nullable();
            $table->string('serial_number')->nullable();
            $table->integer('agreement_id')->unsigned();
            $table->foreign('agreement_id')->references('id')->on('agreements');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certs');
    }
}
