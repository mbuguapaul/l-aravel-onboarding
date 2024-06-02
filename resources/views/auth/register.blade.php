@extends('layouts.app')

@section('content')

<style>
        .container {
            display: flex;
/*            height: 100vh;*/
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .image-section {
            display: none;
        }

        @media (min-width: 768px) {
            .image-section {
                display: block;
            }
        }

        .form-control {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
        }

        .btn {
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
        }

        .eye-icon {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .password-strength {
            display: none;
            font-size: 0.875em;
        }

        .password-strength.weak {
            color: red;
        }

        .password-strength.medium {
            color: orange;
        }

        .password-strength.strong {
            color: green;
        }
        .position-relative{
           position: relative; 
        }
        .my-flex{
            margin-top: 3%;
        }
    </style>

    <div class="container my-flex">
        <div class="row w-100">
            <div class="col-md-6 image-section text-center">
            
                <img src="{{ asset('assets/img/now.png') }}" alt="Illustration" class="img-fluid mb-3" style="width:80%;">
                <h5>Manage your clients Better. <br>Already have an account? <a href="{{ route('login') }}" class="link-secondary text-decoration-none">Login</a></h5>
            </div>
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
                <div class="col-md-4 register-text">
                <h2 class="mb-4">|  Register</h2>
                </div>

               </div>
                <!-- End small Row -->
               
                < x-social-login />
                
                <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf
                    <!-- <div class="mb-3"> -->
                        <!-- <label for="name" class="form-label">Name</label> -->
                        <!-- <x-input type="text" class="form-control" id="name" name="name" id="name" placeholder="Name"  required/> -->
                    <!-- </div> -->


                    <div class="mb-3">
                        <!-- <label for="email" class="form-label">Email</label> -->
                        <x-input type="email" class="form-control" id="email" name="email" id="email" placeholder="Email"    required autocomplete="Email" autofocus />
                    </div>
                    <div class="mb-3 position-relative">
                        <!-- <label for="password" class="form-label">Password</label> -->
                        <x-input type="password" class="form-control" id="password" class="my-input"  name="password" id="password-field" placeholder="Password"   required autocomplete="new-password" autofocus/>
                        <i class="bi bi-eye-slash eye-icon" id="togglePassword"></i>
                        <div id="passwordStrength" class="password-strength mt-1"></div>
                    </div>
                    <div class="mb-3">
                        <!-- <label for="confirmPassword" class="form-label">Confirm Password</label> -->
                        <input type="password" class="my-input" id="confirmPassword" name="password_confirmation" placeholder="Confirm Password" required>
                        <div id="passwordMatch" class="password-strength mt-1"></div>
                    </div>
                    <input type="submit" class="btn my-btn w-100" value="Create an account">
                </form>
                <div class="mt-4 text-center">
                    
                
                </div>
                <div class="mt-4 text-center">
                    <small>By signing up, you are creating a 70 Dots account, and you agree to 70Dots' <a href="">Terms of Use and Privacy Policy</a></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#togglePassword').on('click', function () {
                const passwordField = $('#password');
                const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                $(this).toggleClass('bi-eye-slash bi-eye');
            });

            $('#password').on('input', function () {
                const strengthText = $('#passwordStrength');
                const password = $(this).val();
                let strength = 'weak';

                if (password.length > 7 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password) && /[^A-Za-z0-9]/.test(password)) {
                    strength = 'strong';
                } else if (password.length > 5 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[0-9]/.test(password)) {
                    strength = 'medium';
                }

                strengthText.removeClass('weak medium strong').addClass(strength).text(`Password strength: ${strength}`).show();
            });

            $('#confirmPassword').on('input', function () {
                const matchText = $('#passwordMatch');
                const confirmPassword = $(this).val();
                const password = $('#password').val();

                if (confirmPassword === password) {
                    matchText.text('Passwords match').removeClass('weak').addClass('strong').show();
                } else {
                    matchText.text('Passwords do not match').removeClass('strong').addClass('weak').show();
                }
            });

           
        });
    </script>
@endsection
