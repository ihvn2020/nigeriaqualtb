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
            $table->string('patient_id',50)->nullable();
            $table->string('lga_tb_number',50)->nullable();
            $table->string('hospital_number',50)->nullable();
            $table->string('rnl_serial_number',50)->nullable();
            $table->string('gender',50)->nullable();
            $table->string('first_name',50)->nullable();
            $table->string('last_name',50)->nullable();
            $table->string('age',50)->nullable();
            $table->string('hospital_admission',50)->nullable();
            $table->string('marital_status',50)->nullable();
            $table->string('patient_address',50)->nullable();
            $table->string('patient_phone_number',50)->nullable();
            $table->string('patient_contact',50)->nullable();
            $table->string('patient_contact_number',50)->nullable();
            $table->string('history_previous_treatment',50)->nullable();
            $table->string('anatomical_site',50)->nullable();
            $table->string('extra_pulmonary_site',50)->nullable();
            $table->string('bacteriological_result',50)->nullable();
            $table->string('hiv_result',50)->nullable();
            $table->string('art_start_date',50)->nullable();

            $table->string('hiv_status',50)->nullable();
            $table->string('type_of_care',50)->nullable();
            $table->string('hiv_service_date',50)->nullable();

            $table->string('on_anti_treatment',50)->nullable();
            $table->string('tb_durationinweeks',50)->nullable();
            $table->string('genexpert_collected',50)->nullable();
            $table->string('genexpert_released',50)->nullable();
            $table->string('mtb_detected',50)->nullable();
            $table->string('afb_collected',50)->nullable();
            $table->string('afb_released',50)->nullable();
            $table->string('afb_smear_result',50)->nullable();
            $table->string('xray_released',50)->nullable();
            $table->string('xray_result',50)->nullable();

            $table->string('tbiopsy_released',50)->nullable();
            $table->string('tbiotype_of_specimen',50)->nullable();
            $table->string('tbiopsy_result',50)->nullable();

            $table->string('othertests_released',50)->nullable();
            $table->string('others_testname',50)->nullable();
            $table->string('othertests_result',50)->nullable();

            $table->string('tmmonth0',50)->nullable();
            $table->string('tmmonth2',50)->nullable();
            $table->string('tmmonth3',50)->nullable();
            $table->string('tmmonth5',50)->nullable();
            $table->string('tmmonth6',50)->nullable();

            $table->string('tmsmonth2',50)->nullable();
            $table->string('tmsmonth3',50)->nullable();
            $table->string('tmsmonth5',50)->nullable();
            $table->string('tmsmonth6',50)->nullable();

            $table->string('contact_tracing_done',50)->nullable();
            $table->string('num_children5less',50)->nullable();
            $table->string('num_children5above',50)->nullable();

            $table->string('regimenline',50)->nullable();
            
            $table->string('month',191)->nullable();
            $table->string('year',191)->nullable();
            $table->string('di',191)->nullable();

            $table->string('month2',191)->nullable();
            $table->string('year2',191)->nullable();
            $table->string('di2',191)->nullable();

            $table->string('month3',191)->nullable();
            $table->string('year3',191)->nullable();
            $table->string('di3',191)->nullable();

            $table->string('month4',191)->nullable();
            $table->string('year4',191)->nullable();
            $table->string('di4',191)->nullable();

            $table->string('outcome',50)->nullable();
            $table->string('date_completed',50)->nullable();
            $table->string('health_worker',50)->nullable();


            $table->timestamps();
        });

        DB::table('dscaptures')->insert(
            array(
                'first_name' => '',
               
            )
        );
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
