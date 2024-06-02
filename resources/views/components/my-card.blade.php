<div>
@extends('layouts.app')

@section('content')



<div class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-11 col-lg-8 col-xl-5 col-xxl-5">
        <div class="bg-white  rounded shadow-sm my-card">
          <div class="row">
          <center>

          @if (session('message'))

        <div class="alert alert-info">
          
          </button>
          <center>{{ session('message') }}</center>

  </div>
@endif
<!-- End check message -->
            <div class="col-4  justify-content-center">
              <div class=" mb-3">

              <!-- Check Message -->



                <x-logo />
              </div>
            </div>
            </center>
          </div>

          {{ $slot }}
          
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

</div>