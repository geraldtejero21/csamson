<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientDentalChartTable extends Migration
{
    public function up()
    {
        Schema::create('patient_dental_chart', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id')->unique();
            $table->longText('chart_data');
            $table->timestamps();

            $table->index('updated_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('patient_dental_chart');
    }
}
