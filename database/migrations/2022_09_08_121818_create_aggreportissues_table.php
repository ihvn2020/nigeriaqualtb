<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAggreportissuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aggreportissues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aggreport_id')->index();
            $table->foreign('aggreport_id')->references('id')->on('aggreports')->onDelete('cascade');
            $table->string('indicator_id',5)->nullable();
            $table->string('issues',250)->nullable();
            $table->string('comments',250)->nullable();
            $table->unsignedBigInteger('entered_by')->index();
            $table->foreign('entered_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('aggreportissues');
    }
}
