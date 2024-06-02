@extends('layouts.my-dash')

@section('content')



<!-- Personal info -->



<!-- Mi-card -->

<div class="mi-card">
    
<div class="mi-card-header">
    <h3>Account Information</h3>
</div>
<hr>
<!-- Row -->
<div class="row">

<div class="col-md-1"></div>
<!-- Image profile -->
<div class="col-md-4">
    
    <img src="{{ asset('assets/img/Profile/'.Auth::user()->Profile) }}" class="profile_img" alt="Profile Photo" />

    <!-- Update profile photo -->
    <br>
    <form enctype="multipart/form-data" method="POST" action="/updateavatar">
          @csrf
          <br>
        <input type="file" id="avatar" class="form-control" name="avatar"  accept=".jpg,.jpeg,.png" required>
        <br>
    <button class="btn my-btn " type="submit">Update Photo</button>

    </form>
</div>


<script>
document.getElementById('avatar').addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (!file.type.match('image\/(jpeg|png)')) {
    alert('Only JPEG and PNG files are allowed!');
    event.target.value = ''; // Clear file selection
  }
});
</script>
<!-- End image profile -->





<!-- Account Form -->
<div class="col-md-5">

<form method="POST" action="/updateAccountInfo">
          @csrf
          <input class="my-input" type="text"  name="first_name" id="first_name" value="{{Auth::user()->name ?? 'Last Name'}}" placeholder="First Name"   required autofocus>
         
          <input class="my-input" type="text"  name="second__name" id="second__name"value="{{Auth::user()->Second_Name ?? ''}}" placeholder="{{Auth::user()->Second_Name ?? 'Last Name'}}"   required autocomplete="Client-name" autofocus/>
          <input class="my-input" type="email"  name="email" id="email" value="{{Auth::user()->email}}"  required autocomplete="Client-name" disabled/>
          <input class="my-input" type="text"  name="phone_number" id="phone_number" value="{{Auth::user()->Phone_Number ?? ''}}" placeholder="{{Auth::user()->Phone_Number ?? 'Phone Number +254*****'}}"  required autocomplete="Client-name" autofocus/>
          <button class="btn my-btn " type="submit">Update</button> 

</form>

</div>
<!-- End Account Form -->



</div>
<!-- End Row -->








    </div>
    <!-- End Mi card -->


<!-- End Personal info -->








<!-- Update Password -->



<!-- Mi-card -->

@if(Auth::user()->provider==NULL)
<!-- If Not used Provider -->
<div class="mi-card">
    
<div class="mi-card-header">
    <h3>Update Password</h3>
</div>
<!-- Body / form -->

<form method="POST" action="/newpassword">
          @csrf
        
          <input class="my-input" type="password"  name="current_password" id="current_password" placeholder="Current Password"   required autofocus/>
                                       @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                   	 @enderror
          <input class="my-input" type="password"  name="new_password" id="new-password" placeholder="New Password"   required  />
          
          <input class="my-input" type="password"  name="new_password_confirmation" id="confirm-password"  placeholder="Confirm Password"  required autofocus/>
          <button class="btn my-btn " type="submit">Update</button> 

</form>

<!-- End body or form -->

</div>
@else
<!-- If Used provider as google -->

@endif
<!-- End Card -->








<!-- Sessions -->
<!-- Mi-card -->

<div class="mi-card">
    
<div class="mi-card-header">
    <h3>Sessions</h3>
    <small>Manage and logout your active sessions on other browsers and devices. If necessary, you may logout of all other sessions. If your account has been compromised, you should update your password.</small>
                                    <hr>
</div>



<!-- Active Sessions -->

@foreach ($loggedin_instances as $active)
                                @if($active->device=="desktop") 
                                <i class="bi bi-laptop" aria-hidden="true"></i> 
                                 @else
                                  <i class="bi bi-phone" aria-hidden="true"></i> 
                                 @endif	
                                
                                 {{$active->os}}-{{$active->browser}}<br>
                                   	{{$active->ip_address}} -

                                   	@if(session()->getId()==$active->id)
                                   	<b>This device</b>
                                   	@else
                                   	 <b>Last Active </b>{{carbon\carbon::parse($active->last_activity)->diffForHumans()}}
                                   	 @endif
                                   	 <br><br>
                                   	@endforeach

<!-- End Active sessions -->


<!-- Delete sessions -->
@if(Auth::user()->provider==NULL)
<button class="btn my-btn " type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Clear other sessions</button> 

@else
<a href="/deleteSessions" class="btn my-btn " type="button"> Clear other sessions </a>

@endif
</div>






                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Other sessions</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Body -->
        <p>Are you sure you want to delete Other sessions except current</p>
                <form action="user-account/deletesessions" method="POST">
                    @csrf
                   
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    
               

        <!-- End body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn my-btn">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
