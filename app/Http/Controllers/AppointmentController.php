<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AppointmentController extends Controller
{
    private const SLOT_TIMES = [
        '08:00', '09:00', '10:00', '11:00', '12:00',
        '13:00', '14:00', '15:00', '16:00',
    ];

    public function index()
    {
        return view('appointments.index', [
            'slotTimes' => self::SLOT_TIMES,
            'bookingConfig' => [
                'availabilityUrl' => route('appointments.availability'),
                'storeUrl' => route('appointments.store'),
                'csrfToken' => csrf_token(),
                'initialDate' => old('appointment_date'),
                'initialTime' => old('appointment_time'),
            ],
        ]);
    }

    public function availability(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $now = Carbon::now('Asia/Manila');

        $validated = $request->validate([
            'date' => ['required', 'date_format:Y-m-d', 'after_or_equal:today'],
        ]);

        $reserved = Appointment::query()
            ->whereDate('appointment_date', $validated['date'])
            ->where('status', 'reserved')
            ->pluck('appointment_time')
            ->map(function ($time) {
                return substr($time, 0, 5);
            })
            ->values();

        return response()->json([
            'date' => $validated['date'],
            'slots' => collect(self::SLOT_TIMES)->map(function ($time) use ($reserved, $validated, $now) {
                $hasStarted = $validated['date'] === $now->toDateString() && $time <= $now->format('H:i');

                return [
                    'time' => $time,
                    'available' => !$hasStarted && !$reserved->contains($time),
                ];
            })->values(),
        ]);
    }

    public function store(Request $request)
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
            'appointment_time' => ['required', Rule::in(self::SLOT_TIMES)],
            'reason' => ['required', 'string', 'max:120'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $appointmentStartsAt = Carbon::createFromFormat(
            'Y-m-d H:i',
            $validated['appointment_date'] . ' ' . $validated['appointment_time'],
            'Asia/Manila'
        );

        if ($appointmentStartsAt->lte($now)) {
            throw ValidationException::withMessages([
                'appointment_time' => 'Please choose an appointment time that has not started yet.',
            ]);
        }

        $validated['status'] = 'reserved';

        try {
            $appointment = DB::transaction(function () use ($validated) {
                return Appointment::create($validated);
            });
        } catch (QueryException $exception) {
            if ((string) $exception->getCode() === '23000') {
                return $this->slotUnavailableResponse($request);
            }

            throw $exception;
        }

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Your appointment has been reserved.',
                'appointment' => [
                    'reference' => str_pad((string) $appointment->id, 6, '0', STR_PAD_LEFT),
                    'date' => $appointment->appointment_date->format('F j, Y'),
                    'time' => date('g:i A', strtotime($appointment->appointment_time)),
                    'patient_name' => $appointment->patient_name,
                ],
            ], 201);
        }

        return redirect()
            ->route('appointments.index')
            ->with('appointment_success', 'Your appointment has been reserved. Reference #' . str_pad((string) $appointment->id, 6, '0', STR_PAD_LEFT));
    }

    private function slotUnavailableResponse(Request $request)
    {
        $message = 'That appointment time was just reserved. Please choose another available slot.';

        if ($request->expectsJson()) {
            return response()->json([
                'message' => $message,
                'errors' => ['appointment_time' => [$message]],
            ], 422);
        }

        return back()->withErrors(['appointment_time' => $message])->withInput();
    }
}
