<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDscapturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dscaptures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('screenid')->nullable();
            $table->foreign('screenid')->references('id')->on('screenings')->onDelete('cascade');
            $table->string('patient_id',15)->nullable();
            $table->string('lga_tb_number',20)->nullable();
            $table->string('hospital_number',20)->nullable();
            $table->string('rnl_serial_number',15)->nullable();
            $table->date('treatment_startdate')->nullable();
            $table->string('gender',5)->nullable();
            $table->string('first_name',30)->nullable();
            $table->string('last_name',30)->nullable();
            $table->double('age',5)->nullable();
            $table->string('hospital_admission',10)->nullable();
            $table->string('marital_status',10)->nullable();
            $table->string('patient_address',50)->nullable();
            $table->string('patient_phone_number',25)->nullable();
            $table->string('patient_contact',50)->nullable();
            $table->string('patient_contact_number',25)->nullable();
            $table->string('history_previous_treatment',20)->nullable();
            $table->string('anatomical_site',30)->nullable();
            $table->string('extra_pulmonary_site',30)->nullable();
            $table->string('bacteriological_result',30)->nullable();
            $table->string('hiv_result',20)->nullable();
            $table->date('art_start_date')->nullable();

            $table->string('hiv_status',20)->nullable();
            $table->string('type_of_care',30)->nullable();
            $table->date('hiv_service_date')->nullable();

            $table->string('on_anti_treatment',20)->nullable();
            $table->string('tb_durationinweeks',20)->nullable();

            $table->string('bactdiagnosed',10)->nullable();
            $table->string('genexpert_collected',20)->nullable();
            $table->string('genexpert_released',20)->nullable();
            $table->string('mtb_detected',20)->nullable();
            $table->string('afb_collected',20)->nullable();
            $table->string('afb_released',20)->nullable();
            $table->string('afb_smear_result',20)->nullable();
            $table->string('xray_released',20)->nullable();
            $table->string('xray_result',20)->nullable();

            $table->string('tbiopsy_released',20)->nullable();
            $table->string('tbiotype_of_specimen',30)->nullable();
            $table->string('tbiopsy_result',30)->nullable();

            $table->string('othertests_released',30)->nullable();
            $table->string('others_testname',30)->nullable();
            $table->string('othertests_result',30)->nullable();

            $table->string('tmmonth0',10)->nullable();
            $table->string('tmmonth2',10)->nullable();
            $table->string('tmmonth3',10)->nullable();
            $table->string('tmmonth5',10)->nullable();
            $table->string('tmmonth6',10)->nullable();

            $table->string('tmsmonth2',10)->nullable();
            $table->string('tmsmonth3',10)->nullable();
            $table->string('tmsmonth5',10)->nullable();
            $table->string('tmsmonth6',10)->nullable();

            $table->string('contact_tracing_done',10)->nullable();
            $table->date('date_tracingdone')->nullable();
            $table->string('num_children5less',10)->nullable();
            $table->string('num_children5above',10)->nullable();

            $table->string('regimenline',20)->nullable();

            $table->string('month1',10)->nullable();
            $table->string('year1',10)->nullable();
            $table->string('di1',191)->nullable();

            $table->string('month2',10)->nullable();
            $table->string('year2',10)->nullable();
            $table->string('di2',191)->nullable();

            $table->string('month3',10)->nullable();
            $table->string('year3',10)->nullable();
            $table->string('di3',191)->nullable();

            $table->string('month4',10)->nullable();
            $table->string('year4',10)->nullable();
            $table->string('di4',191)->nullable();

            $table->string('outcome',30)->nullable();
            $table->string('date_completed',20)->nullable();
            $table->string('health_worker',50)->nullable();


            $table->timestamps();
        });
    /*
        DB::table('dscaptures')->insert(
            array(
                'first_name' => '',
            )
        );
    */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dscaptures');
    }
}
