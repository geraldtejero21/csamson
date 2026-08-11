(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        var config = window.appointmentBookingConfig;
        if (!config) { return; }

        var form = document.getElementById('appointment-form');
        var dateInput = document.getElementById('appointment_date');
        var timeInput = document.getElementById('appointment_time');
        var dateCarousel = document.getElementById('date-carousel');
        var slotStatus = document.getElementById('slot-status');
        var summary = document.getElementById('appointment-summary');
        var submitButton = document.getElementById('reserve-button');
        var confirmation = document.getElementById('confirmation-card');
        var confirmationMessage = document.getElementById('confirmation-message');
        var confirmationDetails = document.getElementById('confirmation-details');
        var bookingHeading = document.querySelector('.booking-heading');
        var slotButtons = Array.prototype.slice.call(document.querySelectorAll('.time-slot'));
        var bookingSteps = Array.prototype.slice.call(document.querySelectorAll('[data-booking-step]'));
        var progressSteps = Array.prototype.slice.call(document.querySelectorAll('[data-progress-step]'));
        var backButton = document.getElementById('booking-back');
        var nextButton = document.getElementById('booking-next');
        var stepLabel = document.getElementById('booking-step-label');
        var summaryPanel = document.getElementById('booking-summary-panel');
        var privacyNote = document.getElementById('booking-privacy');
        var currentStep = Number(form.dataset.startStep);
        if (!currentStep) { currentStep = 1; }

        function showStep(step) {
            currentStep = Math.max(1, Math.min(3, step));

            bookingSteps.forEach(function (element) {
                element.hidden = Number(element.dataset.bookingStep) !== currentStep;
            });

            progressSteps.forEach(function (element) {
                var progressStep = Number(element.dataset.progressStep);
                element.classList.toggle('is-active', progressStep === currentStep);
                element.classList.toggle('is-complete', progressStep < currentStep);
                element.setAttribute('aria-current', progressStep === currentStep ? 'step' : 'false');
            });

            backButton.hidden = currentStep === 1;
            nextButton.hidden = currentStep === 3;
            summaryPanel.hidden = currentStep !== 3;
            privacyNote.hidden = currentStep !== 3;
            stepLabel.textContent = 'Step ' + currentStep + ' of 3';
        }

        function stepForField(field) {
            if (field === 'appointment_date') { return 1; }
            if (field === 'appointment_time') { return 2; }
            return 3;
        }

        function pad(value) {
            return String(value).padStart(2, '0');
        }

        function toLocalIso(date) {
            return date.getFullYear() + '-' + pad(date.getMonth() + 1) + '-' + pad(date.getDate());
        }

        function parseLocalDate(value) {
            var parts = value.split('-').map(Number);
            return new Date(parts[0], parts[1] - 1, parts[2]);
        }

        function friendlyDate(value) {
            return new Intl.DateTimeFormat('en-PH', { weekday: 'short', month: 'long', day: 'numeric', year: 'numeric' }).format(parseLocalDate(value));
        }

        function friendlyTime(value) {
            var parts = value.split(':');
            var hour = Number(parts[0]);
            var suffix = hour >= 12 ? 'PM' : 'AM';
            var displayHour = hour % 12;
            if (displayHour === 0) { displayHour = 12; }
            return displayHour + ':' + parts[1] + ' ' + suffix;
        }

        function endTime(value) {
            var parts = value.split(':');
            var hour = Number(parts[0]) + 1;
            return friendlyTime(pad(hour) + ':' + parts[1]);
        }

        function buildDateCarousel() {
            dateCarousel.textContent = '';
            var start = new Date();
            start.setHours(0, 0, 0, 0);

            for (var index = 0; index < 5; index += 1) {
                var date = new Date(start);
                date.setDate(start.getDate() + index);
                var value = toLocalIso(date);
                var button = document.createElement('button');
                var weekday = document.createElement('span');
                var day = document.createElement('strong');
                button.type = 'button';
                button.className = 'date-card';
                button.dataset.date = value;
                button.setAttribute('aria-label', friendlyDate(value));
                weekday.textContent = new Intl.DateTimeFormat('en-PH', { weekday: 'short' }).format(date);
                day.textContent = date.getDate();
                button.appendChild(weekday);
                button.appendChild(day);
                button.addEventListener('click', function () {
                    selectDate(this.dataset.date);
                });
                dateCarousel.appendChild(button);
            }
        }

        function syncDateCards() {
            Array.prototype.forEach.call(dateCarousel.querySelectorAll('.date-card'), function (card) {
                var isSelected = card.dataset.date === dateInput.value;
                card.classList.toggle('is-selected', isSelected);
                card.setAttribute('aria-pressed', isSelected ? 'true' : 'false');
            });
        }

        function setSlotsLoading() {
            slotStatus.textContent = 'Checking available times...';
            slotButtons.forEach(function (button) {
                button.disabled = true;
                button.classList.add('is-loading');
                button.classList.remove('is-selected', 'is-reserved');
                button.querySelector('small').textContent = 'Checking';
            });
        }

        function selectDate(value) {
            dateInput.value = value;
            timeInput.value = '';
            syncDateCards();
            updateSummary();
            loadAvailability(value);
        }

        function loadAvailability(value) {
            if (!value) { return; }
            setSlotsLoading();

            fetch(config.availabilityUrl + '?date=' + encodeURIComponent(value), {
                headers: { Accept: 'application/json' }
            })
                .then(function (response) {
                    if (!response.ok) { throw new Error('Availability could not be loaded.'); }
                    return response.json();
                })
                .then(function (data) {
                    var availableCount = 0;
                    data.slots.forEach(function (slot) {
                        var button = document.querySelector('.time-slot[data-time=' + CSS.escape(slot.time) + ']');
                        if (!button) { return; }
                        button.classList.remove('is-loading', 'is-selected', 'is-reserved');
                        button.disabled = !slot.available;
                        button.querySelector('small').textContent = slot.available ? 'Available' : 'Reserved';
                        if (!slot.available) { button.classList.add('is-reserved'); }
                        if (slot.available) { availableCount += 1; }
                    });
                    slotStatus.textContent = availableCount > 0 ? availableCount + ' times available on ' + friendlyDate(value) + '.' : 'No times remain on this date. Please choose another day.';

                    if (config.initialTime) {
                        var initial = document.querySelector('.time-slot[data-time=' + CSS.escape(config.initialTime) + ']');
                        if (initial) {
                            if (!initial.disabled) { chooseTime(initial); }
                        }
                        config.initialTime = '';
                    }
                })
                .catch(function () {
                    slotStatus.textContent = 'We could not check availability. Please try again.';
                    slotButtons.forEach(function (button) { button.classList.remove('is-loading'); });
                });
        }

        function chooseTime(button) {
            if (button.disabled) { return; }
            slotButtons.forEach(function (slot) { slot.classList.remove('is-selected'); });
            button.classList.add('is-selected');
            timeInput.value = button.dataset.time;
            clearFieldError('appointment_time');
            updateSummary();
        }

        function updateSummary() {
            if (!dateInput.value) {
                summary.textContent = 'Choose a date and time';
                return;
            }
            if (!timeInput.value) {
                summary.textContent = friendlyDate(dateInput.value) + ' - choose a time';
                return;
            }
            summary.textContent = friendlyDate(dateInput.value) + ' - ' + friendlyTime(timeInput.value) + ' to ' + endTime(timeInput.value);
        }

        function clearErrors() {
            Array.prototype.forEach.call(document.querySelectorAll('.field-error'), function (element) { element.textContent = ''; });
        }

        function clearFieldError(field) {
            var element = document.querySelector('[data-error-for=' + CSS.escape(field) + ']');
            if (element) { element.textContent = ''; }
        }

        function showErrors(errors) {
            var firstField = null;
            var firstFieldName = null;
            Object.keys(errors).forEach(function (field) {
                var element = document.querySelector('[data-error-for=' + CSS.escape(field) + ']');
                if (element) { element.textContent = errors[field][0]; }
                if (!firstField) {
                    firstField = form.elements[field];
                    firstFieldName = field;
                }
            });
            if (firstFieldName) { showStep(stepForField(firstFieldName)); }
            if (firstField && firstField.type !== 'hidden') {
                firstField.focus();
            } else if (firstFieldName) {
                var activeStep = document.querySelector('[data-booking-step=' + stepForField(firstFieldName) + ']');
                if (activeStep) { activeStep.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
            }
        }

        slotButtons.forEach(function (button) {
            button.addEventListener('click', function () { chooseTime(button); });
        });

        dateInput.addEventListener('change', function () { selectDate(dateInput.value); });

        nextButton.addEventListener('click', function () {
            clearErrors();

            if (currentStep === 1) {
                if (!dateInput.value) {
                    showErrors({ appointment_date: ['Please choose an appointment date.'] });
                    return;
                }
                showStep(2);
                return;
            }

            if (currentStep === 2) {
                if (!timeInput.value) {
                    showErrors({ appointment_time: ['Please choose an available appointment time.'] });
                    return;
                }
                showStep(3);
            }
        });

        backButton.addEventListener('click', function () {
            if (currentStep > 1) { showStep(currentStep - 1); }
        });

        form.addEventListener('submit', function (event) {
            event.preventDefault();
            clearErrors();

            if (!timeInput.value) {
                showStep(2);
                showErrors({ appointment_time: ['Please choose an available appointment time.'] });
                document.querySelector('.time-step').scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            if (!form.checkValidity()) {
                showStep(3);
                form.reportValidity();
                return;
            }

            submitButton.disabled = true;
            submitButton.querySelector('span').textContent = 'Reserving...';

            fetch(config.storeUrl, {
                method: 'POST',
                headers: { Accept: 'application/json', 'X-CSRF-TOKEN': config.csrfToken },
                body: new FormData(form)
            })
                .then(function (response) {
                    return response.json().then(function (data) { return { ok: response.ok, data: data }; });
                })
                .then(function (result) {
                    if (!result.ok) {
                        if (result.data.errors) { showErrors(result.data.errors); }
                        throw new Error(result.data.message ? result.data.message : 'Please check your information.');
                    }

                    var appointment = result.data.appointment;
                    form.hidden = true;
                    bookingHeading.hidden = true;
                    confirmation.hidden = false;
                    confirmationMessage.textContent = 'Thank you, ' + appointment.patient_name + '. Your reservation is confirmed.';
                    confirmationDetails.textContent = appointment.date + ' at ' + appointment.time + ' - Reference #' + appointment.reference;
                    confirmation.focus();
                })
                .catch(function (error) {
                    var generalError = document.querySelector('[data-error-for=appointment_time]');
                    if (generalError) {
                        if (!generalError.textContent) { generalError.textContent = error.message; }
                    }
                    if (dateInput.value) { loadAvailability(dateInput.value); }
                })
                .finally(function () {
                    submitButton.disabled = false;
                    submitButton.querySelector('span').textContent = 'Reserve appointment';
                });
        });

        document.getElementById('book-another').addEventListener('click', function () { window.location.reload(); });

        var today = new Date();
        today.setHours(0, 0, 0, 0);
        var todayValue = toLocalIso(today);
        dateInput.min = todayValue;
        var birthInput = form.elements.birth_date;
        if (birthInput) { birthInput.max = todayValue; }
        buildDateCarousel();
        selectDate(config.initialDate ? config.initialDate : todayValue);
        showStep(currentStep);
    });
})();
