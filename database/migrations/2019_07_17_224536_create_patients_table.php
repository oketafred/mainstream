<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_code');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('gender');
            $table->string('dob');
            $table->string('blood_group')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('marital_status');
            $table->string('avatar')->default('avatar.png');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('nationality');
            $table->string('village_zone');
            $table->string('parish');
            $table->string('subcounty');
            $table->string('district');
            
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
        Schema::dropIfExists('patients');
    }
}
