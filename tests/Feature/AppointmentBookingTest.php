<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class AppointmentBookingTest extends TestCase
{
    use DatabaseTransactions;

    public function test_public_booking_page_is_accessible()
    {
        $this->get(route('appointments.index'))
            ->assertOk()
            ->assertSee('Feel good about your next')
            ->assertSee('Reserve appointment');
    }

    public function test_a_slot_can_only_be_reserved_once()
    {
        $payload = [
            'first_name' => 'Test',
            'last_name' => 'Patient',
            'email' => 'appointment-test@example.com',
            'phone' => '09171234567',
            'appointment_date' => '2099-12-01',
            'appointment_time' => '08:00',
            'reason' => 'Dental check-up',
        ];

        $this->postJson(route('appointments.store'), $payload)
            ->assertCreated()
            ->assertJsonPath('appointment.patient_name', 'Test Patient');

        $this->postJson(route('appointments.store'), $payload)
            ->assertStatus(422)
            ->assertJsonValidationErrors('appointment_time');

        $this->assertSame(1, DB::table('appointments')
            ->where('appointment_date', '2099-12-01')
            ->where('appointment_time', '08:00:00')
            ->count());
    }

    public function test_availability_returns_all_nine_one_hour_slots()
    {
        $this->getJson(route('appointments.availability', ['date' => '2099-12-02']))
            ->assertOk()
            ->assertJsonCount(9, 'slots')
            ->assertJsonPath('slots.0.time', '08:00')
            ->assertJsonPath('slots.8.time', '16:00');
    }

    public function test_authenticated_staff_can_edit_booking_schedule_and_patient_info()
    {
        $this->actingAs($this->staffUser());
        $appointment = $this->makeAppointment('2099-12-05', '08:00');

        $this->put(route('dashboard.appointments.update', $appointment), [
            'first_name' => 'Updated',
            'last_name' => 'Patient',
            'email' => 'updated@example.com',
            'phone' => '09991234567',
            'appointment_date' => '2099-12-06',
            'appointment_time' => '14:00',
            'reason' => 'Tooth pain',
            'notes' => 'Updated by clinic staff.',
        ])->assertRedirect('/');

        $this->assertDatabaseHas('appointments', [
            'id' => $appointment->id,
            'first_name' => 'Updated',
            'appointment_date' => '2099-12-06',
            'appointment_time' => '14:00:00',
        ]);
    }

    public function test_authenticated_staff_can_open_booking_editor()
    {
        $this->actingAs($this->staffUser());
        $appointment = $this->makeAppointment('2099-12-09', '13:00');

        $this->get(route('dashboard.appointments.edit', $appointment))
            ->assertOk()
            ->assertSee('Edit booking')
            ->assertSee('Save booking');
    }

    public function test_staff_cannot_move_booking_into_another_reserved_slot()
    {
        $this->actingAs($this->staffUser());
        $reserved = $this->makeAppointment('2099-12-07', '09:00');
        $appointment = $this->makeAppointment('2099-12-07', '10:00');

        $this->putJson(route('dashboard.appointments.update', $appointment), [
            'first_name' => $appointment->first_name,
            'last_name' => $appointment->last_name,
            'email' => $appointment->email,
            'phone' => $appointment->phone,
            'appointment_date' => '2099-12-07',
            'appointment_time' => substr($reserved->appointment_time, 0, 5),
            'reason' => $appointment->reason,
        ])->assertStatus(422)->assertJsonValidationErrors('appointment_time');
    }

    public function test_booking_can_create_only_one_linked_patient_record()
    {
        $this->actingAs($this->staffUser());
        $appointment = $this->makeAppointment('2099-12-08', '11:00');
        $before = DB::table('patients')->count();

        $this->post(route('dashboard.appointments.create-patient', $appointment))
            ->assertRedirect('/');

        $appointment->refresh();
        $this->assertNotNull($appointment->patient_id);
        $this->assertDatabaseHas('patients', [
            'id' => $appointment->patient_id,
            'firstName' => 'Test',
            'lastName' => 'Patient',
            'mobile' => '09171234567',
        ]);

        $this->post(route('dashboard.appointments.create-patient', $appointment))
            ->assertRedirect('/');
        $this->assertSame($before + 1, DB::table('patients')->count());
    }

    private function makeAppointment($date, $time)
    {
        return Appointment::create([
            'first_name' => 'Test',
            'last_name' => 'Patient',
            'email' => 'staff-booking@example.com',
            'phone' => '09171234567',
            'birth_date' => '1990-05-10',
            'appointment_date' => $date,
            'appointment_time' => $time,
            'reason' => 'Dental check-up',
            'status' => 'reserved',
        ]);
    }

    private function staffUser()
    {
        $user = new User();
        $user->id = 999999;
        $user->name = 'Test Staff';

        return $user;
    }
}
