<!doctype html>
<html lang="en">

    <head>       
        @include('backend.includes.head')
    </head>

    <body data-sidebar="dark">

        <div id="layout-wrapper">

            @include('backend.includes.header')

            <div class="vertical-menu">
                <div data-simplebar class="h-100">

                    @include('backend.includes.aside')

                </div>
            </div>

            
            <div class="main-content">

                @yield('content')

            </div>

        </div>

        @include('backend.includes.script')

        @if (Session::has('alert.config'))
            <script>
                Swal.fire({!! Session::pull('alert.config') !!});
            </script>
        @endif
        

    </body>

</html>