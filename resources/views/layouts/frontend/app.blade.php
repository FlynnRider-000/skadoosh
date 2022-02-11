<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        {{-- <link rel="manifest" href="{{ asset('site.webmanifest') }}"> --}}
        {{-- <link rel="preload" href="{{ asset('assets/fonts/HappyKids.woff2') }}" as="font" type="font/woff2" crossorigin> --}}
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

        @include('layouts.frontend.stylelib')
        @include('layouts.frontend.jslib')
        <style>
            .popover__title {
                color: #fff;
                font-size: 1em;
                line-height: 1.4;
                position: relative;
                cursor: pointer;
                padding: 8px 15px;
                text-align: center;
                border-radius: 40px;
                background-color: #FF8549 !important;
                margin-bottom: 10px;
                margin-bottom: 10px;
            }
            .popover__wrapper:last-child .popover__title{background-color:transparent!important;color:#1C1D28 !Important;}
            .popover__content a{
                color: #333;
            }
            .popover__content li{padding-bottom:10px;}
            .popover__wrapper {
                position: relative;
                margin-top: 1.5rem;
                display: inline-block;
            }
            .popover__wrapper:last-child a h2{
                border: none;
            }
            .popover__content {
                opacity: 0;
                visibility: hidden;
                position: absolute;
                top: 68px;
                transform: translate(0, 10px);
                background-color: #fff;
                padding: 1.5rem;
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
                width: auto;
            }

            .popover__content:before {
                position: absolute;
                z-index: -1;
                content: "";
                right: calc(50% - 10px);
                top: -8px;
                border-style: solid;
                border-width: 0 10px 10px 10px;
                border-color: transparent transparent #bfbfbf transparent;
                transition-duration: 0.3s;
                transition-property: transform;
            }

            .popover__wrapper:hover .popover__content {
                z-index: 10;
                opacity: 1;
                visibility: visible;
                transform: translate(0, -20px);
                transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
            }

            .popover__message {
                text-align: center;
            }
            .popover__content.locations a:hover{
                color: black !important;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="overlaynew">
            <!-- Preloader End -->
            @include('layouts.frontend.header')

            <main>
                @yield('content')
            </main>

            @include('layouts.frontend.footer')
        </div>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
        @if (session('verified'))
            <script>
                $(document).ready(function () {    
                    Swal.fire({
                        title: "You've successfully verified your email!",
                        icon: "success",
                        showConfirmButton: !1,
                        timer: 1500
                    });
                });
            </script>
        @endif
        <script>
            $(document).ready(function(){
                $(document).on('submit', '.subscribe-form', function(e){
                    e.preventDefault();
                    $this = this;
                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        headers: { 'X-CSRF-Token': $("meta[name='csrf-token']").attr("content") },
                        data: $(this).serialize(),
                        success: function(res){
                            if(res == 'success'){
                                Swal.fire({
                                    title: "Please check your email box to verify your email address.",
                                    icon: "success",
                                    showConfirmButton: !1,
                                    timer: 3000
                                });
                                $($this)[0].reset();
                            }
                        },
                        error: function(res){
                            Swal.fire({
                                icon: "error",
                                title: res.responseJSON.errors.email,
                                showConfirmButton: !1,
                                timer: 5000
                            })
                        }
                    })
                })
            })
        </script>
    </body>
</html>
