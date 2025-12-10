<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
         @include('includes.in_favicon') 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/vendors/styles/core.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/vendors/styles/icon-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('portal/vendors/styles/style.css') }}">
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-119386393-1');
        </script>
        <!-- Scripts -->
    </head>
    <body class="header-white sidebar-white active sidebar-light">
            @include('layouts.loader')
            @include('layouts.topbar')
            @include('layouts.layoutsetting')
            @include('layouts.sidebar')
            <main>
                {{ $slot }}
            </main>
    <script src="{{ asset('portal/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/process.js') }}"></script>
    <!-- <script src="{{ asset('portal/vendors/scripts/layout-settings.js') }}"></script> -->
    <script src="{{ asset('portal/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('portal/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('portal/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('portal/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('portal/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('portal/vendors/scripts/dashboard3.js') }}"></script>
   <script>
     document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('newsletter_form');
        const responseMessage = document.getElementById('response-message');
        const emailInput = document.getElementById('email');

        form.addEventListener('submit', async function (e) {
            e.preventDefault();

            // Clear previous messages
            responseMessage.textContent = '';
            responseMessage.style.color = '';

            const email = emailInput.value;
            const csrfToken = document.querySelector('input[name="_token"]').value;

            try {
                const response = await fetch("{{ route('newsletter.subscribe') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ email: email })
                });

                const result = await response.json();

                if (response.ok) {
                    responseMessage.textContent = result.message || "Successfully subscribed!";
                    responseMessage.style.color = 'green';
                    emailInput.value = '';
                } else {
                    // Check for Laravel validation errors
                    if (result.errors && result.errors.email) {
                        responseMessage.textContent = result.errors.email[0];
                    } else if (result.message) {
                        responseMessage.textContent = result.message;
                    } else {
                        responseMessage.textContent = "Subscription failed.";
                    }
                    responseMessage.style.color = 'red';
                }

            } catch (error) {
                console.error("Error:", error);
                responseMessage.textContent = "An error occurred. Please try again.";
                responseMessage.style.color = 'red';
            }
        });
    });
</script>
<script type="application/ld+json">
    {
      "@context": "https://magazineclinic.com",
      "@type": "SoftwareApplication",
      "name": "Magazine Clinic ",
      "applicationCategory": "HealthApplication",
      "operatingSystem": "Web-Based",
      "description": "Hospital appointment management and patient scheduling software",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "CEDI"
      }
    }
    </script>
 </body>
</html>
