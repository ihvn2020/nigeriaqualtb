<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNdrmatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ndrmatches', function (Blueprint $table) {
            $table->id();
            $table->string('facility_datim_code',30)->nullable();
            $table->string('pepfar_id',30)->unique()->index();
            $table->string('recapture_date',30)->nullable();
            $table->string('recapture_count',30)->nullable();
            $table->string('baseline_replaced',30)->nullable();
            $table->string('match_outcome',30)->nullable();
            $table->string('otherinfo',100)->nullable();
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
        Schema::dropIfExists('ndrmatches');
    }
}
