<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPatientLinkToAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedInteger('patient_id')->nullable()->after('id');
            $table->timestamp('converted_at')->nullable()->after('status');
            $table->index('patient_id', 'appointments_patient_id_index');
        });
    }

    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropIndex('appointments_patient_id_index');
            $table->dropColumn(['patient_id', 'converted_at']);
        });
    }
}
