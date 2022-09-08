<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAggreportactivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aggreportactivities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issue_id')->index();
            $table->foreign('issue_id')->references('id')->on('aggreportissues')->onDelete('cascade');
            $table->string('activities',250)->nullable();
            $table->date('dated')->nullable();
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
        Schema::dropIfExists('aggreportactivities');
    }
}
