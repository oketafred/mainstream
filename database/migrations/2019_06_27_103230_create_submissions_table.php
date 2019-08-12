<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_name');
            $table->string('phy_or_surg');
            $table->string('age');
            $table->string('gender');
            $table->string('patient_number');
            $table->string('health_unit');
            $table->string('village_or_zone');
            $table->string('parish');
            $table->string('sub_county');
            $table->string('district');
            $table->text('nature_of_specimen');
            $table->string('user_id');
            $table->string('date_of_request');
            $table->string('date_of_reciept');
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
        Schema::dropIfExists('submissions');
    }
}
