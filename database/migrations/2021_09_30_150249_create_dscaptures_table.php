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
            $table->string('patient_id')->nullable();
            $table->string('lga_tb_number')->nullable();
            $table->string('hospital_number')->nullable();
            $table->string('rnl_serial_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('age')->nullable();
            $table->string('hospital_admission')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('patient_address')->nullable();
            $table->string('patient_phone_number')->nullable();
            $table->string('patient_contact')->nullable();
            $table->string('patient_contact_number')->nullable();
            $table->string('history_previous_treatment')->nullable();
            $table->string('anatomical_site')->nullable();
            $table->string('extra_pulmonary_site')->nullable();
            $table->string('bacteriological_result')->nullable();
            $table->string('hiv_result')->nullable();
            $table->string('art_start_date')->nullable();
            $table->string('on_anti_treatment')->nullable();
            $table->string('tb_durationinweeks')->nullable();
            $table->string('genexpert_collected')->nullable();
            $table->string('genexpert_released')->nullable();
            $table->string('mtb_detected')->nullable();
            $table->string('afb_collected')->nullable();
            $table->string('afb_released')->nullable();
            $table->string('afb_smear_result')->nullable();
            $table->string('xray_released')->nullable();
            $table->string('xray_result')->nullable();
            
            $table->string('afb6date_collected')->nullable();
            $table->string('afb6date_released')->nullable();
            $table->string('afb6date_weight')->nullable();
            $table->string('afb6date_drug_intake')->nullable();
            $table->string('num_contacts_traced')->nullable();
            $table->string('num_children6less')->nullable();
            $table->string('num_contacts_screen')->nullable();
            $table->string('ptb_case_identified')->nullable();
            $table->string('num_ptb_identified')->nullable();
            $table->string('num_ptb_microscopy')->nullable();
            $table->string('num_ptb_genexpert')->nullable();
            $table->string('num_ptb_eligible_ipt')->nullable();
            $table->string('num_ptb_ipt_done')->nullable();
            $table->string('date_specimentrecievedlab')->nullable();
            $table->string('labdateresult_released')->nullable();
            $table->string('lab_reason')->nullable();
            $table->string('ftwo')->nullable();
            $table->string('ffive')->nullable();
            $table->string('fsix')->nullable();
            $table->string('date_specimentrecievedlabgx')->nullable();
            $table->string('labdateresult_releasedgx')->nullable();
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
