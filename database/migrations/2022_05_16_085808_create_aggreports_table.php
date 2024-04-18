<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAggreportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aggreports', function (Blueprint $table) {
            $table->id();
            $table->string('title',100)->nullable();
            $table->unsignedBigInteger('facility')->constrained();
            $table->date('from');
            $table->date('to');
            $table->float('ndstb1u15',10,2)->nullable();
            $table->float('ndstb1a15',10,2)->nullable();
            $table->float('ddstb1',10,2)->nullable();
            $table->float('r1',10,2)->nullable();

            $table->float('ndstb2u15',10,2)->nullable();
            $table->float('ndstb2a15',10,2)->nullable();
            $table->float('ddstb2',10,2)->nullable();
            $table->float('r2',10,2)->nullable();

            $table->float('ndstb3u',10,2)->nullable();
            $table->float('ddstb3',10,2)->nullable();
            $table->float('r3',10,2)->nullable();

            $table->float('ndstb4u',10,2)->nullable();
            $table->float('ddstb4',10,2)->nullable();
            $table->float('r4',10,2)->nullable();

            $table->float('ndstb5u',10,2)->nullable();
            $table->float('ddstb5',10,2)->nullable();
            $table->float('r5',10,2)->nullable();

            $table->float('ndstb6u',10,2)->nullable();
            $table->float('ddstb6',10,2)->nullable();
            $table->float('r6',10,2)->nullable();

            $table->float('ndstb7u',10,2)->nullable();
            $table->float('ddstb7',10,2)->nullable();
            $table->float('r7',10,2)->nullable();

            $table->float('ndstb8u',10,2)->nullable();
            $table->float('ddstb8',10,2)->nullable();
            $table->float('r8',10,2)->nullable();

            $table->float('ndstb9u',10,2)->nullable();
            $table->float('ddstb9',10,2)->nullable();
            $table->float('r9',10,2)->nullable();

            $table->float('ndstb10u',10,2)->nullable();
            $table->float('ddstb10',10,2)->nullable();
            $table->float('r10',10,2)->nullable();

            $table->float('ndstb11u',10,2)->nullable();
            $table->float('ddstb11',10,2)->nullable();
            $table->float('r11',10,2)->nullable();

            $table->float('ndstb12u',10,2)->nullable();
            $table->float('ddstb12',10,2)->nullable();
            $table->float('r12',10,2)->nullable();

            $table->float('ndstb13u',10,2)->nullable();
            $table->float('ddstb13',10,2)->nullable();
            $table->float('r13',10,2)->nullable();

            $table->float('ndstb14u',10,2)->nullable();
            $table->float('ddstb14',10,2)->nullable();
            $table->float('r14',10,2)->nullable();

            $table->float('ndstb15u',10,2)->nullable();
            $table->float('ddstb15',10,2)->nullable();
            $table->float('r15',10,2)->nullable();

            $table->float('ndstb16u',10,2)->nullable();
            $table->float('ddstb16',10,2)->nullable();
            $table->float('r16',10,2)->nullable();

            $table->float('ndstb17u',10,2)->nullable();
            $table->float('ddstb17',10,2)->nullable();
            $table->float('r17',10,2)->nullable();

            $table->float('ndstb18u',10,2)->nullable();
            $table->float('ddstb18',10,2)->nullable();
            $table->float('r18',10,2)->nullable();

            $table->float('ndstb19u',10,2)->nullable();
            $table->float('ddstb19',10,2)->nullable();
            $table->float('r19',10,2)->nullable();
            $table->unsignedBigInteger('entered_by')->constrained();

            $table->foreign('entered_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('facility')->references('id')->on('facilities')->onDelete('cascade');

            $table->string('status',30)->nullable();
            $table->string('appid',50)->nullable()->unique();

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
        Schema::dropIfExists('aggreports');
    }
}
