<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrcapturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drcaptures', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id',191)->nullable();
            $table->string('lga_tb_number',191)->nullable();
            $table->string('hospital_number',191)->nullable();
            $table->string('rnl_serial_number',191)->nullable();
            $table->string('gender',191)->nullable();
            $table->string('first_name',191)->nullable();
            $table->string('last_name',191)->nullable();
            $table->string('age',191)->nullable();
            $table->string('hospital_admission',191)->nullable();
            $table->string('marital_status',191)->nullable();
            $table->string('occupation',191)->nullable();
            $table->string('if_employed',191)->nullable();
            $table->string('patient_address',191)->nullable();
            $table->string('patient_phone_number',191)->nullable();
            $table->string('patient_contact',191)->nullable();
            $table->string('patient_contact_number',191)->nullable();
            $table->string('anti_tb_previous_exposure',191)->nullable();
            $table->string('anti_tb_pattern',191)->nullable();
            $table->string('disease_site',191)->nullable();
            $table->string('afb_dsc',191)->nullable();
            $table->string('afb_drr',191)->nullable();
            $table->string('genexpert_dsc',191)->nullable();
            $table->string('genexpert_drr',191)->nullable();
            $table->string('audiometery_dsc',191)->nullable();
            $table->string('audiometery_drr',191)->nullable();
            $table->string('cxray_dsc',191)->nullable();
            $table->string('cxray_drr',191)->nullable();
            $table->string('eucr_dsc',191)->nullable();
            $table->string('eucr_drr',191)->nullable();
            $table->string('pregtest_dsc',191)->nullable();
            $table->string('pregtest_drr',191)->nullable();
            $table->string('lft_dsc',191)->nullable();
            $table->string('lft_drr',191)->nullable();
            $table->string('tft_dsc',191)->nullable();
            $table->string('tft_drr',191)->nullable();
            $table->string('hiv_dsc',191)->nullable();
            $table->string('hiv_drr',191)->nullable();
            $table->string('fbs_dsc',191)->nullable();
            $table->string('fbs_drr',191)->nullable();
            $table->string('culture_dsc',191)->nullable();
            $table->string('culture_drr',191)->nullable();
            $table->string('drugsuscep_dsc',191)->nullable();
            $table->string('drugsuscep_drr',191)->nullable();
            $table->string('fbc_dsc',191)->nullable();
            $table->string('fbc_drr',191)->nullable();
            $table->string('hbv_dsc',191)->nullable();
            $table->string('hbv_drr',191)->nullable();
            $table->string('hcv_dsc',191)->nullable();
            $table->string('hcv_drr',191)->nullable();
            $table->string('urinalysis_dsc',191)->nullable();
            $table->string('urinalysis_drr',191)->nullable();
            $table->string('ecg_dsc',191)->nullable();
            $table->string('ecg_drr',191)->nullable();
            $table->string('tested_hiv',191)->nullable();
            $table->string('hiv_test_date',191)->nullable();

            $table->string('hiv_result',191)->nullable();
            $table->string('positive_hiv',191)->nullable();
            $table->string('art_start_date',191)->nullable();

            
            $table->string('treatment_started',191)->nullable();
            $table->string('date_treatment_started',191)->nullable();
            $table->string('where_treatment_initiated',191)->nullable();
            

            $table->string('treatment_supporter',191)->nullable();
            $table->string('relationship',191)->nullable();
            $table->string('last_support_date',191)->nullable();
            $table->string('treatment_outcome',191)->nullable();
            $table->string('to_date',191)->nullable();

            $table->string('diabetes_mellitus',191)->nullable();
            $table->string('dmdate_last_assessment',191)->nullable();
            $table->string('dmresult',191)->nullable();
            

            $table->string('hypertension',191)->nullable();
            $table->string('hypdate_last_assessment',191)->nullable();
            $table->string('hypresult',191)->nullable();
            $table->string('renal_disease',191)->nullable();
            $table->string('rddate_last_assessment',191)->nullable();
            $table->string('rdresult',191)->nullable();
            $table->string('liver_disease',191)->nullable();
            $table->string('livddate_last_assessment',191)->nullable();
            $table->string('livdresult',191)->nullable();
            $table->string('thyroid_disease',191)->nullable();
            $table->string('thddate_last_assessment',191)->nullable();
            $table->string('thdresult',191)->nullable();
            $table->string('tb_register_filled',191)->nullable();
            $table->string('tb_card_filled',191)->nullable();
            $table->string('community_once',191)->nullable();
            $table->string('facility_once',191)->nullable();
            $table->timestamps();
        });

        DB::table('drcaptures')->insert(
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
        Schema::dropIfExists('drcaptures');
    }
}
