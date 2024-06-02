@extends('layouts.my-dash')

@section('content')




<div class="container">

<!-- Mi-card -->

<div class="mi-card">
    
<div class="mi-card-header">
    <h3>New Client</h3>
</div>

<form method="POST" action="/newClient">
          @csrf
    <div class="row">

             <div class="col-3">
                <!-- <label for="password" class="form-label">Password <span class="text-danger">*</span></label> -->
                <x-input type="text"  name="Client_name" id="Client-name" placeholder="Client name"   required autocomplete="Client-name" autofocus/>
            
              </div>
              <div class="col-3">
                <!-- <label for="password" class="form-label">Password <span class="text-danger">*</span></label> -->
                <x-input type="Number"  name="Client_phone_number" id="lient-phone-number" placeholder="Phone Number"   required autocomplete="Client-phone-number" autofocus/>
            
              </div>
              <div class="col-3">
                <!-- <label for="password" class="form-label">Password <span class="text-danger">*</span></label> -->
                <x-input type="email"  name="Client_email" id="Client-email" placeholder="Client Email"   required autocomplete="Client-Email" autofocus/>
            
              </div>
              <div class="col-3">
                <!-- <label for="password" class="form-label">Password <span class="text-danger">*</span></label> -->
                <x-input type="text"  name="Client_Address" id="Client-address" placeholder="Client address"   required autocomplete="Client-address" autofocus/>
            
              </div>
    </div>
    <button class="btn my-btn " type="submit">Add Client</button>


</form>

    </div>
    <!-- End Mi card -->









    <!-- Lists -->

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    <?php $i = 1;?>
    @while ($i < count($clients))
    @foreach($clients as $client)
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$client->Client_name}}</td>
      <td>{{$client->Client_email}}</td>
      <td>{{$client->Client_phone}}</td>
      <td><i class="bi bi-pencil-square"></i></td>

    </tr>
    <?php $i++;?>
    @endforeach
    @endwhile
   
      
  </tbody>
</table>
</div>
@endsection
