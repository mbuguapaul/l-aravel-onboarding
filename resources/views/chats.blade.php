@extends('layouts.my-dash')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Onboarding') }}</div>

                <div class="card-body">
                    <form id="onboardingForm">
                        @csrf
                        <div id="step1" class="form-step">
                            <h3>Personal Information</h3>
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control" id="website" name="website">
                            </div>
                            <button type="button" class="btn btn-primary next-step">Next</button>
                        </div>

                        <div id="step2" class="form-step d-none">
                            <h3>Address Information</h3>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country *</label>
                                <select class="form-select" id="country" name="country" required>
                                    <option value="" selected>Select your country</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="IN">India</option>
                                    <!-- Add more countries as needed -->
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address *</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="mb-3">
                                <label for="zipcode" class="form-label">Zipcode *</label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                            </div>
                            <button type="button" class="btn btn-secondary prev-step">Previous</button>
                            <button type="button" class="btn btn-primary next-step">Next</button>
                        </div>

                        <div id="step3" class="form-step d-none">
                            <h3>Professional Information</h3>
                            <div class="mb-3">
                                <label for="job_title" class="form-label">Job Title *</label>
                                <input type="text" class="form-control" id="job_title" name="job_title" required>
                            </div>
                            <div class="mb-3">
                                <label for="team_size" class="form-label">Team Size *</label>
                                <select class="form-select" id="team_size" name="team_size" required>
                                    <option value="" selected>Select team size</option>
                                    <option value="1-10">1-10</option>
                                    <option value="11-30">11-30</option>
                                    <option value="31-50">31-50</option>
                                    <option value="51+">51+</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="industry" class="form-label">Industry *</label>
                                <select class="form-select" id="industry" name="industry" required>
                                    <option value="" selected>Select industry</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type="text" class="form-control mt-2 d-none" id="industry_other" name="industry_other" placeholder="Please specify if other">
                            </div>
                            <button type="button" class="btn btn-secondary prev-step">Previous</button>
                            <button type="button" class="btn btn-primary next-step">Next</button>
                        </div>

                        <div id="step4" class="form-step d-none">
                            <h3>Contact Information</h3>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number *</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="phone_country_code">+1</span>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                                </div>
                            </div>
                            <button type="button" class="btn btn-secondary prev-step">Previous</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {
        $('.next-step').click(function () {
            let currentStep = $(this).closest('.form-step');
            if (!validateStep(currentStep)) return;
            let nextStep = currentStep.next('.form-step');
            currentStep.addClass('d-none');
            nextStep.removeClass('d-none');
        });

        $('.prev-step').click(function () {
            let currentStep = $(this).closest('.form-step');
            let prevStep = currentStep.prev('.form-step');
            currentStep.addClass('d-none');
            prevStep.removeClass('d-none');
        });

        $('#industry').change(function() {
            if ($(this).val() === 'Other') {
                $('#industry_other').removeClass('d-none').attr('required', true);
            } else {
                $('#industry_other').addClass('d-none').attr('required', false);
            }
        });

        $('#onboardingForm').submit(function (e) {
            e.preventDefault();

            if (!validateStep($('#step4'))) return;

            $.ajax({
                type: 'POST',
               
                data: $(this).serialize(),
                success: function (response) {
                    
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

        function validateStep(step) {
            let isValid = true;
            step.find('input[required], select[required]').each(function () {
                if (!$(this).val()) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
            return isValid;
        }
    });
</script>

@endsection
