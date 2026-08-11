@extends('layouts.contentLayoutMaster')

@section('title','Edit Booking')

@section('vendor-style')
<style>
.booking-edit-page { max-width: 1050px; margin: 0 auto 50px; }
.booking-edit-top { margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; gap: 16px; }
.booking-edit-top h4 { margin: 0; color: #000000; font-weight: 700; }
.booking-edit-top p { margin: 4px 0 0; color: #000000; opacity: .65; }
.booking-edit-card { overflow: hidden; border-radius: 15px; }
.booking-edit-banner { padding: 20px 25px; color: #000000; background: #a28e85; }
.booking-edit-banner strong { display: block; font-size: 18px; }
.booking-edit-banner span { color: #000000; font-size: 12px; opacity: .68; }
.booking-edit-form { padding: 27px; }
.booking-edit-section { margin-bottom: 28px; }
.booking-edit-section h5 { margin: 0 0 17px; color: #000000; font-size: 17px; }
.booking-edit-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 17px; }
.booking-edit-field-wide { grid-column: 1 / -1; }
.booking-edit-field label { margin-bottom: 6px; display: block; color: #000000; font-size: 12px; font-weight: 700; }
.booking-edit-field input, .booking-edit-field select, .booking-edit-field textarea { width: 100%; height: auto; margin: 0; padding: 11px 12px; border: 1px solid #a28e85 !important; border-radius: 8px !important; box-sizing: border-box !important; color: #000000 !important; background: #ffffff !important; box-shadow: none !important; }
.booking-edit-field select { display: block; height: 45px; }
.booking-edit-field textarea { min-height: 90px; resize: vertical; }
.booking-edit-field input:focus, .booking-edit-field select:focus, .booking-edit-field textarea:focus { border-color: #000000 !important; box-shadow: 0 0 0 3px rgba(162,142,133,.26) !important; outline: 0; }
.booking-edit-error { margin: 5px 0 0; color: #000000; font-size: 11px; font-weight: 700; }
.booking-time-slots { display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 10px; }
.booking-time-slot { min-height: 50px; border: 1px solid #a28e85; border-radius: 9px; color: #000000; background: #ffffff; font-weight: 700; cursor: pointer; }
.booking-time-slot:hover { border-color: #000000; background: #eee9e3; }
.booking-time-slot.is-selected { color: #000000; border-color: #000000; background: #a28e85; }
.booking-time-slot.is-reserved { color: #000000; border-color: #a28e85; background: #eee9e3; cursor: not-allowed; text-decoration: line-through; opacity: .55; }
.booking-slot-status { min-height: 20px; margin: 8px 0 12px; color: #000000; font-size: 11px; opacity: .68; }
.booking-edit-actions { padding-top: 21px; display: flex; justify-content: flex-end; gap: 12px; border-top: 1px solid #a28e85; }
.booking-edit-actions .btn { color: #000000 !important; background: #a28e85 !important; }
.booking-edit-alert { margin-bottom: 20px; padding: 15px 18px; border: 1px solid #000000; border-radius: 9px; color: #000000; background: #eee9e3; }
.booking-edit-alert ul { margin: 6px 0 0; padding-left: 20px; }
.booking-patient-linked { padding: 12px 15px; border: 1px solid #a28e85; border-radius: 9px; color: #000000; background: #eee9e3; }
@media(max-width: 700px) {
   .booking-edit-top { align-items: flex-start; flex-direction: column; }
   .booking-edit-grid { grid-template-columns: 1fr; }
   .booking-edit-field-wide { grid-column: auto; }
   .booking-time-slots { grid-template-columns: repeat(3, 1fr); }
   .booking-edit-form { padding: 20px 16px; }
}
</style>
@endsection

@section('content')
@php($selectedTime = old('appointment_time', substr($appointment->appointment_time, 0, 5)))
<div class='booking-edit-page'>
   <div class='booking-edit-top'>
      <div><h4>Edit booking #{{ str_pad($appointment->id, 6, '0', STR_PAD_LEFT) }}</h4><p>Update the schedule or correct the patient information.</p></div>
      <a class='btn-flat waves-effect' href='/'>Back to dashboard</a>
   </div>

   @if($errors->any())
      <div class='booking-edit-alert' role='alert'><strong>Please correct the following:</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
   @endif

   <div class='card booking-edit-card'>
      <div class='booking-edit-banner'><strong>Reserved appointment</strong><span>Created {{ $appointment->created_at->format('F j, Y \a\t g:i A') }}</span></div>
      <form class='booking-edit-form' id='booking-edit-form' method='POST' action='{{ route('dashboard.appointments.update', $appointment) }}' data-availability-url='{{ route('dashboard.appointments.availability', $appointment) }}' data-selected-time='{{ $selectedTime }}'>
         @csrf
         @method('PUT')

         <section class='booking-edit-section'>
            <h5>Schedule</h5>
            <div class='booking-edit-grid'>
               <div class='booking-edit-field'>
                  <label for='edit-appointment-date'>Appointment date</label>
                  <input id='edit-appointment-date' type='date' name='appointment_date' min='{{ date('Y-m-d') }}' value='{{ old('appointment_date', $appointment->appointment_date->format('Y-m-d')) }}' required>
                  @error('appointment_date')<p class='booking-edit-error'>{{ $message }}</p>@enderror
               </div>
               <div class='booking-edit-field'>
                  <label>Selected one-hour slot</label>
                  <input id='edit-time-display' type='text' value='Choose a time below' readonly>
               </div>
            </div>
            <input id='edit-appointment-time' type='hidden' name='appointment_time' value='{{ $selectedTime }}'>
            <div class='booking-slot-status' id='edit-slot-status' aria-live='polite'>Checking availability...</div>
            <div class='booking-time-slots'>
               @foreach($slotTimes as $time)
                  <button class='booking-time-slot' type='button' data-time='{{ $time }}'>{{ date('g:i A', strtotime($time)) }}</button>
               @endforeach
            </div>
            @error('appointment_time')<p class='booking-edit-error'>{{ $message }}</p>@enderror
         </section>

         <section class='booking-edit-section'>
            <h5>Patient information</h5>
            <div class='booking-edit-grid'>
               <div class='booking-edit-field'><label>First name</label><input type='text' name='first_name' maxlength='50' value='{{ old('first_name', $appointment->first_name) }}' required>@error('first_name')<p class='booking-edit-error'>{{ $message }}</p>@enderror</div>
               <div class='booking-edit-field'><label>Last name</label><input type='text' name='last_name' maxlength='50' value='{{ old('last_name', $appointment->last_name) }}' required>@error('last_name')<p class='booking-edit-error'>{{ $message }}</p>@enderror</div>
               <div class='booking-edit-field'><label>Mobile number</label><input type='tel' name='phone' maxlength='30' value='{{ old('phone', $appointment->phone) }}' required>@error('phone')<p class='booking-edit-error'>{{ $message }}</p>@enderror</div>
               <div class='booking-edit-field'><label>Email address</label><input type='email' name='email' value='{{ old('email', $appointment->email) }}' required>@error('email')<p class='booking-edit-error'>{{ $message }}</p>@enderror</div>
               <div class='booking-edit-field'><label>Birth date</label><input type='date' name='birth_date' max='{{ date('Y-m-d') }}' value='{{ old('birth_date', $appointment->birth_date ? $appointment->birth_date->format('Y-m-d') : '') }}'>@error('birth_date')<p class='booking-edit-error'>{{ $message }}</p>@enderror</div>
               <div class='booking-edit-field'>
                  <label>Reason for visit</label>
                  <select name='reason' required>
                     @foreach(['Dental check-up', 'Cleaning / prophylaxis', 'Tooth pain', 'Filling / restoration', 'Extraction consultation', 'Orthodontic consultation', 'Cosmetic consultation', 'Other'] as $reason)
                        <option value='{{ $reason }}' {{ old('reason', $appointment->reason) === $reason ? 'selected' : '' }}>{{ $reason }}</option>
                     @endforeach
                  </select>
                  @error('reason')<p class='booking-edit-error'>{{ $message }}</p>@enderror
               </div>
               <div class='booking-edit-field booking-edit-field-wide'><label>Notes</label><textarea name='notes' maxlength='1000'>{{ old('notes', $appointment->notes) }}</textarea>@error('notes')<p class='booking-edit-error'>{{ $message }}</p>@enderror</div>
            </div>
         </section>

         @if($appointment->patient_id)
            <div class='booking-patient-linked'>This booking is linked to patient record #{{ $appointment->patient_id }}. <a href='/patient/{{ $appointment->patient_id }}'><u>View patient</u></a></div>
         @endif

         <div class='booking-edit-actions'><a class='btn-flat waves-effect' href='/'>Cancel</a><button class='btn waves-effect waves-light gradient-45deg-purple-deep-orange' type='submit'>Save booking</button></div>
      </form>
   </div>
</div>
@endsection

@section('page-script')
<script>
(function () {
   var form = document.getElementById('booking-edit-form');
   var dateInput = document.getElementById('edit-appointment-date');
   var timeInput = document.getElementById('edit-appointment-time');
   var display = document.getElementById('edit-time-display');
   var status = document.getElementById('edit-slot-status');
   var buttons = Array.prototype.slice.call(document.querySelectorAll('.booking-time-slot'));
   var preferredTime = form.dataset.selectedTime;

   function labelTime(value) {
      var parts = value.split(':');
      var hour = Number(parts[0]);
      var suffix = hour >= 12 ? 'PM' : 'AM';
      var displayHour = hour % 12;
      if (displayHour === 0) { displayHour = 12; }
      return displayHour + ':' + parts[1] + ' ' + suffix;
   }

   function selectTime(button) {
      if (button.disabled) { return; }
      buttons.forEach(function (item) { item.classList.remove('is-selected'); });
      button.classList.add('is-selected');
      timeInput.value = button.dataset.time;
      display.value = labelTime(button.dataset.time) + ' - ' + labelTime(String(Number(button.dataset.time.slice(0, 2)) + 1).padStart(2, '0') + ':00');
   }

   function loadAvailability() {
      status.textContent = 'Checking availability...';
      buttons.forEach(function (button) { button.disabled = true; button.classList.remove('is-selected', 'is-reserved'); });
      fetch(form.dataset.availabilityUrl + '?date=' + encodeURIComponent(dateInput.value), { headers: { Accept: 'application/json' } })
         .then(function (response) { return response.json(); })
         .then(function (data) {
            var available = 0;
            data.slots.forEach(function (slot) {
               var button = buttons.find(function (item) { return item.dataset.time === slot.time; });
               if (!button) { return; }
               button.disabled = !slot.available;
               button.classList.toggle('is-reserved', !slot.available);
               if (slot.available) { available += 1; }
            });
            status.textContent = available + ' appointment times available.';
            var selected = buttons.find(function (item) { return item.dataset.time === preferredTime; });
            if (selected) {
               if (!selected.disabled) { selectTime(selected); }
            }
            preferredTime = '';
         })
         .catch(function () { status.textContent = 'Availability could not be loaded. Please refresh and try again.'; });
   }

   buttons.forEach(function (button) { button.addEventListener('click', function () { selectTime(button); }); });
   dateInput.addEventListener('change', function () { timeInput.value = ''; display.value = 'Choose a time below'; loadAvailability(); });
   loadAvailability();
})();
</script>
@endsection
