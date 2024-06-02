@extends('layouts.app')

@section('content')


@if(Auth::user()->onboarding_completed==1)
<script>
    var redirectUrl = "{{ route('profile') }}";  // Replace with your actual route name
    window.location.href = redirectUrl;
</script>
@endif
<!-- Error Notice -->
<div class="container">
<div id="alert-placeholder"></div> <!-- Alert placeholder -->
</div>




<!-- Onboard -->

<div class="container" style="margin-top:20px;">
    <div class="row justify-content-center">
        <!-- Image -->
        <div class="col-md-6">

        <!-- Small row -->
        <div class="row">
                <!-- Logo -->
                <div class="col-md-3">
                <div class="mb-4 logo-mobile" style="">
                <x-logo />
                </div>
                </div>
                <!-- End logo -->
                <div class="col-md-6 register-text">
                <h2 class="mb-4">| Onboarding</h2>
                </div>

               </div>
                <!-- End small Row -->


        <img src="{{ asset('assets/img/onboard.png') }}" alt="Illustration" class="img-fluid mb-3" style="width:75%;">
        </div>
        <!-- End Image -->
        <div class="col-md-6">
            <div class="">
                

                <div class="">
                    <form id="onboardingForm">
                        @csrf
                        <div id="step1" class="form-step">
                            <h3>Let's start with the basics</h3>
                            <small>First we need to know a few things about you.</small><br><br>
                            

                            <!-- Names -->
                            
                            <div class="row">
                                <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name *</label>
                                <input type="text" class="form-control my-input" id="first_name" name="first_name" required>
                            </div>

                            </div>
                                <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name *</label>
                                <input type="text" class="form-control my-input" id="last_name" name="last_name" required>
                            </div>

                            </div>

                            </div>
                            <!-- end Names -->
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name *</label>
                                <input type="text" class="form-control my-input" id="company_name" name="company_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control my-input" id="website" name="website" >
                            </div>
                            <button type="button" class="btn my-btn next-step">Next</button>
                        </div>

                        <div id="step2" class="form-step d-none ">
                            <h3>Now some information about your company</h3>
                            <small>Don't have company address yet? Enter the address you want for your business</small>
                            <br>
                            <br>
                            <div class="mb-3">
                <label for="countrySelect" class="form-label">Select Country</label>
                <select class="form-select" id="countrySelect" name="country">
                    <!-- Options will be dynamically added here -->
                </select>
            </div>


                            <!-- City and Address -->
                            <div class="row">
                                
                               

                            <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city" class="form-label">City *</label>
                                <input type="text" class="form-control my-input" id="city" name="city" required>
                            </div>
                            </div>


                            <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address" class="form-label">Address *</label>
                                <input type="text" class="form-control my-input" id="address" name="address" required>
                            </div>
                            </div>
                            </div>
                             <!-- end City and Address -->
                            <div class="mb-3">
                                <label for="zipcode" class="form-label">Zipcode *</label>
                                <input type="text" class="form-control my-input" id="zipcode" name="zipcode" required>
                            </div>
                            <button type="button" class="btn my-ghost prev-step">Previous</button>
                            <button type="button" class="btn my-btn next-step">Next</button>
                        </div>

                        <div id="step3" class="form-step d-none">
                            <h3>Tell us more about your organization</h3>
                            <div class="mb-3">
                                <label for="job_title" class="form-label">Job Title *</label>
                                <input type="text" class="form-control my-input" id="job_title" name="job_title" required>
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
                            <button type="button" class="btn my-ghost prev-step">Previous</button>
                            <button type="button" class="btn my-btn next-step">Next</button>
                        </div>

                        <div id="step4" class="form-step d-none">
                            <h3>Contact Information</h3>
                            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" id="phone" class="form-control" name="phone" required>
            </div>
                            <button type="button" class="btn my-ghost prev-step">Previous</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
    $('.selectpicker').selectpicker();
});
</script>


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
                url: '{{ route("onboarding.submit") }}',
                data: $(this).serialize(),
                success: function (response) {
                    window.location.href = '{{ route("home") }}';
                },
                error: function (error) {
                    // Display errors
                    if (error.responseJSON && error.responseJSON.errors) {
                        const errors = error.responseJSON.errors;
                        let alertHtml = '<div class="alert my-alert alert-dismissible fade show" role="alert">';
                        alertHtml += '<ul>';
                        $.each(errors, function (field, messages) {
                            $.each(messages, function (index, message) {
                                alertHtml += '<li>' + message + '</li>';
                            });
                        });
                        alertHtml += '</ul>';
                        alertHtml += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        alertHtml += '</div>';
                        $('#alert-placeholder').html(alertHtml);
                    } else {
                        // Generic error message
                        const alertHtml = '<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                                          'An error occurred while submitting the form. Please try again.' +
                                          '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                          '</div>';
                        $('#alert-placeholder').html(alertHtml);
                    }
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