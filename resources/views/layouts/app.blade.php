<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Select Country -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link defer rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">


    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}"> -->



    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script> -->
 
  
    
    <title>70 Dots</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->
  
<script src="{{asset('assets/js/app.js')}}"></script>
<!-- <script src="{{asset('assets/js/perfect-scrollbar.min.js')}}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


<script>
document.addEventListener("DOMContentLoaded", function () {
    // Fetch JSON data
    fetch("/assets/js/countries.json")
        .then(response => response.json())
        .then(data => {
            // Populate dropdown with options
            const select = document.getElementById("countrySelect");

            // Add default option for Kenya and mark it as selected
            const defaultOption = document.createElement("option");
            defaultOption.text = "Kenya";
            defaultOption.value = "KE";
            defaultOption.selected = true;  // Set Kenya as selected
            select.appendChild(defaultOption);

            // Populate other countries
            data.forEach(country => {
                const option = document.createElement("option");
                option.text = country.name;
                option.value = country.code;
                select.appendChild(option);
            });
        })
        .catch(error => console.log(error));



        // Initialize intl-tel-input
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        initialCountry: "ke", // Initial country code for Kenya
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
    });

    // Pre-fill phone input with Kenya's country code
    phoneInput.setNumber("+254");

    // Update phone input based on selected country
    document.querySelector("#countrySelect").addEventListener("change", function () {
        const countryCode = this.value.toLowerCase();
        phoneInput.setCountry(countryCode);
    });
});

</script>



</body>
</html>
