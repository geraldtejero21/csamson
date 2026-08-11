<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AdminAppointmentController extends Controller
{
    private const SLOT_TIMES = [
        '08:00', '09:00', '10:00', '11:00', '12:00',
        '13:00', '14:00', '15:00', '16:00',
    ];

    public function edit(Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');

        return view('appointments.edit', [
            'appointment' => $appointment,
            'slotTimes' => self::SLOT_TIMES,
        ]);
    }

    public function availability(Request $request, Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');
        $now = Carbon::now('Asia/Manila');
        $validated = $request->validate([
            'date' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
        ]);

        $reserved = Appointment::query()
            ->whereDate('appointment_date', $validated['date'])
            ->where('status', 'reserved')
            ->where('id', '!=', $appointment->id)
            ->pluck('appointment_time')
            ->map(function ($time) {
                return substr($time, 0, 5);
            });

        return response()->json([
            'slots' => collect(self::SLOT_TIMES)->map(function ($time) use ($reserved, $validated, $now) {
                $hasStarted = $validated['date'] === $now->toDateString() && $time <= $now->format('H:i');

                return [
                    'time' => $time,
                    'available' => !$hasStarted && !$reserved->contains($time),
                ];
            })->values(),
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');
        $now = Carbon::now('Asia/Manila');

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'birth_date' => ['nullable', 'date', 'before_or_equal:today'],
            'appointment_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
            'appointment_time' => [
                'required',
                Rule::in(self::SLOT_TIMES),
                Rule::unique('appointments', 'appointment_time')
                    ->where(function ($query) use ($request) {
                        return $query->where('appointment_date', $request->input('appointment_date'));
                    })
                    ->ignore($appointment->id),
            ],
            'reason' => ['required', 'string', 'max:120'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ], [
            'appointment_time.unique' => 'That time is already reserved. Please choose another slot.',
        ]);

        $startsAt = Carbon::createFromFormat(
            'Y-m-d H:i',
            $validated['appointment_date'] . ' ' . $validated['appointment_time'],
            'Asia/Manila'
        );

        if ($startsAt->lte($now)) {
            throw ValidationException::withMessages([
                'appointment_time' => 'Please choose an appointment time that has not started yet.',
            ]);
        }

        try {
            $appointment->update($validated);
        } catch (QueryException $exception) {
            if ((string) $exception->getCode() === '23000') {
                throw ValidationException::withMessages([
                    'appointment_time' => 'That time was just reserved. Please choose another slot.',
                ]);
            }

            throw $exception;
        }

        return redirect('/')->with('booking_success', 'Booking updated successfully.');
    }

    public function createPatient(Appointment $appointment)
    {
        date_default_timezone_set('Asia/Manila');

        $patientId = DB::transaction(function () use ($appointment) {
            $lockedAppointment = Appointment::query()->lockForUpdate()->findOrFail($appointment->id);

            if ($lockedAppointment->patient_id) {
                return $lockedAppointment->patient_id;
            }

            $birthDate = null;
            $age = 0;
            if ($lockedAppointment->birth_date) {
                $birthDate = $lockedAppointment->birth_date->format('m/d/Y');
                $age = $lockedAppointment->birth_date->age;
            }

            $patientData = [
                'firstName' => $lockedAppointment->first_name,
                'lastName' => $lockedAppointment->last_name,
                'birthDate' => $birthDate,
                'age' => $age,
                'mobile' => $lockedAppointment->phone,
                'email' => $lockedAppointment->email,
                'appointment_reason' => $lockedAppointment->reason,
                'appointment_notes' => $lockedAppointment->notes,
                'source' => 'Online appointment #' . $lockedAppointment->id,
            ];

            $patientId = DB::table('patients')->insertGetId([
                'firstName' => $lockedAppointment->first_name,
                'lastName' => $lockedAppointment->last_name,
                'birthDate' => $birthDate,
                'age' => $age,
                'mobile' => $lockedAppointment->phone,
                'patientData' => serialize($patientData),
                'record_status' => 1,
                'updated_at' => now(),
                'created_at' => now(),
            ]);

            $lockedAppointment->update([
                'patient_id' => $patientId,
                'converted_at' => now(),
            ]);

            return $patientId;
        });

        return redirect('/')->with([
            'booking_success' => 'Patient record saved successfully.',
            'created_patient_id' => $patientId,
        ]);
    }
}
