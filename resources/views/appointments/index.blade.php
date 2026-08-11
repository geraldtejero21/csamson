<!DOCTYPE html>
<html lang='en' class='appointment-page'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <meta name='description' content='Reserve a one-hour dental appointment with Catalan-Samson Dental Clinic.'>
    <title>Book an Appointment - Catalan-Samson Dental Clinic</title>
    <link rel='shortcut icon' href='{{ asset('images/favicon/favicon-32x32.png') }}'>
    <link rel='stylesheet' href='{{ asset('css/pages/appointment-booking.css') }}'>
</head>
<body>
<div class='page-glow page-glow-one' aria-hidden='true'></div>
<div class='page-glow page-glow-two' aria-hidden='true'></div>
<header class='site-header'>
    <a class='brand' href='#top' aria-label='Catalan-Samson Dental Clinic home'>
        <span class='brand-mark' aria-hidden='true'><svg viewBox='0 0 48 52'><path d='M24 7C17 1 7 4 5 13c-2 8 3 13 5 22 2 9 4 13 8 12 4-1 2-13 6-13s2 12 6 13c4 1 6-3 8-12 2-9 7-14 5-22C41 4 31 1 24 7Z'/></svg></span>
        <span><strong>Catalan-Samson</strong><small>Dental Clinic</small></span>
    </a>
    <nav class='main-nav' aria-label='Main navigation'>
        <a href='#care'>Our care</a><a href='#clinic'>The clinic</a><a href='#faq'>FAQs</a>
    </nav>
    <div class='header-actions'>
        <a class='button button-small' href='#schedule'>Schedule now</a>
    </div>
</header>
<main id='top'>
    <section class='hero' aria-labelledby='hero-title'>
        <div class='hero-copy'>
            <div class='availability-ribbon'>
                <svg viewBox='0 0 24 24' aria-hidden='true'><path d='M7 2v3M17 2v3M3.5 9h17M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z'/></svg>
                Online appointments now available
            </div>
            <h1 id='hero-title'>Feel good about your next <span>dental visit.</span></h1>
            <p class='hero-lead'>Gentle care. Clear choices. Easy scheduling.</p>
            <a class='button hero-button' href='#schedule'>Reserve your visit <span aria-hidden='true'>&rarr;</span></a>
            <div class='trust-stats' aria-label='Clinic benefits'>
                <div class='trust-stat'>
                    <span class='stat-icon' aria-hidden='true'><svg viewBox='0 0 24 24'><path d='M12 21s-7-4.4-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 5.6-7 10-7 10Z'/></svg></span>
                    <p><strong>Comfort-first</strong><span>Personalized dental care</span></p>
                </div>
                <div class='trust-stat'>
                    <span class='stat-icon' aria-hidden='true'><svg viewBox='0 0 24 24'><circle cx='12' cy='12' r='9'/><path d='M12 7v5l3 2'/></svg></span>
                    <p><strong>1-hour</strong><span>Private appointment slots</span></p>
                </div>
            </div>
        </div>
        <div class='hero-visual' id='clinic'>
            <div class='hero-photo-wrap'><img src='{{ asset('images/appointments/hero-consultation.png') }}' alt='Dentist discussing dental care with a patient' width='1706' height='922'></div>
            <div class='photo-note'><span class='photo-note-icon' aria-hidden='true'>&#10003;</span><p><strong>Friendly, modern care</strong><span>We take time to listen.</span></p></div>
        </div>
    </section>
    <section class='booking-shell' id='schedule' aria-labelledby='booking-title'>
        <div class='booking-heading'>
            <span class='eyebrow'>Online reservation</span>
            <h2 id='booking-title'>Choose your visit</h2>
            <p>Select an available one-hour appointment between 8 AM and 5 PM, then tell us a little about the patient.</p>
        </div>
        @if(session('appointment_success'))
            <div class='server-alert server-alert-success' role='status'>{{ session('appointment_success') }}</div>
        @endif
        @if($errors->any())
            <div class='server-alert server-alert-error' role='alert'>
                <strong>Please check your information:</strong>
                <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        <form id='appointment-form' class='booking-form' action='{{ route('appointments.store') }}' method='POST' data-start-step='{{ $errors->any() ? 3 : 1 }}' novalidate>
            @csrf
            <div class='booking-progress' aria-label='Reservation progress'>
                <div class='progress-step is-active' data-progress-step='1'><span>1</span><div><strong>Date</strong><small>Choose your day</small></div></div>
                <i aria-hidden='true'></i>
                <div class='progress-step' data-progress-step='2'><span>2</span><div><strong>Time</strong><small>Select an hour</small></div></div>
                <i aria-hidden='true'></i>
                <div class='progress-step' data-progress-step='3'><span>3</span><div><strong>Details</strong><small>Patient information</small></div></div>
            </div>
            <div class='booking-grid'>
                <div class='booking-step date-step' data-booking-step='1'>
                    <div class='step-title'><span class='step-number'>1</span><div><span>Pick a day</span><small>Choose today or a future date</small></div></div>
                    <div class='date-carousel' id='date-carousel' aria-label='Quick date selection'></div>
                    <label class='field-label date-input-label' for='appointment_date'>Or choose another date</label>
                    <div class='input-with-icon'>
                        <svg viewBox='0 0 24 24' aria-hidden='true'><path d='M7 2v3M17 2v3M3.5 9h17M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z'/></svg>
                        <input type='date' id='appointment_date' name='appointment_date' value='{{ old('appointment_date') }}' required>
                    </div>
                    <p class='field-error' data-error-for='appointment_date'></p>
                </div>
                <div class='booking-step time-step' data-booking-step='2' hidden>
                    <div class='step-title'><span class='step-number'>2</span><div><span>Pick a time</span><small>Each visit is reserved for one hour</small></div></div>
                    <input type='hidden' id='appointment_time' name='appointment_time' value='{{ old('appointment_time') }}'>
                    <div class='slot-status' id='slot-status' aria-live='polite'>Select a date to view availability.</div>
                    <div class='time-slots' id='time-slots' aria-label='Appointment times'>
                        @foreach($slotTimes as $time)
                            <button class='time-slot' type='button' data-time='{{ $time }}' disabled><span>{{ date('g:i A', strtotime($time)) }}</span><small>Available</small></button>
                        @endforeach
                    </div>
                    <p class='field-error' data-error-for='appointment_time'></p>
                    <div class='slot-legend'><span><i class='legend-dot available'></i>Available</span><span><i class='legend-dot selected'></i>Selected</span><span><i class='legend-dot reserved'></i>Reserved</span></div>
                </div>
                <div class='booking-step details-step' data-booking-step='3' hidden>
                    <div class='step-title'><span class='step-number'>3</span><div><span>Your details</span><small>Fields marked * are required</small></div></div>
                    <div class='details-grid'>
                        <label class='form-field'><span>First name *</span><input type='text' name='first_name' value='{{ old('first_name') }}' autocomplete='given-name' maxlength='50' required placeholder='First name'><small class='field-error' data-error-for='first_name'></small></label>
                        <label class='form-field'><span>Last name *</span><input type='text' name='last_name' value='{{ old('last_name') }}' autocomplete='family-name' maxlength='50' required placeholder='Last name'><small class='field-error' data-error-for='last_name'></small></label>
                        <label class='form-field'><span>Mobile number *</span><input type='tel' name='phone' value='{{ old('phone') }}' autocomplete='tel' maxlength='30' required placeholder='09XX XXX XXXX'><small class='field-error' data-error-for='phone'></small></label>
                        <label class='form-field'><span>Email address *</span><input type='email' name='email' value='{{ old('email') }}' autocomplete='email' maxlength='255' required placeholder='you@example.com'><small class='field-error' data-error-for='email'></small></label>
                        <label class='form-field'><span>Birth date</span><input type='date' name='birth_date' value='{{ old('birth_date') }}' autocomplete='bday'><small class='field-error' data-error-for='birth_date'></small></label>
                        <label class='form-field'>
                            <span>Reason for visit *</span>
                            <select name='reason' required>
                                <option value=''>Select a reason</option>
                                @foreach(['Dental check-up', 'Cleaning / prophylaxis', 'Tooth pain', 'Filling / restoration', 'Extraction consultation', 'Orthodontic consultation', 'Cosmetic consultation', 'Other'] as $reason)
                                    <option value='{{ $reason }}' {{ old('reason') === $reason ? 'selected' : '' }}>{{ $reason }}</option>
                                @endforeach
                            </select>
                            <small class='field-error' data-error-for='reason'></small>
                        </label>
                        <label class='form-field form-field-wide'><span>Anything we should know?</span><textarea name='notes' maxlength='1000' rows='3' placeholder='Optional note for the clinic'>{{ old('notes') }}</textarea><small class='field-error' data-error-for='notes'></small></label>
                    </div>
                </div>
            </div>
            <div class='booking-pagination'>
                <button class='pagination-button pagination-back' id='booking-back' type='button' hidden><span aria-hidden='true'>&larr;</span> Back</button>
                <span id='booking-step-label'>Step 1 of 3</span>
                <button class='button pagination-next' id='booking-next' type='button'>Continue <span aria-hidden='true'>&rarr;</span></button>
            </div>
            <div class='booking-summary' id='booking-summary-panel' hidden>
                <div class='summary-copy'>
                    <span class='summary-icon' aria-hidden='true'><svg viewBox='0 0 24 24'><path d='M7 2v3M17 2v3M3.5 9h17M5 4h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z'/></svg></span>
                    <p><small>Your appointment</small><strong id='appointment-summary'>Choose a date and time</strong></p>
                </div>
                <button class='button reserve-button' id='reserve-button' type='submit'><span>Reserve appointment</span><span aria-hidden='true'>&rarr;</span></button>
            </div>
            <p class='privacy-note' id='booking-privacy' hidden>By reserving, you agree that the clinic may contact you about this appointment. Your information is used only for patient scheduling and care.</p>
        </form>
        <div class='confirmation-card' id='confirmation-card' hidden tabindex='-1'>
            <span class='confirmation-check' aria-hidden='true'>&#10003;</span>
            <p class='eyebrow'>Appointment reserved</p>
            <h2>We will see you soon.</h2>
            <p id='confirmation-message'></p>
            <div class='confirmation-details' id='confirmation-details'></div>
            <button class='button' type='button' id='book-another'>Book another appointment</button>
        </div>
    </section>
    <section class='care-section' id='care' aria-labelledby='care-title'>
        <div class='section-intro'><span class='eyebrow'>Care with clarity</span><h2 id='care-title'>A smoother visit, from booking to brighter smile.</h2></div>
        <div class='care-cards'>
            <article class='care-card'><span class='care-icon' aria-hidden='true'>01</span><h3>Choose your hour</h3><p>See live availability and reserve a dedicated one-hour slot that works for you.</p></article>
            <article class='care-card'><span class='care-icon' aria-hidden='true'>02</span><h3>Share the essentials</h3><p>Tell us the basics and what brings you in so the team can prepare for your visit.</p></article>
            <article class='care-card'><span class='care-icon' aria-hidden='true'>03</span><h3>Arrive with confidence</h3><p>Your reservation appears instantly in the clinic dashboard for a coordinated welcome.</p></article>
        </div>
    </section>
    <section class='faq-section' id='faq' aria-labelledby='faq-title'>
        <div><span class='eyebrow'>Good to know</span><h2 id='faq-title'>Before you book</h2></div>
        <div class='faq-list'>
            <details open><summary>How long is each appointment?</summary><p>Every online reservation is a one-hour slot. The clinic is available from 8:00 AM to 5:00 PM.</p></details>
            <details><summary>What if a time is marked reserved?</summary><p>That hour has already been booked. Choose any other time shown as available.</p></details>
            <details><summary>Is my reservation confirmed immediately?</summary><p>Yes. After a successful submission, your reservation is saved and shown to the clinic team in their dashboard.</p></details>
        </div>
    </section>
</main>
<footer class='site-footer'>
    <div class='footer-brand'>
        <span class='brand-mark' aria-hidden='true'><svg viewBox='0 0 48 52'><path d='M24 7C17 1 7 4 5 13c-2 8 3 13 5 22 2 9 4 13 8 12 4-1 2-13 6-13s2 12 6 13c4 1 6-3 8-12 2-9 7-14 5-22C41 4 31 1 24 7Z'/></svg></span>
        <p><strong>Catalan-Samson Dental Clinic</strong><span>Gentle care, thoughtfully scheduled.</span></p>
    </div>
    <p>&copy; {{ date('Y') }} Catalan-Samson Dental Clinic. All rights reserved.</p>
</footer>
<script>
    window.appointmentBookingConfig = @json($bookingConfig);
</script>
<script src='{{ asset('js/scripts/appointment-booking.js') }}' defer></script>
</body>
</html>
