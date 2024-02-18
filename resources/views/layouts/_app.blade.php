<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="icon" type="image/png" href="{{ secure_asset('asset/logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title> @stack('tap_title') {{ config('app.name', 'Marannu Mobil') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    @laravelPWA
    @include('layouts.user.css')
    @stack('page_style')

</head>

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    @include('sweetalert::alert')
    <div class="body-inner">
        @include('layouts.user.header')

        @yield('content')

        @include('layouts.user.footer')

    </div>
    @include('layouts.firebase_script')
    @stack('page_script')

    @include('layouts.user.js')

    <script>
        function menuClick(params) {
            if ("product" == params) {
                window.location.href = "{{ route('guestproduct') }}";
            } else if ("book" == params) {
                window.location.href = "{{ route('book') }}";
            } else if ("history" == params) {
                window.location.href = "{{ route('user.history') }}";
            }
        }
    </script>
</body>

</html>
