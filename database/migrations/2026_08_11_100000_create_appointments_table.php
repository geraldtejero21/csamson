<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email');
            $table->string('phone', 30);
            $table->date('birth_date')->nullable();
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->string('reason', 120);
            $table->text('notes')->nullable();
            $table->string('status', 30)->default('reserved');
            $table->timestamps();

            $table->unique(['appointment_date', 'appointment_time'], 'appointments_date_time_unique');
            $table->index(['status', 'appointment_date'], 'appointments_status_date_index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
