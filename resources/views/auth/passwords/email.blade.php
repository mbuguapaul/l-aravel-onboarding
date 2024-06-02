@extends('layouts.app')

@section('content')
<x-my-card>
@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<form method="POST" action="{{ route('password.email') }}">
          @csrf

   
            <div class="row gy-3 gy-md-4 overflow-hidden">
              <div class="col-12">
                <!-- <label for="email" class="form-label">Email <span class="text-danger">*</span></label> -->
                <x-input type="email"  name="email" id="email" placeholder="Email" value="{{ old('email') }}"   required autocomplete="email" autofocus/>  
              </div>

            
              <div class="col-12">
                <div class="d-grid">
                  <button class="btn my-btn btn-lg" type="submit">Send Password Reset Link</button>
                </div>
              </div>
            </div>
          </form>


          <div class="row">
            <div class="col-12">
            <br>
              <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center">
                <a href="{{ route('register') }}" class="link-secondary text-decoration-none">Create new account</a>
                <a href="{{ route('login') }}" class="link-secondary text-decoration-none">Log in</a>
              </div>
            </div>
          </div>
</x-my-card>


@endsection
