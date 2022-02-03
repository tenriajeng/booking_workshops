<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- GOOGLE META --}}
    <meta name="robots" content="noindex,nofollow">
    <meta name="google-site-verification" content="+nxGUDJ4QpAZ5l9Bsjdi102tLVC21AIh5d1Nl23908vVuFHs34=" />
    {{-- dinamic meta --}}
    <meta name="description"
        content="Author: A.N. Author, Illustrator: P. Picture, Category: Books, Price:  £9.24, Length: 784 pages">
    <meta name="keywords" content="jakarta notebook">

    {{-- TWITTER META --}}
    <meta name="twitter:card" content="summary" /> {{-- “summary”, “summary_large_image”, “app”, or “player”. --}}
    <meta name="twitter:site" content="@sejawat_id" />
    <meta name="twitter:creator" content="@sejawat_id" />
    <meta name="twitter:domain" content="https://sejawat.co.id/">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- dinamic meta --}}
    <meta name="twitter:url" content="{{ url()->full() }}">
    <meta name="twitter:title"
        content="Google updates Passes API to store COVID vaccination and testing information on Android devices">
    <meta name="twitter:image"
        content="https://1.bp.blogspot.com/-XFeiNnY2l9M/YNtfTo9kt5I/AAAAAAAAKZA/XMUI8HFkIScYwoFDOxPT68hozB7NYYBoQCLcBGAsYHQ/s0/%255BGD%2BBLOG%255D%2BCovid%2Bcards%2B1.png">
    <meta name="twitter:description"
        content="Google has updated its Passes API to enable a simple and secure way to store and access COVID vaccination and test cards on Android devices.">

    {{-- FACEBOOK META --}}
    <meta property="og:type" content="article" />

    {{-- dinamic meta --}}
    <meta property="og:url" content="{{ url()->full() }}" />
    <meta property="og:title" content="When Great Minds Don’t Think Alike" />
    <meta property="og:description" content="How much does culture influence creative thinking?" />
    <meta property="og:image"
        content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />

    {{-- <meta name="description" --}} {{-- content="Metronic admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }} " rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }} " rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('css/themes/layout/header/base/light.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/header/menu/light.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/brand/light.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/aside/light.css') }} " rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <link rel="icon" href="https://sejawat.co.id/images/sejawat-logo-mobile.png">
    <link rel="icon" sizes="48x48" href="https://sejawat.co.id/images/sejawat-logo-mobile.png">
    <link rel="icon" sizes="96x96" href="https://sejawat.co.id/images/sejawat-logo-mobile.png">
    <link rel="icon" sizes="144x144" href="https://sejawat.co.id/images/sejawat-logo-mobile.png">
    @laravelPWA
    <style>
        .deleteButton:hover {
            cursor: pointer;
        }

    </style>
    @stack('page_style')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <!--begin::Header Mobile-->
    @include('layouts.mobile_header')
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            @include('pimpinan/layout/sidebar')

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('layouts.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @include('layouts.subheader')
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Notice-->

                            @yield('content')

                            <!--end::Card-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                @include('layouts.footer')

            </div>

            @include('layouts.profile')
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>


    {{-- @php
    dd(json_decode(Session::get('error')))
    @endphp --}}
    <!--end::Scrolltop-->

    @include('layouts.firebase_script')
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('js/pages/widgets.js') }}"></script>
    <!--end::Page Scripts-->
    @stack('page_script')
    <script src="{{ asset('js/pages/features/miscellaneous/sweetalert2.js') }}"></script>
    @if ($message = Session::get('sukses'))
        <script>
            Swal.fire({
                position: "top-right",
                icon: "success",
                title: "{{ $message }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
        {{ Session::forget('sukses') }}
    @endif

    @if ($message = Session::get('error'))

        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            toastr.error("{{ $message }}");
            // Swal.fire({
            //     position: "top-right",
            //     icon: "error",
            //     title: "{{ $message }}",
            //     showConfirmButton: false,
            //     timer: 2000
            // });
        </script>
        {{ Session::forget('error') }}
    @endif
    <script>
        function deleteFunction(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true,
                customClass: {
                    confirmButton: "btn btn-light-danger",
                    cancelButton: "btn btn-light-primary"
                }
            }).then(function(result) {
                if (result.value) {
                    document.getElementById("formDelete[" + id + "]").submit();
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        }
    </script>
</body>
<!--end::Body-->

</html>
